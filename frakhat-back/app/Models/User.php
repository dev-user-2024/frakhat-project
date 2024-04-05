<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;
use Laravel\Sanctum\HasApiTokens;
use Modules\CartItem\Database\Models\Cart;
use Modules\CartItem\Database\Models\Fee;
use Modules\CartItem\Database\Models\License;
use Modules\Category\Database\Models\Category;
use Modules\Discount\Database\Models\DiscountUsage;
use Modules\Image\Database\Models\Image;
use Modules\UserDetail\Database\Models\UserDetail;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;
    use Impersonate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'family',
        'mobile',
        'email',
        'password',
        'role',
        'is_ban',
        'last_login_device',
        'last_login_at',
        'ip_address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
    public function discountUsage()
    {
        return $this->hasMany(DiscountUsage::Class);
    }

    public function license(){
        return $this->hasMany(License::class);
    }
    public function fees(){
        return $this->hasMany(Fee::class);
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function userDetail()
    {
        return $this->hasOne(UserDetail::class);
    }
    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->family}";
    }

    public function categoryUsers()
    {
        return $this->belongsToMany(Category::class, 'category_users', 'user_id', 'category_id');
    }
    public function courses(){
        return $this->hasMany(course::class);
    }

}
