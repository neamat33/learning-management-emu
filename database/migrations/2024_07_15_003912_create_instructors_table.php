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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id');
            $table->string('name');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
            $table->string('subject_id')->nullable();
            $table->string('qualification');
            $table->string('address');
            $table->tinyInteger('status_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
