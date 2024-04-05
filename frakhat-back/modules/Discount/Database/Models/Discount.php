<?php

namespace Modules\Discount\Database\Models;

use App\Models\course;
use App\Models\CourseCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Discount extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded=[];

    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class, 'type_id');
    }

    public function course()
    {
        return $this->belongsTo(course::class, 'type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::Class);
    }


    public function discountUsage()
    {
        return $this->hasMany(DiscountUsage::Class);
    }

}
