<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('type');
            $table->timestamp('date');
            $table->string('city');
            $table->bigInteger('total_created_energy');
            $table->integer('amount_of_people');
            $table->timestamps();
        });

        Schema::create('event_participant', function (Blueprint $table) {
            $table->integer('event_id');
            $table->integer('participant_id');
            $table->bigInteger('amount_created_energy');
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
        Schema::dropIfExists('events');
        Schema::dropIfExists('event_participant');
    }
}
