<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('officers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')->nullable()->constrained()->nullOnDelete();
            $table->string('member_id')->unique()->nullable();
            $table->string('name');
            $table->string('position'); 
            $table->string('sub_role')->nullable(); 
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(100);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index('position');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('officers');
    }
};