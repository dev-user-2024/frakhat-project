<?php

namespace Modules\Discount\Database\Models;

use App\Models\CourseCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DiscountMarketer extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::Class);
    }
    public function discounts()
    {
        return $this->hasMany(Discount::Class);
    }
    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class);
    }


}
