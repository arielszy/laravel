<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('op_list', function (Blueprint $table) {
            $table->id();
            $table->integer('Client_id');
            $table->string('Tipo');
            $table->double('Importe')->default(0.00);
            $table->float('Puntos')->default(0);
            $table->string('Comentarios')->default('');
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
        Schema::dropIfExists('op_lists');
    }
}
