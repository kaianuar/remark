<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actormovie', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movie_id')->unsigned();             
            $table->integer('actor_id')->unsigned();    
            $table->integer('location_id')->unsigned(); 
            $table->integer('country_id')->unsigned();      
            $table->foreign('movie_id')->references('id')->on('movies');  
            $table->foreign('actor_id')->references('id')->on('actors');   
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('country_id')->references('id')->on('countries');       
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actormovie');
    }
}
