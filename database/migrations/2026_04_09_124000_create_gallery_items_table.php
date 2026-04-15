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
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->string('type', 20);
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('media_path')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->string('duration', 20)->nullable();
            $table->string('status', 20)->default('active');
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_items');
    }
};
