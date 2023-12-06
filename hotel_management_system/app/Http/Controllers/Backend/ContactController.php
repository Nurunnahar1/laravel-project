<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function editPage(){
        $contact = Contact::where('id',1)->first();
        return view('backend.pages.contact.edit',compact('contact'));
    }
    function update(Request $request){
        $contact = Contact::where('id',1)->first();
        $contact->heading = $request->heading;
        $contact->map = $request->map;
        $contact->update();
        return redirect()->back()->with('success','Contact data updated successfully');
    }
}
