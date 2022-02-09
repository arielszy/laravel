<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->string('key')->default('')->unique();
            $table->string('value')->default('');
        });
        DB::table('configs')->insert([
            'key' => 'store_name',
            'value' => 'Minimarket',
        ]);
        DB::table('configs')->insert([
            'key' => 'points_redeem',
            'value' => '100',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
