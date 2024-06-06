<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('atestados', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('farmaceutico_id');
            $table->unsignedBigInteger('cliente_id');
            $table->date('dt_inicio')->nullable(false);
            $table->date('dt_fim')->nullable(false);
            $table->string('diagnostico', 30)->nullable(false);
            $table->text('descricao');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('atestados', function (Blueprint $table){
            $table->foreign('farmaceutico_id')->references('id')->on('farmaceuticos');
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('atestados', function (Blueprint $table) {
            $table->dropForeign('atestados_farmaceutico_id_foreign');
            $table->dropForeign('atestados_cliente_id_foreign');
        });
        
        Schema::dropIfExists('atestados');
    }
};
