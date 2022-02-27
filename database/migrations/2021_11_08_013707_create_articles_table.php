<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id('ID_ARTICLE');
            $table->string('NOM_ARTICLE')->unique();
            $table->string('CATEGORIE_ARTICLE');
            $table->float('PRIX_HT_ARTICLE');
            $table->string('REF_ARTICLE');
            $table->string('DESCRIPTION');
            $table->string('IMAGE');
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
        Schema::dropIfExists('articles');
    }
}
