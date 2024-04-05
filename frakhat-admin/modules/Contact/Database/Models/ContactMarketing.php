<?php

namespace Modules\Contact\Database\Models;

use App\Models\course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ContactMarketing extends Model
{
    use HasFactory;
    protected $table = 'contact_marketing';
    protected $guarded=[];


}
