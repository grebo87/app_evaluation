<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('companies', function(Blueprint $table){
            $table->increments('id');
            $table->string('var_razon_social', 100);
            $table->string('var_nombre_comercial', 100)->nullable();
            $table->string('var_nro_documento', 15);
            $table->string('var_direccion', 100)->nullable();
            $table->string('var_telefono', 50)->nullable();
            $table->string('var_celular', 50)->nullable();
            $table->string('var_email', 100)->nullable();
            $table->string('var_pais', 50)->nullable();
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
        Schema::dropIfExists('companies');
    }
}
