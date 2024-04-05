<?php

namespace Modules\Contact\Database;

use Imanghafoori\Helpers\Nullable;
use Modules\Contact\Database\Models\Contact;

class ContactStore
{
    public static function destroy($contact)
    {
        $contact->delete();
    }
}
