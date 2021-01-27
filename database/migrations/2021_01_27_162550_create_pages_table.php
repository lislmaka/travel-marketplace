<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('page_category_id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->text('text');
            $table->boolean('active')->default(false);
            $table->boolean('show')->default(false);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('page_category_id')->references('id')->on('page_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
