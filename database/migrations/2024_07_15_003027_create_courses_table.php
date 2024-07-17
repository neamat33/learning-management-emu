<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('course_title');
            $table->date('start_date');
            $table->string('image')->nullable();
            $table->string('class_routine')->nullable();
            $table->string('video')->nullable();
            $table->integer('price')->nullable();
            $table->integer('discount_price')->nullable();
            $table->text('course_description');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
