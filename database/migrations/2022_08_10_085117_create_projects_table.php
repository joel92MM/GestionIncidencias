<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->increments('id');

            $table->string('name');
            $table->string('descripcion');
            $table->date('start')->nullable();

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
        //Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('projects');
        //Schema::enableForeignKeyConstraints();

    }
}
