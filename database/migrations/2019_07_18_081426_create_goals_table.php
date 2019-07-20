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
            $table->string('emblem_color');
            $table->string('lottie_path');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('goals')->insert([
            [
              'name' => 'LED bulb',
              'threshold' => 20,
              'emblem_path' => 'images/noun_boiled egg_1962709.svg',
              'emblem_color' => '#272382',
              'lottie_path' => '',
              'description' => 'You generated enough energy to fuel a street light for 5 minutes!'
            ],
            [
              'name' => 'Boiled eggs',
              'threshold' => 50,
              'emblem_path' => 'images/noun_boiled egg_1962709.svg',
              'emblem_color' => '#E62B87',
              'lottie_path' => '',
              'description' => 'During a timespan of 10 hours the average adult brain consumes 200Wh'
            ],
            [
              'name' => 'Coffee cans',
              'threshold' => 100,
              'emblem_path' => 'images/noun_coffee_pot_1967444.svg',
              'emblem_color' => '#FACA08',
              'lottie_path' => '',
              'description' => 'You generated enough energy to fuel a street light for 5 minutes!'
            ],
            [
              'name' => 'Fresh fruit smoothie',
              'threshold' => 200,
              'emblem_path' => 'images/noun_blending machine_1967442.svg',
              'emblem_color' => '#552382',
              'lottie_path' => '',
              'description' => 'During a timespan of 10 hours the average adult brain consumes 200Wh'
            ],
            [
              'name' => 'Minute of gameplay',
              'threshold' => 350,
              'emblem_path' => 'images/noun_game_1967460.svg',
              'emblem_color' => '#552382',
              'lottie_path' => '',
              'description' => 'During a timespan of 10 hours the average adult brain consumes 200Wh'
            ],
            [
              'name' => 'Batteries charged',
              'threshold' => 450,
              'emblem_path' => 'images/noun_laptop_1967457.svg',
              'emblem_color' => '#552382',
              'lottie_path' => '',
              'description' => 'During a timespan of 10 hours the average adult brain consumes 200Wh',
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
