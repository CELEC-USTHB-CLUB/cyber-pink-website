<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hackers', function (Blueprint $table) {
            $table->id();
            $table->string("fullname");
            $table->string("email");
            $table->string("university");
            $table->integer("hackathons");
            $table->string("linkedIn")->nullable();
            $table->string("github")->nullable();
            $table->char("size", 5);
            $table->boolean("stay_at_night");
            $table->longText("motivation");
            $table->boolean("activated");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hackers');
    }
}
