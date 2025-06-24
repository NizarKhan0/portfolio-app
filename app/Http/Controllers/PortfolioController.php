<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('frontend.index',[
            'profile' => Profile::first(),
        ]);
    }
}
