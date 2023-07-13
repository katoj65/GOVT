<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->integer('ministryID');
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->string('venue');
            $table->string('guest');
            $table->date('date');
            $table->time('time');
            $table->string('logo')->nullable();
            $table->enum('status',['pending','cancelled','ended'])->default('pending');
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
        Schema::dropIfExists('event');
    }
};
