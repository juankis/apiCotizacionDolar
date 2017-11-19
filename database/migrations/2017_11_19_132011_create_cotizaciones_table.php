<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('base')->nullable();
            $table->string('moneda')->nullable();
            $table->decimal('cotizacion', 10 , 2)->default(0);
            $table->timestamps();
        });

        DB::table('cotizaciones') ->insert(array(
            'id' => '1',
            'base' => 'USD',
            'moneda' => 'BOB',
            'cotizacion' => '7.89',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ));

        DB::table('cotizaciones') ->insert(array(
            'id' => '2',
            'base' => 'USD',
            'moneda' => 'BOB',
            'cotizacion' => '6.89',
            'created_at' => date("2017-11-12 H:i:s"),
            'updated_at' => date("2017-11-12 H:i:s")
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizaciones');
    }
}
