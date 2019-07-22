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
              'emblem_path' => 'images/lamp.svg',
              'emblem_color' => '#272382',
              'lottie_path' => '',
              'description' => 'You generated enough energy to fuel a street light for 5 minutes!'
            ],
            [
              'name' => 'Boiled eggs',
              'threshold' => 50,
              'emblem_path' => 'images/boiled_egg.svg',
              'emblem_color' => '#E62B87',
              'lottie_path' => '',
              'description' => 'The energy you generated is enough to boil eggs!'
            ],
            [
              'name' => 'Coffee cans',
              'threshold' => 100,
              'emblem_path' => 'images/coffee_pot.svg',
              'emblem_color' => '#FACA08',
              'lottie_path' => '',
              'description' => 'With the energy you generated, you could make coffee!'
            ],
            [
              'name' => 'Fresh fruit smoothie',
              'threshold' => 200,
              'emblem_path' => 'images/blender.svg',
              'emblem_color' => '#552382',
              'lottie_path' => '',
              'description' => 'You generated enough energy to make smoothies!'
            ],
            [
              'name' => 'Minute of gameplay',
              'threshold' => 350,
              'emblem_path' => 'images/game.svg',
              'emblem_color' => '#552382',
              'lottie_path' => '',
              'description' => 'The energy generated is enough for a 2 hours Playstation 4 game session!'
            ],
            [
              'name' => 'Batteries charged',
              'threshold' => 450,
              'emblem_path' => 'images/laptop.svg',
              'emblem_color' => '#552382',
              'lottie_path' => '',
              'description' => 'With the energy generated a laptop could be charged for an hour!',
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
