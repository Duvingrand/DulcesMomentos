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
        Schema::create('product_in_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('rekest_id');
            $table->string("personalization");
            $table->timestamps();

            //foreign keys
            $table->foreign('product_id')->references('id')->on('products')->onDelete("cascade");
            $table->foreign('rekest_id')->references('id')->on('rekests')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_in_requests');
    }
};
