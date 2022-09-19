<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('list_type_id')->constrained()->onDelete('cascade');
            $table->integer('lists_category_id')->constrained()->onDelete('cascade');
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->string('anons_image')->nullable();
            $table->text('body_image')->nullable();
            $table->tinyInteger('show_on_slider')->index()->nullable();
            $table->tinyInteger('pdf_type')->index()->nullable();
            $table->string('video_code')->nullable();
            $table->string('video')->nullable();
            $table->tinyInteger('media_type')->index()->nullable();
            $table->string('link')->nullable();
            $table->string('date_register')->nullable();
            $table->tinyInteger('link_type')->index()->nullable();
            $table->integer('parent_id')->nullable();
            $table->tinyInteger('right_menu')->index()->nullable();
            $table->date('date')->nullable();
            $table->integer('order')->nullable();
            $table->integer('count_view')->unsigned()->default(0)->nullable();
            $table->tinyInteger('status')->index();
            $table->foreignId('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('modifier_id')->constrained()->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('lists');
    }
}
