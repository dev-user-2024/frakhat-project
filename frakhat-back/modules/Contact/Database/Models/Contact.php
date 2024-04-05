<?php

namespace Modules\Contact\Database\Models;

use App\Models\course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    use HasFactory;
    protected $fillable=['course_id', 'full_name', 'mobile', 'phone', 'email','description'];

    public function course()
    {
        return $this->belongsTo(Course::Class);
    }

}
