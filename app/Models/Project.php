<?php

namespace App\Models;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'tech_stack',
        'demo_link', 'github_link', 'featured', 'sort_order'
    ];

    protected $casts = [
        'tech_stack' => 'array',
    ];

    // // Accessor for skills
    // public function getSkillsAttribute()
    // {
    //     if (empty($this->tech_stack)) {
    //         return collect();
    //     }

    //     return Skill::whereIn('id', $this->tech_stack)->get();
    // }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'project_skill_pivot', 'project_id', 'skill_id');
    }
}
