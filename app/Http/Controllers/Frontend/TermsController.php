<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TermsController extends Controller
{
    public function index()
    {
        return view('frontend.terms_and_conditions');
    }
}
