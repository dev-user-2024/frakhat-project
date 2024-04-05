<?php

namespace Modules\Job\Database\Models;

use App\Models\course;
use Illuminate\Database\Eloquent\Model;
use Modules\Tag\Database\Models\Tag;

class JobSkill extends Model
{
    protected $guarded = [];

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
        return $this->belongsTo(Course::class);
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

