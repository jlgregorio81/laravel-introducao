<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            //..cria o campo 'id' e já o define como chave primária
            $table->id();
            //..define um campo string 'name' com 50 caracteres de comprimento
            $table->string('name', 50);
            //..define um campo 'age' 
            $table->integer('age');
            //..timestamps cria as colunas created_at e updated_at (padrão/opcional)
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
        Schema::dropIfExists('clients');
    }
}
