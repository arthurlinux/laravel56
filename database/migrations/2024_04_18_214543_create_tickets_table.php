<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('modulo_id')->foreign('modulo_id')->references('id')->on('modulos');
            $table->bigInteger('admins_id')->foreign('admins_id')->references('id')->on('users');
            $table->string('titulo');
            $table->enum('prioridad',['ALTA', 'MEDIA', 'BAJA'])->default('BAJA');
            $table->string('comentarios')->text;
            $table->string('ip_address')->ipAddress;
            $table->enum('status',['NUEVO','AESPERA', 'ENPROG', 'PENDIENTE','CANCELADO','CERRADO'])->default('NUEVO');
            $table->string('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 'NUEVO','AESPERA','ENPROG','PENDIENTE','CERR','CANCELADO'
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
