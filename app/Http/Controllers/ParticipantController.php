<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ParticipantController extends Controller {
    public function create(Request $request) {
    	$validatedData = $request->validate([
    		"fullname" => "required|min:3|max:50",
    		"birthdate"	=> "required",
    		"email" => "required|email:rfc",
    		"phone"	=> "required|max:10|unique:participants,phone_number",
    		"motivation" => "required|min:5|max:2500",
    		"size" => "required",
    		"skills" => "required"
    	]);
    	$validatedData["activated"] = false;
    	$validatedData["phone_number"] = $validatedData["phone"];
    	$validatedData["birthdate"] = Carbon::parse($validatedData["birthdate"])->format("Y-m-d");
    	if($validatedData["skills"] == "no") {
    	    $validatedData["skills"] = false;
    	}else {
    	    $validatedData["skills"] = true;
    	}
        Participant::create($validatedData);
    	return redirect('/')->with('sponsorCreated', 'Thank you for your interest in the Cyber Pink Workshops. You will be contacted very soon if you are selected to participate in the event. Make sure to check your inbox and our social media pages for all the updates.');
    }
}
