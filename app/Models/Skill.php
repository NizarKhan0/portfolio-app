<?php

namespace App\Models;

use App\Models\SkillCategory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name', 'skill_category_id', 'proficiency', 'sort_order'
    ];

    public function category()
    {
        return $this->belongsTo(SkillCategory::class, 'skill_category_id');
    }
}