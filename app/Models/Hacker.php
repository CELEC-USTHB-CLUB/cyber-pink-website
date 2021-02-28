<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hacker extends Model {
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ["fullname", "email", "university", "hackathons", "linkedIn", "github", "size", "stay_at_night", "motivation", "activated", "image"];
    public $casts = ["stay_at_night" => "boolean"];
}
