<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Profile;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ContactDetail;
use App\Models\SkillCategory;
use App\Models\WorkExperience;
use Illuminate\Support\Facades\DB;

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

        $footer = DB::table('contact_details')->get();

        return view('frontend.index', [
            'profile' => Profile::first(),
            'experiences' => WorkExperience::orderBy('sort_order')->get(),
            'skillCategories' => $skillCategories,
            'projects' => Project::orderBy('sort_order')->get(),
            'contacts' => ContactDetail::first()->get(),
            'footers' => $footer,
        ]);
    }
}
