<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {
    public function showLogin() {
    	return view("admin.login");
    }

    public function check(Request $request) {
    	if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
		    $request->session()->regenerate();
		    return redirect()->intended('admin/panel');
		}else {
			dd("Username or password false, please try again");
		}
    }

    public function showPanel() {
    	return view("admin.panel");
    }

    public function showHackers() {
    	return view("admin.hackers");
    }

    public function showWorkshop() {
        return view("admin.workshop");
    }

    public function showSponsors() {
        return view("admin.showSponsors");
    }

    public function showOrganizers() {
        return view("admin.organizers"); 
    }
}
