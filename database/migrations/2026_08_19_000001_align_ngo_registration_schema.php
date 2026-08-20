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
            $table->json('organization_type')->nullable()->after('registration_details');
            $table->json('area_of_interest')->nullable()->after('organization_type');
            $table->text('local_districts')->nullable()->after('area_of_interest');
            $table->text('national_provinces')->nullable()->after('local_districts');
            $table->string('parent_ngo_name')->nullable()->after('work_duration_years');
            $table->string('sister_ngo_name')->nullable()->after('parent_ngo_name');
            $table->string('security_approval')->nullable()->after('sister_ngo_name');
            $table->text('security_approval_details')->nullable()->after('security_approval');
            $table->json('professional_associations')->nullable()->after('security_approval_details');

            $table->dropColumn(['focal_name', 'byelaws_status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ngo_profiles', function (Blueprint $table) {
            $table->string('focal_name')->nullable()->after('head_name');
            $table->string('byelaws_status')->nullable()->after('work_duration_years');

            $table->dropColumn([
                'organization_type',
                'area_of_interest',
                'local_districts',
                'national_provinces',
                'parent_ngo_name',
                'sister_ngo_name',
                'security_approval',
                'security_approval_details',
                'professional_associations',
            ]);
        });
    }
};