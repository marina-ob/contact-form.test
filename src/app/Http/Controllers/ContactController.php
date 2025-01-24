<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index() {
        return view('index');
    }

    public function confirm(ContactRequest $request) {
        $tel = $request->tel1 . ' ' . $request->tel2 . ' ' . $request->tel3;
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'category_id', 'detail']);
        return view('confirm', compact('contact', 'tel'));
    }

    public function store(Request $request) {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building','category_id', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }

    public function admin() {
        $contacts = Contact::all();
        $contacts = Contact::Paginate(7);
        return view('admin',compact('contacts'));
    }

    
}
