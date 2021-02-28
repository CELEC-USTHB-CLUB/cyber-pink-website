<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {
    public function index() {
    	return view("home");
    }

    public function showWorkshop() {
    	return view("workshop");
    }

    public function showHack() {
    	return view("hack");
    }

}
