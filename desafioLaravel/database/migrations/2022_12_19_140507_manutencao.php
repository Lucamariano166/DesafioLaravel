<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Manutencao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manutencoes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->integer('id_veiculo');
            $table->string('tipo_de_manutencao');
            $table->string('descricao');
            $table->date('data_para_manutencao');
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
        Schema::dropIfExists('manutencoes');
    }
}
