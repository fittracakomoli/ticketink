<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Pembelian;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{

    public function home()
    {
        // Event populer: status 'accept', urut terbanyak terjual, limit 4
        $popularEvents = Event::withCount('pembelians')
            ->where('status', 'accept')
            ->orderBy('pembelians_count', 'desc')
            ->limit(4)
            ->get();

        // ...ambil data lain jika perlu

        return view('home', compact('popularEvents'));
    }

    public function show(Request $request)
    {
        $query = Event::where('status', 'accept');
        $searchQuery = $request->input('q', '');
        $sortBy = $request->input('sort_by', 'newly_added'); // Default sorting: baru ditambahkan

        if ($searchQuery != '') {
            $query->where('name', 'like', '%' . $searchQuery . '%');
        }

        switch ($sortBy) {
            case 'name_asc':
                $query->orderBy('name', 'asc'); // Abjad A-Z
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc'); // Abjad Z-A
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc'); // Harga Termahal
                break;
            case 'price_asc':
                $query->orderBy('price', 'asc'); // Harga Termurah
                break;
            case 'date_desc': // Tanggal event dari yang terbaru (paling dekat)
                $query->orderBy('date', 'desc'); // Kolom 'date' untuk tanggal event
                break;
            case 'date_asc': // Tanggal event dari yang terlama
                $query->orderBy('date', 'asc');
                break;
            case 'newly_added':
            default:
                $query->orderBy('created_at', 'desc'); // Default: berdasarkan kapan event ditambahkan
                break;
        }

        $events = $query->paginate(12); // Menggunakan pagination, tampilkan 12 event per halaman

        return view('tickets', compact('events', 'sortBy', 'searchQuery'));
    }

    public function listpembeli(Event $event)
    {
        // Eager load relasi 'pembelians' (atau nama relasi yang Anda definisikan di model Event)
        // dan untuk setiap pembelian, muat juga relasi 'user' (pembeli)
        // Anda juga bisa memuat 'tickets' jika diperlukan per pembelian
        $event->load(['pembelians' => function ($query) {
            $query->with('user')->orderBy('tanggal_pembelian', 'desc');
        }]);

        // Variabel $event sekarang akan memiliki koleksi 'pembelians',
        // dan setiap item 'pembelian' di dalamnya akan memiliki objek 'user'.
        return view('eventdetail', compact('event'));
    }

    // Tampilkan halaman event beserta data event
    public function index()
    {
        $events = Event::withCount('pembelians')->orderBy('date', 'desc')->paginate(10);
        return view('event', compact('events'));
    }

    // Simpan event baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:indoor,outdoor,virtual',
            'description' => 'required|string',
            'date' => 'required|date',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'total' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan file gambar
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('eventimg'), $imageName);

        $validated['image'] = 'eventimg/' . $imageName;
        $validated['status'] = 'accept';
        $validated['slug'] = Str::slug($validated['name']);

        Event::create($validated);

        return redirect()->route('event.index')->with('success', 'Event berhasil dibuat!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('eventdetail', compact('event'));
    }

    public function update(Request $request, Event $event, $id)
    {

        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:indoor,outdoor,virtual',
            'description' => 'required|string',
            'date' => 'required|date',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'total' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Jika ada file gambar baru
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('eventimg'), $imageName);
            $validated['image'] = 'eventimg/' . $imageName;
        }

        $event->update($validated);

        return redirect()->route('event.index')->with('success', 'Event berhasil diupdate!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        // Jika ingin hapus file gambar juga, tambahkan unlink di sini
        if ($event->image && file_exists(public_path($event->image))) {
            unlink(public_path($event->image));
        }
        $event->delete();

        return redirect()->route('event.index')->with('success', 'Event berhasil dihapus!');
    }

    public function checkInAttendee(Request $request, Event $event)
    {
        $validator = Validator::make($request->all(), [
            'unique_code' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 400);
        }

        $uniqueCode = $request->input('unique_code');

        // Cari pembelian berdasarkan event_id dan kode_unik
        // Sesuaikan 'kode_unik' dengan nama kolom yang Anda gunakan (misal: 'nomor_invoice')
        $pembelian = Pembelian::where('event_id', $event->id)
                              ->where('unique_code', $uniqueCode) 
                              ->first();

        if (!$pembelian) {
            return response()->json(['success' => false, 'message' => 'Kode unik tidak valid atau tidak ditemukan untuk event ini.'], 404);
        }

        // Sesuaikan 'status_kehadiran' dan nilai 'hadir'
        if ($pembelian->status === 'hadir') {
            return response()->json(['success' => true, 'message' => 'Peserta sudah melakukan check-in sebelumnya.'], 200);
        }

        $pembelian->status = 'hadir';
        $pembelian->save();

        // Anda mungkin ingin memuat relasi user jika akan ditampilkan kembali
        // $pembelian->load('user'); 

        return response()->json([
            'success' => true, 
            'message' => 'Check-in berhasil untuk ' . ($pembelian->user ? $pembelian->user->name : $uniqueCode) . '.',
            // 'pembelian' => $pembelian // Opsional: kirim data pembelian yang diperbarui
        ], 200);
    }
}
