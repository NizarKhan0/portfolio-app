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
        // Get all categories with their skills
        $categories = SkillCategory::orderBy('sort_order')->get();

        // Group skills by category
        $skillsByCategory = [];
        foreach ($categories as $category) {
            $skillsByCategory[$category->name] = [
                'icon' => $category->icon,
                'skills' => Skill::where('category', $category->name)
                    ->orderBy('sort_order')
                    ->get()
            ];
        }

        // dd($skillsByCategory);

        return view('frontend.index', [
            'profile' => Profile::first(),
            'experiences' => WorkExperience::orderBy('sort_order')->get(),
            'skillsByCategory' => $skillsByCategory,
        ]);
    }
}
