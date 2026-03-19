<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'division_id' => 'required|integer',
            'date' => 'required|date',
            'time_start' => 'required|string',
            'time_end' => 'nullable|string',
            'mode' => 'required|string',
            'location_name' => 'required|string',
            // image will be sent as a direct cloudinary URL string
            'poster' => 'nullable|string',
            'reg_link' => 'nullable|string',
            'description' => 'required|string',
        ]);

        $data['slug'] = Str::slug($data['title']) . '-' . time();
        $data['category'] = 'Event';

        Event::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Event successfully created!');
    }

    public function destroy($id)
    {
        $item = Event::findOrFail($id);
        $item->delete(); // Automatically hits the Model deleting Observer (shreds Cloudinary)
        return response()->json(['success' => true]);
    }
}
