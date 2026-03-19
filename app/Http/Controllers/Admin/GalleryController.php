<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'caption' => 'required|string',
            'tag' => 'required|string',
            'image' => 'required|string', // Cloudinary URL from frontend
        ]);

        $data['date'] = now();
        $data['author'] = auth()->check() ? auth()->user()->name : 'Admin';

        Gallery::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Gallery item successfully created!');
    }

    public function destroy($id)
    {
        $item = \App\Models\Gallery::findOrFail($id);
        $item->delete();
        return response()->json(['success' => true]);
    }
}
