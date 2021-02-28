<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;

class OrganizerController extends Controller {
    public function create(Request $request) {
    	$validatedData = $request->validate([
    		"email" => "required|email:rfc",
    		"university" => "required|min:1|max:100",
    		"club" => "required|min:1|max:100",
    	]);
    	Organizer::create($validatedData);
    	return redirect('/')->with('sponsorCreated', 'Thank you for your interest in organizing Cyber Pink in your area. You will be contacted very soon if you are selected to be an organizing club/association. Make sure to check your inbox for updates.');
    }
}
