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
        Schema::create('student_class_assignment', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('branch_id');
            $table->integer('class_id');
            $table->integer('batch_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->integer('shift_id')->nullable();
            $table->tinyInteger('status_id');
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
        Schema::dropIfExists('student_class_assignment');
    }
};
