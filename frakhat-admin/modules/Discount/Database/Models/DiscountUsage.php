<?php

namespace Modules\Discount\Database\Models;

use App\Models\course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DiscountUsage extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::Class);
    }
    public function discount()
    {
        return $this->belongsTo(Discount::Class);
    }
    public function course()
    {
        return $this->belongsTo(course::class);
    }

}
