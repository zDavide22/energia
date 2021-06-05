<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnergiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatore', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('POD')->nullable();
            $table->string('PDR')->nullable();
            $table->string('Modello')->nullable();
            $table->string('Tipo');           
        });
        Schema::create('lettura', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data');
            $table->decimal('vLetto',8,3);
            $table->string('tipo');
            $table->unsignedBigInteger('idCont')->nullable();
            $table->foreign('idCont')->references('id')->on('contatore');   
            $table->timestamps();
        });
        Schema::create('bollette', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->decimal('consumo',8,3);
            $table->decimal('quotafissa',6,2);
            $table->decimal('quotavariabile',6,2);
            $table->decimal('spesatrasporto',6,2);
            $table->decimal('totale',6,2);
            $table->string('mese');
            $table->date('data');
            $table->boolean('pagato');
            $table->string('tipo');
            $table->unsignedBigInteger('idContatore');
            $table->foreign('idContatore')->references('id')->on('contatore');
            $table->unsignedBigInteger('idCliente');
            $table->foreign('idCliente')->references('id')->on('users');
        });
        Schema::create('contratto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('kwmassimi')->nullable();
            $table->integer('mcgas')->nullable();
            $table->date('dataAttivazione')->useCurrent();
            $table->decimal('prezzo', 7, 2);
            $table->decimal('prezzoKw',7,2);
            $table->string('indirizzo')->nullable();
            $table->string('citta')->nullable();
            $table->integer('cap')->nullable();
            $table->string('tipo');
            $table->string('categoria');
            $table->unsignedBigInteger('idCliente')->nullable();
            $table->foreign('idCliente')->references('id')->on('users');
            $table->unsignedBigInteger('idC')->nullable();
            $table->foreign('idC')->references('id')->on('contatore');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lettura');
        Schema::dropIfExists('contatore');
        Schema::dropIfExists('bollette');
        Schema::dropIfExists('contratto');
    }
}
