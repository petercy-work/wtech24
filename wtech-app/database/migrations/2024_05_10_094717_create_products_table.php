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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name
            $table->text('description'); // Description
            $table->decimal('price', 10, 2); // Price
            $table->integer('quantity'); // Quantity
            $table->string('availability', 20)->default('available'); // Availability ('available', 'unavailable')
            $table->timestamp('deleted_at')->nullable(); // Soft delete (deleted_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
