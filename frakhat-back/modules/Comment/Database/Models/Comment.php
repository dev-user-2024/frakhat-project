<?php

namespace Modules\Comment\Database\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    use HasFactory;
    protected $fillable=['body', 'user_id', 'commentable_id', 'commentable_type', 'status'];

    public function user()
    {
        return $this->belongsTo(User::Class);
    }
    public function commentable()
    {
        return $this->morphTo();
    }
}
