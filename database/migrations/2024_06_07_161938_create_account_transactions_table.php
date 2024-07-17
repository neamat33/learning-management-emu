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
        Schema::create('account_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id');
            $table->integer('tnx_type_id');
            $table->integer('tnx_cat_id');
            $table->integer('tnx_subcat_id');
            $table->integer('tnx_ac_id');
            $table->integer('tnx_user_type');
            $table->integer('tnx_user_id');
            $table->decimal('tnx_amount',11,2);
            $table->integer('payment_method');
            $table->text('payment_method_des')->nullable();
            $table->date('tnx_date');
            $table->text('tnx_note')->nullable();
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
        Schema::dropIfExists('account_transactions');
    }
};
