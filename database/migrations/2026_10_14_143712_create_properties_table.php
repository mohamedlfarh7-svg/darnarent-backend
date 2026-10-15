<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->json('title');
            $table->json('description');
            $table->string('city');
            $table->string('address');
            $table->enum('property_type', ['maison', 'appartement', 'villa', 'studio', 'bureau']);
            $table->enum('contract_type', ['daily', 'monthly']);
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->json('amenities')->nullable();
            $table->json('images');
            $table->decimal('starting_price', 10, 2);
            $table->decimal('current_bid', 10, 2);
            $table->decimal('min_bid_increment', 10, 2);
            $table->boolean('is_approved')->default(false); 
            $table->enum('status', ['active', 'closed', 'cancelled'])->default('active');
            $table->timestamp('expires_at')->nullable();
            $table->foreignId('winner_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};