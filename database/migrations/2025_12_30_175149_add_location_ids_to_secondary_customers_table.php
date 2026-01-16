<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('secondary_customers', function (Blueprint $table) {
            // New ID columns add karo
            $table->foreignId('country_id')->nullable()->constrained('countries')->onDelete('set null');
            $table->foreignId('state_id')->nullable()->constrained('states')->onDelete('set null');
            $table->foreignId('district_id')->nullable()->constrained('districts')->onDelete('set null');
            $table->foreignId('city_id')->nullable()->constrained('cities')->onDelete('set null');
            $table->foreignId('pincode_id')->nullable()->constrained('pincodes')->onDelete('set null');
            $table->foreignId('beat_id')->nullable()->constrained('beats')->onDelete('set null');

            // Optional: Purane string columns ko comment out ya drop kar sakte ho future mein
            // Abhi ke liye rakho, koi issue nahi
        });
    }

    public function down(): void
    {
        Schema::table('secondary_customers', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
            $table->dropForeign(['state_id']);
            $table->dropForeign(['district_id']);
            $table->dropForeign(['city_id']);
            $table->dropForeign(['pincode_id']);
            $table->dropForeign(['beat_id']);

            $table->dropColumn([
                'country_id',
                'state_id',
                'district_id',
                'city_id',
                'pincode_id',
                'beat_id'
            ]);
        });
    }
};