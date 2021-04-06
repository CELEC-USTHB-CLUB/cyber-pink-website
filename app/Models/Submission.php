<?php

namespace App\Models;

use App\Models\App;
use App\Models\File;
use App\Models\Image;
use App\Models\Webapp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model {
    use HasFactory;
    protected $fillable = ["team", "description", "video_link", "github_link", "users", "link", "project_name", "selected_challenge"];

    public function images() {
    	return $this->morphMany(Image::class, "imageable");
    }

    public function document() {
    	return $this->hasOne(File::class);
    }

    public function app() {
    	return $this->hasOne(App::class);
    }

    public function webapp() {
    	return $this->hasOne(Webapp::class);
    }

}
