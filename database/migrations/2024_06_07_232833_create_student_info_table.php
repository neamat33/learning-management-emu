<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_info', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->date('dob');
            $table->string('img');
            $table->text('present_address');
            $table->text('permanent_address');
            $table->string('mobile');
            $table->tinyInteger('mobile_verified')->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('email_verified')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('father_mobile')->nullable();
            $table->string('mother_mobile')->nullable();
            $table->string('father_email')->nullable();
            $table->string('mother_email')->nullable();
            $table->text('note')->nullable();
            $table->tinyInteger('status_id')->default(1);
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
        Schema::dropIfExists('student_info');
    }
};
