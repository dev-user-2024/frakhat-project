<?php

namespace Modules\Contact\Database\Models;

use App\Models\course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ContactUs extends Model
{
    use HasFactory;
    protected $fillable=['full_name', 'email','description'];


}
