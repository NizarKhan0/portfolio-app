<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\WorkExperience;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('frontend.index',[
            'profile' => Profile::first(),
            'experiences' => WorkExperience::orderBy('sort_order')->get(),
        ]);
    }
}
