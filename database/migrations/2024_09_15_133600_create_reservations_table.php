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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('no_of_tickets');
            $table->decimal('total_price',8,2);
            $table->dateTime('booking_time');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('movie_id')->constrained();
            $table->foreignId('show_time_id')->constrained();
            $table->foreignId('screen_id')->constrained();
            $table->foreignId('seat_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
