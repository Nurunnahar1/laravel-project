<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    function index(){
        $faqs = Faq::get();
        return view('backend.pages.faq.index',compact('faqs'));
    }
    function create(){
        return view('backend.pages.faq.create' );
    }

    function store(Request $request){

        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);
        $faqs = new Faq();
        $faqs->question = $request->question;
        $faqs->answer = $request->answer;
        $faqs->save();

        return redirect()->route('faq.page')->with('success', 'Faq data create successfully');
    }

    function editPage($id){
        $faqs = Faq::where('id', $id)->first();
        return view('backend.pages.faq.edit',compact('faqs'));
    }

    function update(Request $request,$id){
        $faqs = Faq::where('id', $id)->first();
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);
        $faqs->question = $request->question;
        $faqs->answer = $request->answer;
        $faqs->update();
        return redirect()->route('faq.page')->with('success', 'Faq is update successfully.');
    }
    function destroy($id){
        $single_data = Faq::where('id', $id)->first();
        $single_data->delete();
        return redirect()->route('faq.page')->with('success', 'Faq is Deleted successfully.');
    }
}
