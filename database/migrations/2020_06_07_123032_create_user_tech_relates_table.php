<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTechRelatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tech_relates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_info_id')->unsigned();
            $table->foreign('user_info_id')
            ->references('id')->on('user_infoes')
            ->onDelete('cascade');

            $table->bigInteger('technology_master_id')->unsigned();
            $table->foreign('technology_master_id')
            ->references('id')->on('technology_masters')
            ->onDelete('cascade');
            
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
        Schema::dropIfExists('user_tech_relates');
    }
}
