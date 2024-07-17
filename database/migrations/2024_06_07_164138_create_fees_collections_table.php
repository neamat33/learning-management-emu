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
        Schema::create('fees_collections', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id');
            $table->integer('branch_id');
            $table->integer('student_id');
            $table->integer('tnx_ac_id');
            $table->string('tnx_note')->nullable();
            $table->decimal('tnx_amount',12,2);
            $table->decimal('sub_total',12,2)->default(0);
            $table->decimal('discount',12,2)->default(0);
            $table->integer('payment_method');
            $table->string('payment_method_des')->nullable();
            $table->date('date');
            $table->integer('created_by');
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
        Schema::dropIfExists('fees_collections');
    }
};
