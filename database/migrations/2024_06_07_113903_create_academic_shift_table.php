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
        Schema::create('academic_shift', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id');
            $table->string('shift_name');
            $table->time('shift_start');
            $table->time('shift_end');
            $table->tinyInteger('status_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_shift');
    }
};
