<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BecomeAPartnerController extends Controller
{
    public function index()
    {
        return view('frontend.become_a_partner');
    }
}
