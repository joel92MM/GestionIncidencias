<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('incidents', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->increments('id');

            $table->string('title');
            $table->string('descripcion');
            $table->string('severity',1);

            //$table->unsignedBigInteger('category_id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');


            $table->integer('project_id')->unsigned()->nullable();
            $table->foreign('project_id')
            ->references('id')
            ->on('projects')
            ->onDelete('cascade');

            //$table->foreignId('category_id')->constrained('categories');

            //$table->unsignedBigInteger('level_id');
            $table->integer('level_id')->unsigned()->nullable();
            $table->foreign('level_id')
            ->references('id')
            ->on('levels')
            ->onDelete('cascade');

            //$table->foreignId('level_id')->constrained('levels');

            //$table->unsignedBigInteger('client_id');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            //$table->foreignId('client_id')->constrained('users');

            //$table->unsignedBigInteger('support_id');
            $table->integer('support_id')->unsigned()->nullable();
            $table->foreign('support_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            //$table->foreignId('support_id')->constrained('users');

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
        Schema::dropIfExists('incidents');
        //Schema::enableForeignKeyConstraints();

    }
}
