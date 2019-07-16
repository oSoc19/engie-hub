<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnergyConsumptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('energy_consumption', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item');
            $table->integer('avg_power');
<<<<<<< HEAD
=======
            $table->string('text');
>>>>>>> backend
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('energy_consumption')->insert([
            [
              'item' => 'LED bulb',
              'avg_power' => 80,
              'text' => 'You generated enough energy to fuel a street light for 5 minutes!'
            ],
            [
              'item' => 'Brain',
              'avg_power' => 20,
              'text' => 'During a timespan of 10 hours the average adult brain consumes 200Wh'
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
        Schema::dropIfExists('energy_consumption');
    }
}
