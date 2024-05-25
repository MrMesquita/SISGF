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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 30)->nullable(false);
            $table->string('email', 50)->nullable(false);
            $table->integer('telefone_id');
            $table->double('documento')->nullable(false)->unique();
            $table->string('password');
            $table->string('rua', 30);
            $table->string('bairro', 30);
            $table->string('cidade', 30);
            $table->integer('cep');
            $table->string('pais');
            $table->string('complemento');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
