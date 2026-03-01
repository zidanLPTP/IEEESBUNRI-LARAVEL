<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PengurusController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\News;
use App\Models\Event;
use App\Models\Officer;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// --- HOMEPAGE ---
Route::get('/', function () {
    $news = News::where('is_published', true)->latest('date')->take(3)->get();
    $eventsList = Event::all()->map(function($event) {
        return [
            'id' => $event->id,
            'division' => $event->category,
            'realDivisionName' => $event->category . " (" . ucfirst($event->mode) . ")",
            'monthIndex' => $event->date->format('n') - 1, 
            'year' => (int)$event->date->format('Y'),
            'date' => (int)$event->date->format('j'),
            'title' => $event->title,
            'speaker' => $event->location_name,
            'image' => $event->poster ? asset('storage/' . $event->poster) : null,
            'desc' => $event->description
        ];
    });
    $writersCount = News::distinct('author_name')->count();
    return view('welcome', compact('news', 'eventsList', 'writersCount'));
});

// --- ABOUT US ---
Route::get('/about', function () {
    $counselors = Officer::where('position', 'like', '%Counselor%')->orWhere('position', 'like', '%Pembina%')->get();
    $director = Officer::where('position', 'Director')->first();
    $viceDirectors = Officer::where('position', 'like', 'Vice Director%')->orderBy('position', 'asc')->get();

    if ($counselors->count() < 4) {
        $needed = 4 - $counselors->count();
        for ($i = 1; $i <= $needed; $i++) {
            $counselors->push((object)['name' => 'Vacant Position', 'position' => 'Counselor', 'sub_role' => 'Waiting for Photo', 'image' => null]);
        }
    }
    if (!$director) {
        $director = (object)['name' => 'Vacant Position', 'position' => 'Director', 'sub_role' => 'Waiting for Photo', 'image' => null];
    }
    if ($viceDirectors->count() < 3) {
        $needed = 3 - $viceDirectors->count();
        for ($i = 1; $i <= $needed; $i++) {
            $viceDirectors->push((object)['name' => 'Vacant Position', 'position' => 'Vice Director', 'sub_role' => 'Waiting for Photo', 'image' => null]);
        }
    }
    return view('about', compact('counselors', 'director', 'viceDirectors'));
});

// --- DEPARTMENTS ---
Route::get('/departments', function () {
    $allOfficers = Officer::all();
    return view('departments', compact('allOfficers'));
});

// --- NEWS ---
Route::get('/news', function () {
    $articles = News::where('is_published', true)->latest('date')->paginate(8);
    return view('news.index', compact('articles'));
})->name('news.index');

Route::get('/news/{slug}', function ($slug) {
    $news = News::where('slug', $slug)->firstOrFail();
    return view('news.show', compact('news'));
})->name('news.show');

// --- EVENTS ---
Route::get('/events', function () {
    $now = now();
    $rawEvents = Event::all();
    $alpineEvents = $rawEvents->map(function($e) {
        return [
            'id' => $e->id, 'title' => $e->title, 'desc' => $e->description,
            'date' => $e->date->day, 'monthIndex' => $e->date->month - 1, 'year' => $e->date->year,
            'timeStart' => $e->time_start, 'locationName' => $e->location_name, 'mode' => $e->mode,
            'divisionId' => strtolower($e->category), 'realCategory' => $e->category,
            'poster' => $e->poster ? asset('storage/' . $e->poster) : null,
            'regLink' => $e->reg_link, 'regText' => 'Register Now'
        ];
    });
    $upcomingEvents = $rawEvents->where('date', '>=', $now->toDateString())->sortBy('date');
    $pastEvents = $rawEvents->where('date', '<', $now->toDateString())->sortByDesc('date');
    return view('events', compact('alpineEvents', 'upcomingEvents', 'pastEvents', 'rawEvents'));
})->name('events.public');

// --- GALLERY (DATA MURNI DATABASE) ---
Route::get('/gallery', function () {
    // Mengumpulkan semua media dari News dan Events yang punya gambar
    $newsMedia = News::whereNotNull('image')->select('title', 'image', 'date', 'category')->get();
    $eventMedia = Event::whereNotNull('poster')->select('title', 'poster as image', 'date', 'category')->get();
    
    // Gabungkan dan urutkan berdasarkan tanggal terbaru
    $galleries = $newsMedia->concat($eventMedia)->sortByDesc('date')->values();
    
    // Manual Pagination simulasi (atau kamu bisa buat tabel Gallery sendiri nanti)
    $currentPage = request()->query('page', 1);
    $perPage = 8;
    $pagedData = $galleries->forPage($currentPage, $perPage);
    $totalPages = ceil($galleries->count() / $perPage);

    return view('gallery', [
        'galleries' => $pagedData,
        'currentPage' => $currentPage,
        'totalPages' => $totalPages,
        'hasArticles' => $galleries->count() > 0
    ]);
})->name('gallery.public');

/*
|--------------------------------------------------------------------------
| Auth & Admin
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/pengurus', [PengurusController::class, 'index'])->name('admin.pengurus.index');
    Route::get('/pengurus/add', [PengurusController::class, 'create'])->name('admin.pengurus.create');
    Route::post('/pengurus/store', [PengurusController::class, 'store'])->name('admin.pengurus.store');
    
    Route::get('/events/create', function () { return view('admin.events.create'); })->name('admin.events.create');
    Route::get('/gallery/create', function () { return view('admin.gallery.create'); })->name('admin.gallery.create');
    Route::get('/news/create', function () { return view('admin.news.create'); })->name('admin.news.create');
});