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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('type_id');
            $table->text('description');
            $table->enum('status', ['in_analysis', 'scheduled', 'completed', 'canceled'])->default('in_analysis');
            $table->text('reason_for_cancellation')->nullable();
            $table->dateTime('order_date');
            $table->dateTime('scheduling_date')->nullable();
            $table->dateTime('completion_date')->nullable();
            $table->dateTime('cancellation_date')->nullable();
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('tipo_id')->references('id')->on('tipos_servicos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
