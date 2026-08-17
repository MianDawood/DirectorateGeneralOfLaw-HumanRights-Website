<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('publications', function (Blueprint $table) {
            $table->foreignId('category_id')
                ->nullable()
                ->after('category')
                ->constrained('categories')
                ->nullOnDelete();

            $table->string('image_path')->nullable()->after('file_type');
        });

        $categories = DB::table('publications')
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->orderBy('category')
            ->pluck('category')
            ->all();

        foreach ($categories as $categoryName) {
            $id = DB::table('categories')
                ->where('type', 'publication')
                ->where('name', $categoryName)
                ->value('id');

            if (!$id) {
                $id = DB::table('categories')->insertGetId([
                    'name' => $categoryName,
                    'type' => 'publication',
                    'sort_order' => 0,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::table('publications')
                ->where('category', $categoryName)
                ->update(['category_id' => $id]);
        }
    }

    public function down(): void
    {
        Schema::table('publications', function (Blueprint $table) {
            $table->dropConstrainedForeignId('category_id');
            $table->dropColumn('image_path');
        });
    }
};