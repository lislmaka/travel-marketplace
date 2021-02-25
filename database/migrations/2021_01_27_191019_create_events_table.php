<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->bigInteger('country_id')->unsigned();
            $table->bigInteger('city_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('activity_id')->unsigned();
            $table->bigInteger('residence_id')->unsigned();
            $table->bigInteger('age_id')->unsigned();
            $table->bigInteger('language_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->string('img');
            $table->text('short_description');
            $table->text('description');
            $table->text('address');
            $table->json('coordinates');
            $table->integer('price');
            $table->integer('old_price')->nullable();
            $table->integer('duration');
            $table->integer('rating')->nullable();
            $table->boolean('active')->default(true);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('event_countries')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('event_cities')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('activity_id')->references('id')->on('event_activities')->onDelete('cascade');
            $table->foreign('residence_id')->references('id')->on('event_residences')->onDelete('cascade');
            $table->foreign('age_id')->references('id')->on('event_ages')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('event_languages')->onDelete('cascade');
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
    }
}
