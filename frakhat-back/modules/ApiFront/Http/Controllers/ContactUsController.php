<?php

namespace Modules\ApiFront\Http\Controllers;
use App\Http\Controllers\Controller;
use Modules\ApiFront\Http\ResponderFacade;
use Modules\Contact\Database\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Modules\Contact\Database\Models\ContactUs;

class ContactUsController extends Controller
{
    public function store()
    {
        $validatedData = $this->validateDataIsValid();

        try {
            $contact = ContactUs::create(request()->all());

            return response()->json([
                'success' => true,
                'message' => 'Contact created successfully.',
                'data' => $contact,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create contact.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    private function validateDataIsValid()
    {
        $validator = Validator::make(request()->all(), [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required'],
            'description' => ['required'],
        ]);
        if($validator->fails())
        {
            ResponderFacade::dataNotValid($validator->errors())->throwResponse();
        }
        return $validator;
    }


}
