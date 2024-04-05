<?php

namespace Modules\Job\Database\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
