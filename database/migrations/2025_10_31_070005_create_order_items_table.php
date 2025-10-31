<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->string('id', 20)->primary();
            $table->string('order_id', 20);
            $table->string('parent_order_item_id', 20)->nullable();

            $table->foreign('order_id')
                ->references('id')->on('orders')
                ->onDelete('cascade');

            $table->foreign('parent_order_item_id')
                ->references('id')->on('order_items')
                ->onDelete('cascade');

            $table->string('orderable_id');
            $table->string('orderable_type');
            $table->index(['orderable_id', 'orderable_type']);
            $table->integer('quantity');
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
