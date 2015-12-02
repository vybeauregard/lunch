<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placename', 255);
            $table->string('location', 255);
            $table->boolean('active');
        });

        DB::table('place')->insert([
            ['id' => 1, 'placename' => 'Maggios', 'location' => 'Vienna', 'active' => 1],
            ['id' => 2, 'placename' => 'Five Guys', 'location' => 'Mall', 'active' => 1],
            ['id' => 3, 'placename' => 'Zoes', 'location' => 'Vienna', 'active' => 1],
            ['id' => 4, 'placename' => 'Santinis', 'location' => 'Oakton', 'active' => 1],
            ['id' => 5, 'placename' => 'Potbelly', 'location' => 'Vienna', 'active' => 1],
            ['id' => 6, 'placename' => 'Cernan', 'location' => 'Vienna', 'active' => 1],
            ['id' => 7, 'placename' => 'Lost Dog', 'location' => 'McLean', 'active' => 1],
            ['id' => 8, 'placename' => 'Anitas', 'location' => 'Vienna', 'active' => 1],
            ['id' => 11, 'placename' => 'Church Street Pizza', 'location' => 'Vienna', 'active' => 1],
            ['id' => 18, 'placename' => 'Noodles & Co.', 'location' => 'Vienna', 'active' => 1],
            ['id' => 20, 'placename' => 'Super Chicken', 'location' => 'Tysons', 'active' => 1],
            ['id' => 23, 'placename' => 'Baja Fresh', 'location' => 'Fairfax (off Nutley) or Falls Church (Broad St)', 'active' => 1],
            ['id' => 24, 'placename' => 'Roti', 'location' => 'Tysons (Rt. 7)', 'active' => 1],
            ['id' => 26, 'placename' => 'Vienna Inn', 'location' => 'Vienna', 'active' => 1],
            ['id' => 27, 'placename' => 'Not a group lunch day', 'location' => 'ZWHQ', 'active' => 1],
            ['id' => 28, 'placename' => 'Fosters Grille', 'location' => 'Vienna', 'active' => 1],
            ['id' => 29, 'placename' => 'Tumeric', 'location' => 'Vienna', 'active' => 1],
            ['id' => 31, 'placename' => 'Panera', 'location' => 'Tysons (Rt. 7)', 'active' => 1],
            ['id' => 32, 'placename' => 'Wendy\'s', 'location' => 'Vienna', 'active' => 1],
            ['id' => 33, 'placename' => 'Crepe Amour', 'location' => 'Vienna', 'active' => 1],
            ['id' => 34, 'placename' => 'Food Trucks', 'location' => 'Greensboro Drive', 'active' => 1],
            ['id' => 35, 'placename' => 'Pure Pasty Company', 'location' => '128 Church St NW, Vienna', 'active' => 1],
            ['id' => 36, 'placename' => 'Caboose Brewing', 'location' => 'Vienna', 'active' => 1]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('places');
    }
}
