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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',30)->nullable(false);
            $table->text('descricao');
            $table->unsignedBigInteger('categoria_id')->nullable(false)->default(0);
            $table->string('tipo_produto',30)->nullable(false);
            $table->unsignedBigInteger('codigo')->nullable(false)->unique();
            $table->integer('quantidade')->nullable(false);
            $table->decimal('preco');
            $table->unsignedBigInteger('drogaria_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('produtos', function (Blueprint $table) {
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('drogaria_id')->references('id')->on('drogarias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_categoria_id_foreign');
            $table->dropForeign('produtos_drogaria_id_foreign');
        });

        Schema::dropIfExists('produtos');
    }
};
