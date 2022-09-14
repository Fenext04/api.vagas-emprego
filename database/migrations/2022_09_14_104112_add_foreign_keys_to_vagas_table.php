<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vagas', function (Blueprint $table) {
            $table->foreign(['modalidade_id'], 'fk_vaga_modalidade')->references(['id'])->on('modalidades');
            $table->foreign(['tipo_id'], 'fk_vaga_tipo')->references(['id'])->on('tipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vagas', function (Blueprint $table) {
            $table->dropForeign('fk_vaga_modalidade');
            $table->dropForeign('fk_vaga_tipo');
        });
    }
}
