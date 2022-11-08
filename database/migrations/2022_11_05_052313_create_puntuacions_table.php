<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuntuacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntuacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipo_id')->constrained();
            $table->foreignId('problema_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('enlace');
            $table->string('reemix');
            $table->bigInteger('intentos');
            $table->enum('estado',['Aceptado','Rechazado','Parcialemte Aceptado']);
            $table->bigInteger('puesto');
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
        Schema::dropIfExists('puntuacions');
    }
}
