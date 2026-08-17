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
        Schema::table('ngo_applications', function (Blueprint $table) {
            $table->string('registration_no')->nullable()->unique()->after('application_no');
            $table->timestamp('certificate_issue_date')->nullable()->after('review_notes');
            $table->string('certificate_path')->nullable()->after('certificate_issue_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ngo_applications', function (Blueprint $table) {
            $table->dropColumn(['registration_no', 'certificate_issue_date', 'certificate_path']);
        });
    }
};
