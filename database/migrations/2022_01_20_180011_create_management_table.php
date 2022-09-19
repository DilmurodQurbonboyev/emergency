<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management', function (Blueprint $table) {
            $table->id();
            $table->foreignId('list_type_id')->constrained()->onDelete('cascade');
            $table->integer('m_category_id')->constrained()->onDelete('cascade');
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->integer('region_id')->nullable();
            $table->string('anons_image')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->integer('main')->nullable();
            $table->string('fax')->nullable();
            $table->integer('order')->nullable();
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
        Schema::dropIfExists('management');
    }
}
