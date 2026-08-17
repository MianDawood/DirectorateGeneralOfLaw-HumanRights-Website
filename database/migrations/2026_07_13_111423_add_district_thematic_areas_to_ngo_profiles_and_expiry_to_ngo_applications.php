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
        Schema::table('ngo_profiles', function (Blueprint $table) {
            $table->string('district', 255)->nullable()->after('organization_name');
            $table->text('thematic_areas')->nullable()->after('general_objectives');
        });

        Schema::table('ngo_applications', function (Blueprint $table) {
            $table->date('expiry_date')->nullable()->after('certificate_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ngo_profiles', function (Blueprint $table) {
            $table->dropColumn(['district', 'thematic_areas']);
        });

        Schema::table('ngo_applications', function (Blueprint $table) {
            $table->dropColumn('expiry_date');
        });
    }
};
