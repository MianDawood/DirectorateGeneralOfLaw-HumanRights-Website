<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->foreignId('category_id')
                ->nullable()
                ->after('subject')
                ->constrained('categories')
                ->nullOnDelete();
        });

        $subjects = DB::table('events')
            ->whereNotNull('subject')
            ->where('subject', '!=', '')
            ->distinct()
            ->orderBy('subject')
            ->pluck('subject')
            ->all();

        foreach ($subjects as $subject) {
            $id = DB::table('categories')
                ->where('type', 'event')
                ->where('name', $subject)
                ->value('id');

            if (!$id) {
                $id = DB::table('categories')->insertGetId([
                    'name' => $subject,
                    'type' => 'event',
                    'sort_order' => 0,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::table('events')
                ->where('subject', $subject)
                ->update(['category_id' => $id]);
        }
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropConstrainedForeignId('category_id');
        });
    }
};