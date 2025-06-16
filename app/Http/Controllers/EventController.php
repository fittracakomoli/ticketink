<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show(Request $request)
    {
    $query = Event::where('status', 'accept');

    if ($request->has('q') && $request->q != '') {
        $query->where('name', 'like', '%' . $request->q . '%');
    }

    $events = $query->get();

    return view('tickets', compact('events'));
}

    // Tampilkan halaman event beserta data event
    public function index()
    {
        $events = Event::all();
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
}
