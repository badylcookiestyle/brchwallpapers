<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsConnectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_connector', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wallpaper_id');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('wallpaper_id')->references('id')->on('wallpapers');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags_connector');
    }
}
