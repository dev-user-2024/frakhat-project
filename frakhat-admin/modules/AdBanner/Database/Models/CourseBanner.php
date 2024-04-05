<?php

namespace Modules\AdBanner\Database\Models;

use App\Models\course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseBanner extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::Class);
    }
    public function course()
    {
        return $this->belongsTo(course::Class, 'course_id');
    }

}
