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
        Schema::table('useful_links', function (Blueprint $table) {
            //
            $table->enum('category',['government','business','social'])->default('government')->after('logo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('useful_links', function (Blueprint $table) {
            //
            $table->enum('category',['government','business','social'])->default('government')->after('logo');
        });
    }
};
