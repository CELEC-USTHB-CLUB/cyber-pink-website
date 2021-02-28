<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class SposorController extends Controller {
    public function create(Request $request) {
    	$validatedData = $request->validate([
    		"email" => "required|email:rfc",
    		"letter" => "required|min:5|max:2500",
    	]);
    	Sponsor::create($validatedData);
    	return redirect('/')->with('sponsorCreated', 'Thank you for your interest in aiding Cyber Pink and supporting our cause. You will be contacted very soon so please insure to check your inbox. It will be a great pleasure for us to work with you. Don’t hesitate to contact us for any further questions, points or clarifications you might want to make.');
    }
}
