<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EventController extends Controller
{
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
        $validated['status'] = 'pending';
        $validated['slug'] = Str::slug($validated['name']);

        Event::create($validated);

        return redirect()->route('event.index')->with('success', 'Event berhasil dibuat!');
    }
}
