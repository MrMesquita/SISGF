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
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome',30)->nullable(false);
            $table->string('documento')->nullable(false);
            $table->integer('telefone')->default(000000000000);
            $table->unsignedBigInteger('codigo')->nullable(false)->unique();
            $table->unsignedBigInteger('drogaria_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();
            
        });

        Schema::table('funcionarios', function (Blueprint $table) {
            $table->foreign('drogaria_id')->references('id')->on('drogarias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->dropUnique('funcionarios_codigo_unique');
            $table->dropForeign('funcionarios_drogaria_id_foreign');
        });

        Schema::dropIfExists('funcionarios');
    }
};
