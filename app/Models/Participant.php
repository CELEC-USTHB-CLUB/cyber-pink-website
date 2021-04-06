<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model {
    use HasFactory;
    protected $fillable = ["fullname", "birthdate", "email", "phone_number", "size", "activated", "skills"];
	public $timestamps = true;

}
