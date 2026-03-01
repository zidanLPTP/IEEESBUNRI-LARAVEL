<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->date('date'); 
            $table->string('time_start'); 
            $table->string('time_end')->nullable(); 
            $table->string('location_name');
            $table->enum('mode', ['onsite', 'online', 'hybrid'])->default('onsite');
            $table->string('category'); 
            $table->string('poster')->nullable();
            $table->string('reg_link')->nullable(); 
            $table->string('status')->default('upcoming'); 
            $table->timestamps();

            $table->index('date'); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};