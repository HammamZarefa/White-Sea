<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->double("summation")->default(0);
            $table->double("paid_amount")->default(0);
            $table->double("debt")->default(0);
            $table->double("transmitted")->default(0);
            $table->double("remaining_amount")->default(0);
            $table->timestamps();
        });
        DB::table('statistics')->insert([
            'summation' => 0,
            'paid_amount' => 0,
            'debt' => 0,
            'transmitted' => 0,
            'remaining_amount' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistics');
    }
}
