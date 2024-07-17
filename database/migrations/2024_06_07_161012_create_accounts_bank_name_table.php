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
        Schema::create('accounts_bank_name', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name');
            $table->tinyInteger('bank_type')->comment('1= Bank Account, 2=Mobile Bank');
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
        Schema::dropIfExists('accounts_bank_name');
    }
};
