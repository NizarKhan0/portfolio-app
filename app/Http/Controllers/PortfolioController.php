<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Profile;
use App\Models\Project;
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

        // $projects = Project::orderBy('sort_order')->get();

        // // Preload skills to avoid N+1 queries (use JSON instead of pivot table)
        // $skillIds = $projects->pluck('tech_stack')->flatten()->unique()->filter();
        // $skills = Skill::whereIn('id', $skillIds)->get()->keyBy('id');

        return view('frontend.index', [
            'profile' => Profile::first(),
            'experiences' => WorkExperience::orderBy('sort_order')->get(),
            'skillCategories' => $skillCategories,

            'projects' => Project::orderBy('sort_order')->get()
        ]);
    }
}