<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earnings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('subscription')->index()->nullable();
            $table->foreign('subscription')->references('id')->on('subscriptions')->onDelete('cascade');

            $table->unsignedBigInteger('subscriber')->index()->nullable();
            $table->foreign('subscriber')->references('id')->on('users')->onDelete('cascade');

            $table->double('earning',10,2)->nullable();

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
        Schema::dropIfExists('earnings');
    }
}
