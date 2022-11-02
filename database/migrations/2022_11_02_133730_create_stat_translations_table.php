<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stat_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stat_id');
            $table->string('title')->nullable();
            $table->string('locale')->index();
            $table->unique(['stat_id', 'locale']);
            $table->foreign('stat_id')->references('id')->on('stats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stat_translations');
    }
}
