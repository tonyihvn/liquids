<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name',30)->unique();
            $table->double('amount',10,2)->nullable();
            $table->double('duration',10,2)->nullable();
            $table->string('plan_info',100)->nullable();
            $table->string('status',30)->nullable();
            $table->timestamps();
        });

        DB::table('plans')->insert(
            [
                [
                    'plan_name' => 'Quartz',
                    'amount' => 200,
                    'duration'=> 3,
                    'plan_info'=>'Invest and earn 36% profit within 3 months',
                    'status'=>'Open'
                ],
                [
                    'plan_name' => 'Tupaz',
                    'amount' => 400,
                    'duration'=> 3,
                    'plan_info'=>'Invest and earn 36% profit within 3 months',
                    'status'=>'Open'
                ],
                [
                    'plan_name' => 'Tin/Columbite',
                    'amount' => 500,
                    'duration'=> 3,
                    'plan_info'=>'Invest and earn 36% profit within 3 months',
                    'status'=>'Open'
                ],
                [
                    'plan_name' => 'Precious Stones',
                    'amount' => 1000,
                    'duration'=> 3,
                    'plan_info'=>'Invest and earn 36% profit within 3 months',
                    'status'=>'Open'
                ],
                [
                    'plan_name' => 'Gold',
                    'amount' => 1500,
                    'duration'=> 3,
                    'plan_info'=>'Invest and earn 36% profit within 3 months',
                    'status'=>'Open'
                ],
                [
                    'plan_name' => 'Diamond',
                    'amount' => 2000,
                    'duration'=> 3,
                    'plan_info'=>'Invest and earn 36% profit within 3 months',
                    'status'=>'Open'
                ]
            ]

        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
