<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSugerenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sugerencias', function (Blueprint $table) {
            $table->id();
            $table->string('cedula',11);
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->string('tipo',30);
            $table->text('descripcion');
            $table->text('auditoria')->nullable();
            $table->string('contacto',100)->nullable();
            $table->string('usuario_modificador',50)->nullable();
            $table->string('usuario_creador',50);
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
        Schema::dropIfExists('sugerencias');
    }
}
