<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ngo_applications', function (Blueprint $table) {
            $table->id();
            $table->string('application_no')->unique();
            $table->string('status', 30)->default('draft');
            $table->unsignedTinyInteger('current_step')->default(1);
            $table->timestamp('submitted_at')->nullable();
            $table->text('review_notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('ngo_application_step_payloads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('ngo_applications')->cascadeOnDelete();
            $table->unsignedTinyInteger('step_no');
            $table->json('payload');
            $table->timestamps();
            $table->unique(['application_id', 'step_no']);
        });

        Schema::create('ngo_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->unique()->constrained('ngo_applications')->cascadeOnDelete();
            $table->string('organization_name')->nullable();
            $table->date('establishment_date')->nullable();
            $table->string('registration_authority')->nullable();
            $table->string('registration_details')->nullable();
            $table->string('head_name')->nullable();
            $table->string('focal_name')->nullable();
            $table->text('geographical_local')->nullable();
            $table->text('geographical_provincial')->nullable();
            $table->text('geographical_national')->nullable();
            $table->string('previous_authority')->nullable();
            $table->string('previous_reg_no')->nullable();
            $table->integer('work_duration_years')->nullable();
            $table->string('byelaws_status')->nullable();
            $table->text('general_objectives')->nullable();
            $table->text('geographical_focus')->nullable();
            $table->text('collaboration_partner')->nullable();
            $table->text('collaboration_nature')->nullable();
            $table->text('collaboration_activities')->nullable();
            $table->json('extra_data')->nullable();
            $table->timestamps();
        });

        Schema::create('ngo_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('ngo_applications')->cascadeOnDelete();
            $table->string('address_type', 50);
            $table->text('registered_address')->nullable();
            $table->text('postal_address')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->text('social_media')->nullable();
            $table->text('operational_area')->nullable();
            $table->json('extra_data')->nullable();
            $table->timestamps();
        });

        Schema::create('ngo_staff_summaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->unique()->constrained('ngo_applications')->cascadeOnDelete();
            $table->integer('total_staff')->nullable();
            $table->integer('local_staff')->nullable();
            $table->integer('foreigner_staff')->nullable();
            $table->integer('male_staff')->nullable();
            $table->integer('female_staff')->nullable();
            $table->json('extra_data')->nullable();
            $table->timestamps();
        });

        Schema::create('ngo_board_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('ngo_applications')->cascadeOnDelete();
            $table->unsignedInteger('member_order')->default(1);
            $table->string('name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('nationality_type', 30)->nullable();
            $table->string('cnic_number')->nullable();
            $table->string('designation')->nullable();
            $table->string('gender', 20)->nullable();
            $table->text('residential_address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('education')->nullable();
            $table->text('experience')->nullable();
            $table->json('extra_data')->nullable();
            $table->timestamps();
        });

        Schema::create('ngo_focal_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('ngo_applications')->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->text('social_media')->nullable();
            $table->json('extra_data')->nullable();
            $table->timestamps();
        });

        Schema::create('ngo_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('ngo_applications')->cascadeOnDelete();
            $table->string('project_phase', 30);
            $table->unsignedInteger('project_order')->default(1);
            $table->string('project_name')->nullable();
            $table->text('target_area')->nullable();
            $table->date('start_date')->nullable();
            $table->date('expected_completion_date')->nullable();
            $table->decimal('total_funds', 15, 2)->nullable();
            $table->string('donor')->nullable();
            $table->string('thematic_focus')->nullable();
            $table->integer('beneficiaries_count')->nullable();
            $table->json('extra_data')->nullable();
            $table->timestamps();
        });

        Schema::create('ngo_tax_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->unique()->constrained('ngo_applications')->cascadeOnDelete();
            $table->string('ntn')->nullable();
            $table->string('tax_exemption_reference')->nullable();
            $table->string('audit_firm_name')->nullable();
            $table->string('audited_status')->nullable();
            $table->date('last_audit_date')->nullable();
            $table->date('next_audit_due_date')->nullable();
            $table->string('recognized_auditor')->nullable();
            $table->text('audit_objections')->nullable();
            $table->text('funding_sources_text')->nullable();
            $table->json('extra_data')->nullable();
            $table->timestamps();
        });

        Schema::create('ngo_bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('ngo_applications')->cascadeOnDelete();
            $table->string('account_scope', 30)->default('primary');
            $table->string('account_title')->nullable();
            $table->string('iban')->nullable();
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->text('branch_address')->nullable();
            $table->json('extra_data')->nullable();
            $table->timestamps();
        });

        Schema::create('ngo_assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('ngo_applications')->cascadeOnDelete();
            $table->string('asset_type', 50);
            $table->unsignedInteger('asset_order')->default(1);
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->json('extra_data')->nullable();
            $table->timestamps();
        });

        Schema::create('ngo_security_arrangements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('ngo_applications')->cascadeOnDelete();
            $table->string('arrangement_type', 50);
            $table->unsignedInteger('arrangement_order')->default(1);
            $table->string('agency_name')->nullable();
            $table->text('address')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('agreement_duration')->nullable();
            $table->text('nature_of_protection')->nullable();
            $table->json('extra_data')->nullable();
            $table->timestamps();
        });

        Schema::create('ngo_application_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('ngo_applications')->cascadeOnDelete();
            $table->string('document_type', 60);
            $table->string('file_path');
            $table->string('mime_type', 100)->nullable();
            $table->unsignedBigInteger('file_size')->nullable();
            $table->string('year_tag', 20)->nullable();
            $table->json('extra_data')->nullable();
            $table->timestamps();
        });

        Schema::create('ngo_application_selections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('ngo_applications')->cascadeOnDelete();
            $table->string('selection_group', 60);
            $table->string('selection_value', 120);
            $table->timestamps();
            $table->index(['application_id', 'selection_group']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ngo_application_selections');
        Schema::dropIfExists('ngo_application_documents');
        Schema::dropIfExists('ngo_security_arrangements');
        Schema::dropIfExists('ngo_assets');
        Schema::dropIfExists('ngo_bank_accounts');
        Schema::dropIfExists('ngo_tax_details');
        Schema::dropIfExists('ngo_projects');
        Schema::dropIfExists('ngo_focal_contacts');
        Schema::dropIfExists('ngo_board_members');
        Schema::dropIfExists('ngo_staff_summaries');
        Schema::dropIfExists('ngo_addresses');
        Schema::dropIfExists('ngo_profiles');
        Schema::dropIfExists('ngo_application_step_payloads');
        Schema::dropIfExists('ngo_applications');
    }
};
