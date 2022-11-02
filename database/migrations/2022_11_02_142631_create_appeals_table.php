<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appeals', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('organization')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('appeal_type')->index();
            $table->text('address')->nullable();
            $table->string('code')->nullable();
            $table->text('photo')->nullable();
            $table->text('file')->nullable();
            $table->tinyInteger('status')->index()->nullable();
            $table->text('message')->nullable();
            $table->text('answer_file')->nullable();
            $table->text('answer')->nullable();
            $table->tinyInteger('display')->index()->nullable();
            $table->string('user_ip')->nullable();
            $table->text('browser_agent')->nullable();
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
        Schema::dropIfExists('appeals');
    }
}
