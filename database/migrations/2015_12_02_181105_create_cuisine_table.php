<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuisineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuisine', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cuisinename', 255);
            $table->boolean('active');
        });

        DB::table('cuisine')->insert([
            ['id' => 1, 'cuisinename' => 'Greek', 'active' => 1],
        	['id' => 2, 'cuisinename' => 'Burgers', 'active' => 1],
        	['id' => 3, 'cuisinename' => 'Sandwiches', 'active' => 1],
        	['id' => 4, 'cuisinename' => 'Pizza', 'active' => 1],
        	['id' => 5, 'cuisinename' => 'Mediterranean', 'active' => 1],
        	['id' => 6, 'cuisinename' => 'Mexican', 'active' => 1],
        	['id' => 7, 'cuisinename' => 'Salads', 'active' => 1],
        	['id' => 8, 'cuisinename' => 'Thai', 'active' => 1],
        	['id' => 10, 'cuisinename' => 'Dive', 'active' => 1],
        	['id' => 12, 'cuisinename' => 'Indian', 'active' => 1],
        	['id' => 13, 'cuisinename' => 'Crepes', 'active' => 1],
        	['id' => 14, 'cuisinename' => 'British', 'active' => 1]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cuisine');
    }
}
