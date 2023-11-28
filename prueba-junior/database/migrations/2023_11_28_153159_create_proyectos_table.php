<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_finalizacion');
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
};

