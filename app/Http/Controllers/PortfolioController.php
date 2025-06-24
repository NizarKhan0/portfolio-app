<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\SkillCategory;
use App\Models\WorkExperience;

class PortfolioController extends Controller
{
    public function index()
    {
        // Get categories with their skills ordered by sort_order
        $skillCategories = SkillCategory::with([
            'skills' => function ($query) {
                $query->orderBy('sort_order');
            }
        ])->orderBy('sort_order')->get();

        return view('frontend.index', [
            'profile' => Profile::first(),
            'experiences' => WorkExperience::orderBy('sort_order')->get(),
            'skillCategories' => $skillCategories,

        ]);
    }
}
