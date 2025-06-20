<?php

namespace App\Models;

use App\Models\Pembelian;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event';

    protected $fillable = [
        'name',
        'category',
        'description',
        'date',
        'price',
        'location',
        'total',
        'image',
    ];

    protected $casts = [
        'date_time' => 'datetime',
    ];

    // Membuat slug otomatis dari nama event
    protected static function booted()
    {
        static::creating(function ($event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->name, '-');
            }
        });
    }

    public function pembelians()
    {
        return $this->hasMany(Pembelian::class);
    }
}
