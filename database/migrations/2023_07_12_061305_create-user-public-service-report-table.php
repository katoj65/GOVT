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
        Schema::create('user_report_public_service', function (Blueprint $table) {
            $table->id();
            $table->integer('userID');
            $table->string('telephone');
            $table->integer('serviceID');
            $table->integer('issueID');
            $table->enum('status',['pending','secretary','minister','ed','president']);
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
        Schema::dropIfExists('user_report_public_service');
    }
};
