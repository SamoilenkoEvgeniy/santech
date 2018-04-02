<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticleInit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("articles", function (Blueprint $blueprint) {
            $blueprint->increments("id");
            $blueprint->string("slug")->unique();
            $blueprint->text("header");
            $blueprint->text("image");
            $blueprint->text("preview_text");
            $blueprint->text("text");
            $blueprint->boolean("is_public");
            $blueprint->timestamps();
        });

        Schema::create('service_article', function (Blueprint $blueprint) {
            $blueprint->increments('id');
            $blueprint->integer('article_id', false, true);
            $blueprint->integer('service_id', false, true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("articles");
    }
}
