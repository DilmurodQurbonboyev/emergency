<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('list_type_id')->constrained()->onDelete('cascade');
            $table->integer('parent_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->index();
            $table->foreignId('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('modifier_id')->constrained()->onDelete('cascade')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('list_categories');
    }
}
