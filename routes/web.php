<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HackerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\SposorController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"]);
Route::get('/hack', [HomeController::class, "showHack"]);
Route::get('/workshop', [HomeController::class, "showWorkshop"]);

Route::post("sponsorCreate", [SposorController::class, "create"]);
Route::post("organizerCreate", [OrganizerController::class, "create"]);
Route::post("contact", [ContactController::class, "create"]);
Route::post("createParticipant", [ParticipantController::class, "create"]);
Route::post("createHacker", [HackerController::class, "create"]);

Route::get("migrate", function() {
	dd(Artisan::call("migrate"));
});	

Route::prefix("admin")->group(function() {
	Route::get("login", [AdminController::class, "showLogin"]);
	Route::post("login", [AdminController::class, "check"]);
	Route::get("panel", [AdminController::class, "showPanel"])->middleware("auth");
	Route::get("hackers", [AdminController::class, "showHackers"])->middleware("auth");
	Route::get("workshop", [AdminController::class, "showWorkshop"])->middleware("auth");
	Route::get("sponsors", [AdminController::class, "showSponsors"])->middleware("auth");
	Route::get("organizers", [AdminController::class, "showOrganizers"])->middleware("auth");
	Route::get("messages", [AdminController::class, "messages"])->middleware("auth");
});