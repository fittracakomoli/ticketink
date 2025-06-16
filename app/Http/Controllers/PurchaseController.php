<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Tiket;
use App\Models\Pembelian;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function detail($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('ticketdetail', compact('event'));
    }

    public function prepareCheckout(Request $request)
    {
        $validatedData = $request->validate([
            'event_id' => 'required|exists:event,id',
            'jumlah_tiket' => 'required|integer|min:1',
        ]);

        $event = Event::findOrFail($validatedData['event_id']);
        $jumlahTiket = (int) $validatedData['jumlah_tiket'];

        $hargaPerTiket = $event->price;
        $subtotal = $hargaPerTiket * $jumlahTiket;
        
        $biayaLayanan = $hargaPerTiket * 0.1; // 10% biaya layanan

        $totalPembayaran = $subtotal + $biayaLayanan;

        session([
            'checkout_data' => [
                'event_id' => $event->id,
                'event_name' => $event->name,
                'event_image' => $event->image,
                'event_slug' => $event->slug,
                'jumlah_tiket' => $jumlahTiket,
                'harga_per_tiket' => $hargaPerTiket,
                'subtotal' => $subtotal,
                'biaya_layanan' => $biayaLayanan,
                'total_pembayaran' => $totalPembayaran,
            ]
        ]);

        return redirect()->route('checkout.show');
    }

    /**
     * Menampilkan halaman checkout dengan data dari session.
     */
    public function showCheckout()
    {
        $checkoutData = session('checkout_data');
        return view('checkout', $checkoutData);
    }

    public function bayar(Request $request)
    {
        $checkoutData = session('checkout_data');

        $user = Auth::user();
        
        DB::beginTransaction();

            $event = Event::findOrFail($checkoutData['event_id']);

            $pembelian = Pembelian::create([
                'user_id' => $user->id,
                'event_id' => $event->id,
                'nomor_invoice' => 'T-' . strtoupper(Str::random(8)) . time(),
                'unique_code' => rand(10000000, 99999999), 
                'biaya_layanan' => $checkoutData['biaya_layanan'],
                'total_pembayaran' => $checkoutData['total_pembayaran'],
                'metode_pembayaran' => $request->input('metode_pembayaran'),
                'status_pembayaran' => 'paid',
                'tanggal_pembelian' => now(),
                'tanggal_pembayaran' => now(),
            ]);

            $event->total -= $checkoutData['jumlah_tiket'];
            $event->save();

            DB::commit();

            session()->forget('checkout_data');

            return redirect()->route('my.tickets')->with('success', 'Pembayaran berhasil! Tiket Anda telah diterbitkan. Kode Pembelian: ' . $pembelian->nomor_invoice);
    }

    public function myTickets()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk melihat tiket Anda.');
        }

        $purchases = Pembelian::where('user_id', $user->id)
                            ->with('event')
                            ->orderBy('tanggal_pembelian', 'desc')
                            ->get();

        return view('tiketsaya', compact('purchases'));
    }
}
