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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id')->nullable(false);
            $table->unsignedBigInteger('codigo_funcionario')->nullable(false);
            $table->date('dt_compra')->nullable(false);
            $table->string('tipo_pagamento')->nullable(false);
            $table->decimal('valor_total')->nullable(false);
            $table->timestamps();
        });
        
        Schema::table('compras', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('codigo_funcionario')->references('codigo')->on('funcionarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compras', function (Blueprint $table) {
            $table->dropForeign('compras_cliente_id_foreign');
            $table->dropForeign('compras_codigo_funcionario_foreign');
        });

        Schema::dropIfExists('compras');
    }
};
