<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pembelian';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'event_id',
        'nomor_invoice',
        'unique_code',
        'biaya_layanan',
        'total_pembayaran',
        'metode_pembayaran',
        'status_pembayaran',
        'tanggal_pembelian',
        'tanggal_pembayaran',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_pembelian' => 'datetime',
        'tanggal_pembayaran' => 'datetime',
        'biaya_layanan' => 'decimal:0',
        'total_pembayaran' => 'decimal:0',
    ];

    /**
     * Get the user that owns the pembelian.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the event associated with the pembelian.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}