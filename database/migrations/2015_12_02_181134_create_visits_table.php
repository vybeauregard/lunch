<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('place_id')->unsigned();
        });

        DB::table('visits')->insert([
            ['date' => '2015-03-23', 'place_id' => 1],
            ['date' => '2015-03-24', 'place_id' => 3],
            ['date' => '2015-04-06', 'place_id' => 8],
            ['date' => '2015-04-02', 'place_id' => 4],
            ['date' => '2015-04-03', 'place_id' => 1],
            ['date' => '2015-04-13', 'place_id' => 1],
            ['date' => '2015-04-14', 'place_id' => 5],
            ['date' => '2015-04-16', 'place_id' => 26],
            ['date' => '2015-04-15', 'place_id' => 27],
            ['date' => '2015-04-10', 'place_id' => 18],
            ['date' => '2015-04-21', 'place_id' => 4],
            ['date' => '2015-04-20', 'place_id' => 5],
            ['date' => '2015-04-17', 'place_id' => 6],
            ['date' => '2015-04-22', 'place_id' => 28],
            ['date' => '2015-04-23', 'place_id' => 29],
            ['date' => '2015-04-27', 'place_id' => 1],
            ['date' => '2015-04-29', 'place_id' => 11],
            ['date' => '2015-04-28', 'place_id' => 31],
            ['date' => '2015-04-24', 'place_id' => 27],
            ['date' => '2015-04-30', 'place_id' => 27],
            ['date' => '2015-05-04', 'place_id' => 5],
            ['date' => '2015-05-05', 'place_id' => 7],
            ['date' => '2015-05-08', 'place_id' => 31],
            ['date' => '2015-05-11', 'place_id' => 32],
            ['date' => '2015-05-06', 'place_id' => 27],
            ['date' => '2015-05-07', 'place_id' => 6],
            ['date' => '2015-05-12', 'place_id' => 8],
            ['date' => '2015-05-18', 'place_id' => 2],
            ['date' => '2015-05-14', 'place_id' => 5],
            ['date' => '2015-05-19', 'place_id' => 33],
            ['date' => '2015-05-28', 'place_id' => 5],
            ['date' => '2015-05-27', 'place_id' => 3],
            ['date' => '2015-05-26', 'place_id' => 29],
            ['date' => '2015-05-29', 'place_id' => 1],
            ['date' => '2015-09-02', 'place_id' => 2],
            ['date' => '2015-09-24', 'place_id' => 34],
            ['date' => '2015-09-23', 'place_id' => 5],
            ['date' => '2015-09-21', 'place_id' => 29],
            ['date' => '2015-09-22', 'place_id' => 6],
            ['date' => '2015-09-25', 'place_id' => 35],
            ['date' => '2015-09-28', 'place_id' => 5],
            ['date' => '2015-09-29', 'place_id' => 1],
            ['date' => '2015-10-01', 'place_id' => 3],
            ['date' => '2015-09-30', 'place_id' => 28],
            ['date' => '2015-10-02', 'place_id' => 2],
            ['date' => '2015-10-06', 'place_id' => 27],
            ['date' => '2015-10-05', 'place_id' => 23],
            ['date' => '2015-10-07', 'place_id' => 1],
            ['date' => '2015-10-12', 'place_id' => 31],
            ['date' => '2015-10-09', 'place_id' => 6],
            ['date' => '2015-10-13', 'place_id' => 4],
            ['date' => '2015-10-14', 'place_id' => 29],
            ['date' => '2015-10-15', 'place_id' => 1],
            ['date' => '2015-10-16', 'place_id' => 36],
            ['date' => '2015-10-19', 'place_id' => 6],
            ['date' => '2015-10-21', 'place_id' => 3],
            ['date' => '2015-10-20', 'place_id' => 3],
            ['date' => '2015-10-23', 'place_id' => 32],
            ['date' => '2015-10-22', 'place_id' => 34],
            ['date' => '2015-10-26', 'place_id' => 5],
            ['date' => '2015-10-29', 'place_id' => 27],
            ['date' => '2015-10-28', 'place_id' => 27],
            ['date' => '2015-10-27', 'place_id' => 8],
            ['date' => '2015-11-02', 'place_id' => 20],
            ['date' => '2015-11-03', 'place_id' => 1],
            ['date' => '2015-11-04', 'place_id' => 3],
            ['date' => '2015-11-09', 'place_id' => 4],
            ['date' => '2015-11-12', 'place_id' => 1],
            ['date' => '2015-11-16', 'place_id' => 3],
            ['date' => '2015-11-17', 'place_id' => 27],
            ['date' => '2015-11-18', 'place_id' => 5],
            ['date' => '2015-11-19', 'place_id' => 27],
            ['date' => '2015-11-23', 'place_id' => 3]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('visits');
    }
}
