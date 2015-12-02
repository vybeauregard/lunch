<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceCuisineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_cuisine', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('place_id')->unsigned();
            $table->integer('cuisine_id')->unsigned();
        });

        DB::table('place_cuisine')->insert([
            ['place_id' => 2, 'cuisine_id' => 2],
            ['place_id' => 5, 'cuisine_id' => 3],
            ['place_id' => 4, 'cuisine_id' => 3],
            ['place_id' => 4, 'cuisine_id' => 4],
            ['place_id' => 6, 'cuisine_id' => 3],
            ['place_id' => 11, 'cuisine_id' => 4],
            ['place_id' => 11, 'cuisine_id' => 3],
            ['place_id' => 18, 'cuisine_id' => 5],
            ['place_id' => 18, 'cuisine_id' => 3],
            ['place_id' => 3, 'cuisine_id' => 5],
            ['place_id' => 3, 'cuisine_id' => 7],
            ['place_id' => 3, 'cuisine_id' => 3],
            ['place_id' => 23, 'cuisine_id' => 6],
            ['place_id' => 1, 'cuisine_id' => 1],
            ['place_id' => 24, 'cuisine_id' => 5],
            ['place_id' => 7, 'cuisine_id' => 4],
            ['place_id' => 7, 'cuisine_id' => 3],
            ['place_id' => 26, 'cuisine_id' => 10],
            ['place_id' => 8, 'cuisine_id' => 6],
            ['place_id' => 28, 'cuisine_id' => 2],
            ['place_id' => 28, 'cuisine_id' => 3],
            ['place_id' => 29, 'cuisine_id' => 12],
            ['place_id' => 31, 'cuisine_id' => 7],
            ['place_id' => 31, 'cuisine_id' => 3],
            ['place_id' => 32, 'cuisine_id' => 2],
            ['place_id' => 32, 'cuisine_id' => 7],
            ['place_id' => 33, 'cuisine_id' => 13],
            ['place_id' => 34, 'cuisine_id' => 1],
            ['place_id' => 34, 'cuisine_id' => 12],
            ['place_id' => 34, 'cuisine_id' => 5],
            ['place_id' => 34, 'cuisine_id' => 6],
            ['place_id' => 34, 'cuisine_id' => 4],
            ['place_id' => 34, 'cuisine_id' => 7],
            ['place_id' => 34, 'cuisine_id' => 3],
            ['place_id' => 35, 'cuisine_id' => 14],
            ['place_id' => 36, 'cuisine_id' => 2],
            ['place_id' => 36, 'cuisine_id' => 3],
            ['place_id' => 20, 'cuisine_id' => 10],
            ['place_id' => 20, 'cuisine_id' => 6],
            ['place_id' => 20, 'cuisine_id' => 3]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('place_cuisine');
    }
}
