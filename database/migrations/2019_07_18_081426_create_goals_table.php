<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('threshold');
            $table->string('emblem_path');
            $table->string('lottie_path');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('goals')->insert([
            [
              'name' => 'LED bulb',
              'threshold' => 80,
              'emblem_path' => 'images/noun_Microwave_1967465.svg',
              'lottie_path' => '',
              'description' => 'You generated enough energy to fuel a street light for 5 minutes!'
            ],
            [
              'name' => 'Brain',
              'threshold' => 20,
              'emblem_path' => 'images/noun_Game_1967460.svg',
              'lottie_path' => '',
              'description' => 'During a timespan of 10 hours the average adult brain consumes 200Wh'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goals');
    }
}
