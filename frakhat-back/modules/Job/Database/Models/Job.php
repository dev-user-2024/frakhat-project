<?php

namespace Modules\Job\Database\Models;

use App\Models\course;
use App\Models\Province;
use Illuminate\Database\Eloquent\Model;
use Modules\Tag\Database\Models\Tag;

class Job extends Model
{
    protected $guarded = [];


    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'job_skill', 'job_id', 'skill_id');
    }
    public function jobGroups()
    {
        return $this->belongsToMany(JobGroup::class, 'job_group_job', 'job_id', 'job_group_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function course()
    {
        return $this->belongsTo(course::class);
    }

    public function resumes()
    {
        return $this->hasMany(Resume::class);
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}

