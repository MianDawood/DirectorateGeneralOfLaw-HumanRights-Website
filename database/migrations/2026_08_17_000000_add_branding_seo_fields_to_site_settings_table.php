<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('site_name')->nullable()->after('contact_address');
            $table->string('logo')->nullable()->after('site_name');
            $table->string('favicon')->nullable()->after('logo');
            $table->string('meta_title')->nullable()->after('favicon');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->string('meta_keywords')->nullable()->after('meta_description');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'site_name',
                'logo',
                'favicon',
                'meta_title',
                'meta_description',
                'meta_keywords',
            ]);
        });
    }
};