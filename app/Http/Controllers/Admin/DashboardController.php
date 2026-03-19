<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Officer;
use App\Models\Event;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Division;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'totalMembers' => Officer::count(),
            'totalDivisions' => 6, // Or use Division::count() if you have a divisions table.
            'totalContent' => News::count() + Event::count(),
        ];

        $events = Event::latest('date')->get()->map(function ($item) {
            return [
            'id' => $item->id,
            'title' => $item->title,
            'category' => $item->category,
            'date' => \Carbon\Carbon::parse($item->date)->format('d/m/Y'),
            'author' => 'Admin'
            ];
        });

        $news = News::latest('date')->get()->map(function ($item) {
            return [
            'id' => $item->id,
            'title' => $item->title,
            'category' => $item->category,
            'date' => $item->date ?\Carbon\Carbon::parse($item->date)->format('d/m/Y') : $item->created_at->format('d/m/Y'),
            'author' => $item->author_name ?? 'Admin'
            ];
        });

        // Use Gallery if model exists, otherwise empty array.
        $gallery = [];
        if (class_exists(Gallery::class)) {
            $gallery = Gallery::latest('created_at')->get()->map(function ($item) {
                return [
                'id' => $item->id,
                'caption' => $item->title ?? 'Gallery Media',
                'tag' => $item->category ?? 'General',
                'date' => $item->created_at->format('d/m/Y'),
                'author' => 'Admin'
                ];
            });
        }

        return view('admin.dashboard', compact('stats', 'events', 'news', 'gallery'));
    }
}