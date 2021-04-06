<?php

namespace App\Http\Controllers;

use App\Models\Hacker;
use Illuminate\Http\Request;

class HackerController extends Controller {
    public function create(Request $request) {
    	$validatedData = $request->validate([
    		"fullname" => "required|min:3|max:250",
    		"email" => "required|unique:hackers",
    		"university" => "required",
    		"participated" => "required",
    		"particiaptions" => "required",
    		"size" => "required",
    		"stay_at_night" => "required",
    		"motivation" => "required|max:2500",
    		"image" => "required|image",
    		"skills" => "required",
    		 "study_level" => "required",
    		 "phone" => "required|max:11|unique:hackers"
    	]);	
    	if ($validatedData["stay_at_night"] == "false") {
    		$validatedData["stay_at_night"] = false;
    	}else {
    		$validatedData["stay_at_night"] = true;    		
    	}
    	$path = $request->image->store('images');
    	Hacker::create([
    		"fullname" => $validatedData["fullname"], 
    		"email" => $validatedData["email"], 
    		"university" => $validatedData["university"], 
    		"hackathons" => $validatedData["particiaptions"], 
    		"linkedIn" => $request->linked_in, 
    		"github" => $request->github, 
    		"size" => $validatedData["size"], 
    		"stay_at_night" => $validatedData["stay_at_night"], 
    		"motivation" => $validatedData["motivation"], 
    		"activated" => false, 
    		"image" => $path,
    		"study_level" => $validatedData["study_level"],
    		"skills" => $validatedData["skills"],
    		"phone" => $validatedData["phone"]
    	]);
    	return redirect('/')->with('sponsorCreated', 'Thank you for your interest in the Cyber Pink Hackathon.You will be contacted very soon if you are selected to participate in the event. Make sure to check your inbox and our social media pages for all the updates.');
    }
}
