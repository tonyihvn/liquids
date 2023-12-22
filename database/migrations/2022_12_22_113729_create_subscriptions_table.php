<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('plan_name')->index()->nullable();
            $table->foreign('plan_name')->references('id')->on('plans')->onDelete('cascade');

            $table->unsignedBigInteger('subscriber')->index()->nullable();
            $table->foreign('subscriber')->references('id')->on('users')->onDelete('cascade');

            $table->double('quantity',10,2)->nullable();

            $table->double('duration',10,2)->nullable();

            $table->date('date_subscribed')->nullable();
            $table->date('subscription_enddate')->nullable();
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
        Schema::dropIfExists('subscriptions');
    }
}
