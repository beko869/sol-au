<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sols', function (Blueprint $table) {
            $table->id();
            $table->integer( 'sol_key' );
            $table->float( 'max_temp', 13, 2 );
            $table->float( 'min_temp', 13, 2 );
            $table->float( 'avg_temp', 13, 2 );
            $table->float( 'max_windspeed', 13, 2 );
            $table->float( 'min_windspeed', 13, 2 );
            $table->float( 'avg_windspeed', 13, 2 );
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
        Schema::dropIfExists('sols');
    }
}
