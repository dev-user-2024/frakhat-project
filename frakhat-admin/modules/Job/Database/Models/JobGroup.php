<?php

namespace Modules\Job\Database\Models;

use Illuminate\Database\Eloquent\Model;

class JobGroup extends Model
{
    protected $guarded = [];

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_group_job', 'job_group_id', 'job_id');
    }

}

