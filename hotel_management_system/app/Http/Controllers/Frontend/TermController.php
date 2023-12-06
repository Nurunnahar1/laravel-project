<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    function index(){
        $term = Term::where('id',1)->first();
        return view('frontend.pages.term',compact('term'));
    }
}
