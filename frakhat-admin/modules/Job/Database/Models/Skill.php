<?php

namespace Modules\Job\Database\Models;

use App\Models\course;
use Illuminate\Database\Eloquent\Model;
use Modules\Tag\Database\Models\Tag;

class Skill extends Model
{
    protected $guarded = [];

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_skill', 'skill_id', 'job_id');
    }
}

