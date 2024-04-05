<?php

namespace App\Lib;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Shetabit\Multipay\Abstracts\Driver;
use Shetabit\Multipay\Contracts\ReceiptInterface;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Exceptions\PurchaseFailedException;
use Shetabit\Multipay\Invoice;
use Shetabit\Multipay\Receipt;
use Shetabit\Multipay\RedirectionForm;
use Shetabit\Multipay\Request;

class RayanpayV2 extends Driver
{
    /**
     * HTTP Client.
     *
     * @var object
     */
    protected $client;

    /**
     * Invoice
     *
     * @var Invoice
     */
    protected $invoice;

    /**
     * Driver settings
     *
     * @var object
     */
    protected $settings;


    /**
     * Sadad constructor.
     * Construct the class with the relevant settings.
     *
     * @param Invoice $invoice
     * @param $settings
     */
    public function __construct(Invoice $invoice, $settings)
    {
        $this->invoice($invoice);
        $this->settings = (object)$settings;
        $this->client = new Client();
    }

    /**
     * Fee Invoice.
     *
     * @return string
     *
     * @throws PurchaseFailedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function purchase()
    {

        $details = $this->invoice->getDetails();

        if (!empty($details['description'])) {
            $description = $details['description'];
        } else {
            $description = $this->settings->description;
        }

        $mobile = '';
        if (!empty($details['mobile'])) {
            $mobile = $details['mobile'];
        }


        $email = '';
        if (!empty($details['email'])) {
            $email = $details['email'];
        }


        $amount = $this->invoice->getAmount() * 10;
        if ($amount < 10000) {
            throw new PurchaseFailedException('مقدار مبلغ ارسالی باید بزگتر از یک هزار تومان باشد.');
        }


        $data = [
            'merchantID' => $this->settings->merchantId,
            "amount" => $amount,
            'mobile' => $mobile,
            'email' => $email,
            'description' => json_encode($description),
            'callbackUrl' => $this->settings->callbackUrl,
        ];

        $response = $this
            ->client
            ->request(
                'POST',
                $this->settings->apiPurchaseUrl,
                [
                    "json" => $data,
                    "headers" => [
                        'Content-Type' => 'application/json',
                    ],
                    "http_errors" => false,
                ]
            );

        $result = json_decode($response->getBody()->getContents(), true);

        if (!isset($result['authority']) || $result['status'] != 100) {
            $bodyResponse = $result['status'];
            throw new PurchaseFailedException($this->translateStatus($bodyResponse), $bodyResponse);
        }

        $this->invoice->transactionId($result['authority']);
        return $this->invoice->getTransactionId();
    }

    /**
     * Pay the Invoice render html redirect to getway
     *
     * @return RedirectionForm
     */
    public function pay(): RedirectionForm
    {
        $transactionId = $this->invoice->getTransactionId();

        $paymentUrl = $this->getPaymentUrl();

        $payUrl = $paymentUrl .'/'. $transactionId;

        return $this->redirectWithForm($payUrl, [], 'GET');
    }

    /**
     * Verify payment
     *
     * @return ReceiptInterface
     *
     * @throws InvalidPaymentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function verify(): ReceiptInterface
    {
        $authority = $this->invoice->getTransactionId() ?? Request::input('Authority');

        $amount = $this->invoice->getAmount() * 10;
        $data = [
            'merchantID' => $this->settings->merchantId,
            "amount" => $amount,
            "authority" => $authority,
        ];

        $response = $this->client->request(
            'POST',
            $this->getVerificationUrl(),
            [
                'json' => $data,
                "headers" => [
                    'Content-Type' => 'application/json',
                ],
                "http_errors" => false,
            ]
        );

        $result = json_decode($response->getBody()->getContents(), true);

        if ( $result['status'] != 100 || !isset($result['refID'])) {
            $bodyResponse = $result['status'];
            throw new InvalidPaymentException($this->translateStatus($bodyResponse), $bodyResponse);
        }

        $bodyResponse = $result['status'];
        if ($bodyResponse == -1) {
            throw new InvalidPaymentException($this->translateStatus($bodyResponse), $bodyResponse);
        }



        $receipt = $this->createReceipt($result['refID']);

//        $receipt->detail([
//            'code' => $this->invoice->getDetail('code'),
//            'referenceNo' => Request::input('RRN'),
//            'transactionId' => Request::input('RefNum'),
//            'cardNo' => Request::input('SecurePan'),
//        ]);
        return $receipt;
    }

    /**
     * Generate the payment's receipt
     *
     * @param $referenceId
     *
     * @return Receipt
     */
    protected function createReceipt($referenceId)
    {
        return new Receipt('rayanpay', $referenceId);
    }

    /**
     * Convert status to a readable message.
     *
     * @param $status
     *
     * @return mixed|string
     */
    private function translateStatus($status)
    {
        $translations = [

            '100' => 'عملیات با موفقیت انجام شده است',
            '-1' => 'اطلاعات ارسال شده ناقص است.',
            '-2' => 'IP یا Merchant Code پذیرنده صحیح نیست',
            '-3' => 'با توجه به محدودیت های شاپرك امكان پرداخت با رقم درخواست شده میسر نمی باشد.',
            '-11' => 'درخواست مورد نظر یافت نشد.',
            '-21' => 'هیچ نوع عملیات مالی برای این تراكنش یافت نشد.',
            '-22' => 'تراكنش ناموفق می باشد.',
            '-33' => 'رقم تراكنش با رقم پرداخت شده مطابقت ندارد.',
            '-40' => 'اجازه دسترسی به متد مربوطه وجود ندارد.',
            '-41' => 'اطلاعات ارسال شده مربوط به AdditionalData غیرمعتبر میباشد.',
            '-100' => 'در انتظار پرداخت.',
            '-101' => 'آدرس بازگشت مشتری خالی است.',
            '-102' => 'در پرداخت خطایی رخ داده است.',
            '-103' => 'وضعیت پرداخت جهت تایید نادرست است.',
            '-104' => 'فروشگاهی با شناسه ارسالی یافت نشد.',
            '-105' => 'شناسه مرجع تراکنش اشتباه است',
            '-106' => 'خطای تایید پرداخت.',
            '-107' => 'وضعیت پرداخت صحیح نیست.',
            '-109' => 'فروشگاه غیر فعال است.',
            '-110' => 'شناسه ارسال شده نامعتبر است.',
            '-111' => 'پرداخت با شناسه ارسالی یافت نشد.',
            '-112' => 'فرمت توضیحات اشتباه است.',
            '-113' => 'فرمت موبایل اشتباه است.'

        ];

        $unknownError = 'خطای ناشناخته رخ داده است. در صورت کسر مبلغ از حساب حداکثر پس از 72 ساعت به حسابتان برمیگردد';

        return array_key_exists($status, $translations) ? $translations[$status] : $unknownError;
    }

    /**
     * Retrieve Payment url
     *
     * @return string
     */
    protected function getPaymentUrl(): string
    {
        return $this->settings->apiPayStart;
    }

    /**
     * Retrieve verification url
     *
     * @return string
     */
    protected function getVerificationUrl(): string
    {
        return $this->settings->apiPayVerify;
    }
}
