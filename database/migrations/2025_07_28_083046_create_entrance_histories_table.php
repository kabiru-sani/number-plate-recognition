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
        Schema::create('entrance_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plate_scan_id')->constrained()->onDelete('cascade');
            $table->timestamp('scanned_at');
            $table->string('gate_location');
            $table->string('direction')->default('in')->comment('in/out - for tracking entrance or exit');
            $table->string('camera_id')->nullable()->comment('ID of the camera that captured this scan');
            $table->json('additional_data')->nullable()->comment('Any extra metadata about the scan');
            
            // Indexes for faster queries
            $table->index('plate_scan_id');
            $table->index('scanned_at');
            $table->index('gate_location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrance_histories');
    }
};
