<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ngo_directives', function (Blueprint $table) {
            $table->id();
            // Main Section
            $table->string('heading')->nullable();
            $table->text('desc_1')->nullable();
            $table->text('desc_2')->nullable();
            
            // Card 1
            $table->string('card_1_title')->nullable();
            $table->text('card_1_desc')->nullable();
            
            // Card 2
            $table->string('card_2_title')->nullable();
            $table->text('card_2_desc')->nullable();

            // Extra fields for full page management
            $table->string('hero_image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ngo_directives');
    }
};