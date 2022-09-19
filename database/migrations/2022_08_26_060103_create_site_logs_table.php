<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_logs', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->tinyInteger('type')->nullable();
            $table->integer('row_id');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('authority_id')->references('id')->on('authorities')->onDelete('cascade');
            $table->ipAddress('user_ip');
            $table->text('url');
            $table->string('action');
            $table->string('user_agent', 1023)->nullable();
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
        Schema::dropIfExists('site_logs');
    }
};
