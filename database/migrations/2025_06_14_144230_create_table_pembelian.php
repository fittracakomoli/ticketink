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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('event_id')->constrained('event')->onDelete('cascade');
            $table->string('nomor_invoice')->unique();
            $table->string('unique_code')->unique();
            $table->decimal('biaya_layanan', 20, 0)->default(0); 
            $table->decimal('total_pembayaran', 20, 0);
            $table->string('metode_pembayaran')->nullable();
            $table->enum('status_pembayaran', ['pending', 'paid', 'failed', 'expired', 'refunded', 'pending_confirmation'])->default('pending');
            $table->timestamp('tanggal_pembelian')->useCurrent();
            $table->timestamp('tanggal_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_pembelian');
    }
};
