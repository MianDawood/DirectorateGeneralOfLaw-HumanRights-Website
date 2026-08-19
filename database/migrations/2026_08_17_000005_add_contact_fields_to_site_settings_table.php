<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            if (! Schema::hasColumn('site_settings', 'toll_free')) {
                $table->string('toll_free')->nullable()->default('0800-11180');
            }
            if (! Schema::hasColumn('site_settings', 'working_hours')) {
                $table->string('working_hours')->nullable()->default("Monday – Friday\n09:00 AM – 05:00 PM\nClosed on public holidays");
            }
            if (! Schema::hasColumn('site_settings', 'map_embed_url')) {
                $table->string('map_embed_url', 500)->nullable()->default('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3319.4623722216584!2d73.0766373!3d33.7032793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38dfbf978e723533%3A0x6b72d2459c36db4b!2sPrinting%20Corporation%20of%20Pakistan!5e0!3m2!1sen!2s!4v1709710000000!5m2!1sen!2s');
            }
            if (! Schema::hasColumn('site_settings', 'map_link')) {
                $table->string('map_link')->nullable()->default('https://maps.app.goo.gl/CozMK7fdJnjdzHy69');
            }
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['toll_free', 'working_hours', 'map_embed_url', 'map_link']);
        });
    }
};