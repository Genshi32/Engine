<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnologyMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technology_masters', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')
            ->references('id')->on('category_masters')
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
        Schema::dropIfExists('technology_masters');
    }
}