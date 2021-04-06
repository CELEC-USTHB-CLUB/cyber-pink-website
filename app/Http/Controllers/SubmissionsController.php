<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmissionsController extends Controller {
    public function index() {
    	return view("submit");
    }

    public function modify(string $code) {
    	$link = url('modify')."/".$code;
    	return view("modify", ["link" => $link]);
    }

}
