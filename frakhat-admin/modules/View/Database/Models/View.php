<?php

namespace Modules\View\Database\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class View extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'ip_address'];

    
    public function viewable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
}
