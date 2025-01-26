<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Contact;
use App\Models\Category;
use vendor\laravel\fortify\src\Http\Controllers\RegisterdUserController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;
use Laravel\Fortify\Fortify;


class ContactController extends Controller
{
    public function index() {
        return view('index');
    }

    public function confirm(ContactRequest $request) {
        $tel = $request->tel1 .  $request->tel2  . $request->tel3;
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel1','tel2','tel3','address', 'building', 'category_id', 'detail']);
        return view('confirm', compact('contact','tel'));
    }

    public function create(Request $request) {
        if($request->input('back') == 'back'){
            return redirect('/')
                        ->withInput();
        }
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email','tel', 'address', 'building','category_id', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }

    public function store(LoginRequest $request,
                          CreatesNewUsers $creator): RegisterResponse
    {
        if (config('fortify.lowercase_usernames')) {
            $request->merge([
                Fortify::username() => Str::lower($request->{Fortify::username()}),
            ]);
        }

        event(new Registered($user = $creator->create($request->all())));


        return app(RegisterResponse::class);
        return redirect('login');
    }

    public function admin() {
        $contacts = Contact::all();
        $content = Contact::with('category')->get();
        $contacts['category'] = $content;
        $contacts = Contact::Paginate(7);
        return view('admin',compact('contacts'));
    }

    public function search(Request $request) {
        $contacts = Contact::where('gender',$request->gender)->where('category_id',$request->category_id)->get();
        return view('admin',compact('contacts'));
    }
}