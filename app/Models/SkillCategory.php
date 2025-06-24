<?php

namespace App\Models;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Model;

class SkillCategory extends Model
{
    protected $fillable = [
        'name', 'icon', 'sort_order'
    ];

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
}
