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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id');
            $table->string('account_name');
            $table->integer('acc_type_id')->COMMENT('1=Bank Account, 2=Cash Account, 3=mobile Bank Account');
            $table->integer('bank_id');
            $table->string('branch_name');
            $table->text('address');
            $table->string('account_no');
            $table->decimal('tnx_charge',12,2)->nullable();
            $table->decimal('initial_blance',12,2)->default(0);
            $table->decimal('curr_blance',12,2)->default(0);
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
        Schema::dropIfExists('accounts');
    }
};
