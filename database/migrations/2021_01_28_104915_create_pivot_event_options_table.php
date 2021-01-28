<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotEventOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_event_options', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('option_id')->unsigned();
            $table->bigInteger('event_id')->unsigned();
            $table->integer('price');
            $table->timestamps();

            $table->foreign('option_id')->references('id')->on('event_options')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pivot_event_options');
    }
}
