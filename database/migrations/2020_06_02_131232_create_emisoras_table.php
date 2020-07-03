<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmisorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emisoras', function (Blueprint $table) {
            $table->id();
            $table->string('nombrecadena',250)->nullable(false);
            $table->string('representanteLegal',150)->nullable(false);
            $table->string('representanteComercial',150)->nullable(false);
            $table->string('frecuencia',30)->nullable(false);
            $table->string('direccion',30)->nullable(false);
            $table->string('numeroRadio',30)->nullable(false);
            $table->string('email',250)->nullable(false);
            $table->string('ruc',30)->nullable(false);
            $table->string('descripcion',130)->nullable(false);
            $table->string('telefono',250)->nullable(false);
            $table->string('estacion', 20)->nullable(false);
            $table->string('estado', 1);

            $table->string('nomper1',150);
            $table->string('telper1',150);

            $table->string('nomper2',150);
            $table->string('telper2',150);
            $table->string('autorizacion',150);

            $table->string('departamento',30)->nullable(false);
            $table->string('provincia',30)->nullable(false);
            $table->string('distrito',30)->nullable(false);
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
        Schema::dropIfExists('emisoras');
    }
}
