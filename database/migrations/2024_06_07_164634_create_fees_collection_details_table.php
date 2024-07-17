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
        Schema::create('fees_collection_details', function (Blueprint $table) {
            $table->id();
            $table->integer('fees_collection_id');
            $table->integer('tnx_fees_cat');
            $table->decimal('tnx_amount',12,2);
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
        Schema::dropIfExists('fees_collection_details');
    }
};
