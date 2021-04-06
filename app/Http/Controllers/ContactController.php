<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller {
    public function create(Request $request) {
    	$validatedData = $request->validate([
    		"email" => "required|email:rfc",
    		"fullname" => "required|min:1|max:100",
    		"message" => "required|min:3|max:2500",
    	]);
    	Message::create($validatedData);
    	return redirect('/')->with('sponsorCreated', 'We appreciate you contacting us. One of our members will get back in touch with you soo');
    }
}
