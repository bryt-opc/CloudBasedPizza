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
        Schema::create('pizza_toppings', function (Blueprint $table) {
            $table->string('pizza_id', 20);
            $table->string('topping_id', 20);

            $table->primary(['pizza_id', 'topping_id']);

            $table->foreign('pizza_id')
                ->references('id')->on('pizzas')
                ->onDelete('cascade');

            $table->foreign('topping_id')
                ->references('id')->on('toppings')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizza_toppings');
    }
};
