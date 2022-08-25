<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->increments('id');

            $table->string('name');
            //$table->string('descripcion');

            //$table->unsignedBigInteger('project_id');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')
            ->references('id')
            ->on('projects')
            ->onDelete('cascade');

            // $table->foreignId('project_id')
            // ->constrained('projects')
            // ->nullable();
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
        Schema::dropIfExists('categories');
        //Schema::enableForeignKeyConstraints();
    }
}
