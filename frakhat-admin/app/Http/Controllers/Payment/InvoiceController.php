<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\User;
use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class InvoiceController extends PaymentController
{
        public function create_purchase(Request $request)
    {

        $course_id = $request->get('id');
        $user_id = $request->get('user_id');
        $code_marketing = $request->input('code_marketing');
        $code = $request->input('code');

        $course = course::query()->where('id', $course_id)->get()->first();
        $user = User::query()->where('id', $user_id)->get()->first();

        // Calculate real amount
        $amount = parent::calculateCoursePrice($course, $code);

        // Create new invoice.
        $invoice = (new Invoice)->amount($amount);

        // Create description for invoice
        $description = parent::createDescription($user, $course);

        // Add invoice details
        $invoice->detail([
            'description' => $description,
            'mobile' => $user->profile ? $this->convert($user->profile->mobile) : '',
            'email' => $description['email'],
            'code_marketing' => $code_marketing
        ]);

//        return $invoice->getDetails();
        $callback_url = route('verify', [
            'id' => $course->id,
            'user_id' => $user_id,
            'code' => $code,
            'code_marketing' => $code_marketing
        ]);

        // Fee the given invoice.
        $payment = Payment::via('rayanpay-v2')->callbackUrl($callback_url)
            ->purchase($invoice, function ($driver, $transactionId) use ($user, $course) {
                // Create new transaction for payment
                parent::createTransaction($user, $course, $transactionId);
            })->pay()->render();

        return $payment;
    }


}
