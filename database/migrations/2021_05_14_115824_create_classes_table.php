<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->string('original_price');
            $table->string('link_id')->unique();
            $table->string('tutor_id');
            $table->string('course_outline');
            $table->string('image')->default('https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1618693692/mti_logo.jpg');
            $table->text('excerpt')->nullable();
            $table->text('description');
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->string('end_registration')->nullable();
            $table->string('class_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
