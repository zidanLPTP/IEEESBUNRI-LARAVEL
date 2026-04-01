<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'content' => 'required|string',
            // image will be sent as a direct cloudinary URL string from frontend
            'image' => 'nullable|string',
        ]);

        $data['slug'] = Str::slug($data['title']) . '-' . time();
        $data['is_published'] = true;

        $data['author_name'] = auth()->check() ? auth()->user()->name : 'Admin';
        $data['excerpt'] = Str::limit(strip_tags($data['content']), 100);
        $data['read_time'] = max(1, (int) ceil(str_word_count(strip_tags($data['content'])) / 200));

        if (empty($data['date'])) {
            $data['date'] = now();
        }

        News::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'News article successfully published!');
    }

    public function destroy($id)
    {
        $item = \App\Models\News::findOrFail($id);
        $item->delete();
        return response()->json(['success' => true]);
    }
}
