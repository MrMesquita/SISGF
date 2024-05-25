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
        Schema::create('item_compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id')->nullable(false);
            $table->unsignedBigInteger('compra_id')->nullable(false);
            $table->integer('quantidade')->nullable(false);
            $table->decimal('preco_unitario', 10, 2);
            $table->timestamps();
        });

        Schema::table('item_compras', function (Blueprint $table) {
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('compra_id')->references('id')->on('compras');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_compras', function (Blueprint $table) {
            $table->dropForeign('item_compras_produto_id_foreign');
            $table->dropForeign('item_compras_compra_id_foreign');     
        });

        Schema::dropIfExists('item_compras');
    }
};
