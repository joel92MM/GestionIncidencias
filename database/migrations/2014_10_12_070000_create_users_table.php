<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->increments('id');

            $table->string('name');
            $table->string('email')->unique();

            $table->string('password')->default('123456789');

            $table->smallInteger('role')->default(2);

            $table->integer('selected_project_id')->unsigned()->nullable();
            $table->foreign('selected_project_id')->references('id')->on('projects');

            $table->rememberToken();

            //agrega a nuestra tabla de usuarios un campo deletestamps
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
        Schema::dropIfExists('users');
        //Schema::enableForeignKeyConstraints();

    }
}
