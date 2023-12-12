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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('price');
            $table->text('amenities');
            $table->text('total_rooms');
            $table->text('room_size');
            $table->text('total_beds');
            $table->text('total_bathrooms');
            $table->text('total_balconies');
            $table->text('total_guests');
            $table->string('featured_photo');
            $table->text('video_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
