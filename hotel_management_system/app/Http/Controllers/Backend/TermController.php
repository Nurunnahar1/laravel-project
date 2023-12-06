<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    function editPage(){
        $term = Term::where('id',1)->first();
        return view('backend.pages.term.edit',compact('term'));
    }
    function update(Request $request){
        $term = Term::where('id',1)->first();
        $term->heading = $request->heading;
        $term->content = $request->content;
        $term->update();
        return redirect()->back()->with('success','Term data updated successfully');
    }
}
