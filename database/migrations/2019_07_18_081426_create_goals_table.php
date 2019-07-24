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
              'name' => 'Laptop battery',
              'threshold' => 75,
              'emblem_path' => 'images/laptop.svg',
              'emblem_color' => '#272382',
              'lottie_path' => '',
              'description' => 'You generated enough energy to fuel a street light for 5 minutes!'
            ],
            [
              'name' => 'Playing PS4',
              'threshold' => 250,
              'emblem_path' => 'images/game.svg',
              'emblem_color' => '#E62B87',
              'lottie_path' => '',
              'description' => 'The energy you generated is enough to boil eggs!'
            ],
            [
              'name' => 'Electric scooter',
              'threshold' => 500,
              'emblem_path' => 'images/scooter.svg',
              'emblem_color' => '#DB0015',
              'lottie_path' => '',
              'description' => 'With the energy generated a laptop could be charged for an hour!',
            ],
            [
              'name' => 'Using a blender',
              'threshold' => 800,
              'emblem_path' => 'images/blender.svg',
              'emblem_color' => '#FACA08',
              'lottie_path' => '',
              'description' => 'With the energy you generated, you could make coffee!'
            ],
            [
              'name' => 'Warming a lasagna',
              'threshold' => 1250,
              'emblem_path' => 'images/oven.svg',
              'emblem_color' => '#552382',
              'lottie_path' => '',
              'description' => 'You generated enough energy to make smoothies!'
            ],
            [
              'name' => '750.000 Searches on Google',
              'threshold' => 3750,
              'emblem_path' => 'images/google_search.svg',
              'emblem_color' => '#00AAFF',
              'lottie_path' => '',
              'description' => 'The energy generated is enough for a 2 hours Playstation 4 game session!'
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
