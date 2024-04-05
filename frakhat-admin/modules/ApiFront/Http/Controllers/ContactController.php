<?php

namespace Modules\ApiFront\Http\Controllers;
use App\Http\Controllers\Controller;
use Modules\ApiFront\Http\ResponderFacade;
use Modules\Contact\Database\Models\Contact;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store()
    {
        $validatedData = $this->validateDataIsValid();

        try {
            $contact = Contact::create(request()->all());

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
            'course_id' => ['required'],
            'full_name' => ['required', 'string', 'max:255'],
            'mobile' => ['required'],
            'phone' => ['required'],
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
