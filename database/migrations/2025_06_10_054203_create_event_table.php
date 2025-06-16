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
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('category', ['indoor', 'outdoor', 'virtual']);
            $table->text('description');
            $table->dateTime('date');
            $table->decimal('price', 20, 0);
            $table->string('location');
            $table->decimal('total', 20, 0);
            $table->string('image');
            $table->enum('status', ['accept', 'decline', 'pending']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event');
    }
};
