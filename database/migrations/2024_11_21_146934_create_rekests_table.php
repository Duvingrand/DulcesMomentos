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
        Schema::create('rekests', function (Blueprint $table) {
            $table->id();
            $table->date('delivery_day');
            $table->unsignedBigInteger('client_id');
            $table->string('status'); // Estado de la reservación: Pendiente, Confirmada, Cancelada
            $table->timestamps();
            // foreign keys
            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekests');
    }
};
