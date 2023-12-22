<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('subscription')->index()->nullable();
            $table->foreign('subscription')->references('id')->on('subscriptions')->onDelete('cascade');
            $table->double('amount_paid',10,2)->nullable();
            $table->unsignedBigInteger('subscriber')->index()->nullable();
            $table->foreign('subscriber')->references('id')->on('users')->onDelete('cascade');

            $table->double('earning',10,2)->nullable();

            $table->string('payment_method',30)->nullable();


            $table->string('account_number',30)->nullable();
            $table->string('bank_name',50)->nullable();
            $table->string('ref_number',30)->nullable();
            $table->string('date_of_payment',30)->nullable();

            $table->string('status',30)->nullable();
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
        Schema::dropIfExists('payments');
    }
}
