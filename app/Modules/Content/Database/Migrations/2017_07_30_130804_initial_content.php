<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("services", function (Blueprint $blueprint) {
            $blueprint->increments("id");
            $blueprint->string("slug")->unique();
            $blueprint->text("header");
            $blueprint->text("image");
            $blueprint->text("preview_text");
            $blueprint->text("text");
            $blueprint->boolean("is_public");
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("services");
    }
}
