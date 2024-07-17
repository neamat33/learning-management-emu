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
        Schema::create('account_transaction_category', function (Blueprint $table) {
            $table->id();
            $table->string('tnx_name');
            $table->tinyInteger('parent_id')->default(0);
            $table->tinyInteger('tnx_type')->comment('1-Income, 2=expense');
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
        Schema::dropIfExists('account_transaction_category');
    }
};
