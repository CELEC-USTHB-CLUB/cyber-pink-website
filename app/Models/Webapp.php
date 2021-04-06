<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webapp extends Model
{
    use HasFactory;
    protected $fillable = ["url"];
}
