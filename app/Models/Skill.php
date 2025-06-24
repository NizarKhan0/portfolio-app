<?php

namespace App\Models;

use App\Models\Project;
use App\Models\SkillCategory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name', 'skill_category_id', 'proficiency', 'sort_order'
    ];
    // 'color'

    public function category()
    {
        return $this->belongsTo(SkillCategory::class, 'skill_category_id');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_skill_pivot', 'skill_id', 'project_id');
    }
}