<?php

namespace Modules\Menu\Database\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Section extends Model
{
    use HasFactory;
    protected $fillable=['title'];

}
