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
        Schema::create('user_report', function (Blueprint $table) {
            $table->id();
            $table->integer('userID');
            $table->string('telephone');
            $table->integer('crimeID');
            $table->integer('regionID');
            $table->integer('stationID');
            $table->enum('status',['pending','oc','dpc','igp','president'])->default('pending');
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
        Schema::dropIfExists('user_report');
    }
};
