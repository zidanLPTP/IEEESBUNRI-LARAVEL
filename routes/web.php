<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PengurusController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\News;
use App\Models\Event;
use App\Models\Officer;

/* |-------------------------------------------------------------------------- | Public Routes |-------------------------------------------------------------------------- */

// --- HOMEPAGE ---
Route::get('/', function () {
    $news = News::where('is_published', true)->latest('date')->take(3)->get();
    $eventsList = Event::all()->map(function ($event) {
            return [
            'id' => $event->id,
            'division' => $event->category,
            'realDivisionName' => $event->category . " (" . ucfirst($event->mode) . ")",
            'monthIndex' => $event->date->format('n') - 1,
            'year' => (int)$event->date->format('Y'),
            'date' => (int)$event->date->format('j'),
            'title' => $event->title,
            'speaker' => $event->location_name,
            'image' => $event->poster ? (str_starts_with($event->poster, 'http') ? $event->poster : asset('storage/' . $event->poster)) : null,
            'desc' => $event->description
            ];
        }
        );
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
    $alpineEvents = $rawEvents->map(function ($e) {
            return [
            'id' => $e->id, 'title' => $e->title, 'desc' => $e->description,
            'date' => $e->date->day, 'monthIndex' => $e->date->month - 1, 'year' => $e->date->year,
            'timeStart' => $e->time_start, 'locationName' => $e->location_name, 'mode' => $e->mode,
            'divisionId' => strtolower($e->category), 'realCategory' => $e->category,
            'poster' => $e->poster ? (str_starts_with($e->poster, 'http') ? $e->poster : asset('storage/' . $e->poster)) : null,
            'regLink' => $e->reg_link, 'regText' => 'Register Now'
            ];
        }
        );
        $upcomingEvents = $rawEvents->where('date', '>=', $now->toDateString())->sortBy('date');
        $pastEvents = $rawEvents->where('date', '<', $now->toDateString())->sortByDesc('date');
        return view('events', compact('alpineEvents', 'upcomingEvents', 'pastEvents', 'rawEvents'));
    })->name('events.public');

// --- GALLERY (DATA MURNI DATABASE) ---
Route::get('/gallery', function () {
    // Mengumpulkan semua media dari News dan Events yang punya gambar
    $newsMedia = \App\Models\News::whereNotNull('image')->select('title', 'image', 'date', 'category')->get();
    $eventMedia = \App\Models\Event::whereNotNull('poster')->select('title', 'poster as image', 'date', 'category')->get();
    $pureGallery = \App\Models\Gallery::select('caption as title', 'image', 'date', 'tag as category')->get();

    // Gabungkan dan urutkan berdasarkan tanggal terbaru
    $galleries = $newsMedia->concat($eventMedia)->concat($pureGallery)->sortByDesc('date')->values();

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

// ---- Registration ------
Route::get('/registration', function () {
    return view('registration');
})->name('registration');

//----- instagram ------
Route::get('/instagram-feed', function () {

    $posts = [
        "https://www.instagram.com/ieee.sb.unri/",
    ];

    $response = file_get_contents(
        "https://www.instagram.com/ieee.sb.unri/?__a=1&__d=dis"
    );

    return $response;
});

/* |-------------------------------------------------------------------------- | Auth & Admin |-------------------------------------------------------------------------- */
Route::get('/login', [LoginController::class , 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class , 'login'])->name('login.post');
Route::post('/logout', [LoginController::class , 'logout'])->name('logout');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class , 'index'])->name('admin.dashboard');
    Route::get('/pengurus', [PengurusController::class , 'index'])->name('admin.pengurus.index');
    Route::get('/pengurus/add', [PengurusController::class , 'create'])->name('admin.pengurus.create');
    Route::post('/pengurus/store', [PengurusController::class , 'store'])->name('admin.pengurus.store');
    Route::delete('/pengurus/{id}', [PengurusController::class, 'destroy'])->name('admin.pengurus.destroy');
    Route::get('/admin/pengurus/{id}/edit', [OfficerController::class, 'edit'])->name('pengurus.edit');

    Route::get('/events/create', [EventController::class , 'create'])->name('admin.events.create');
    Route::post('/events/store', [EventController::class , 'store'])->name('admin.events.store');
    Route::delete('/events/{id}', [EventController::class , 'destroy'])->name('admin.events.destroy');

    Route::get('/gallery/create', [GalleryController::class , 'create'])->name('admin.gallery.create');
    Route::post('/gallery/store', [GalleryController::class , 'store'])->name('admin.gallery.store');
    Route::delete('/gallery/{id}', [GalleryController::class , 'destroy'])->name('admin.gallery.destroy');

    Route::get('/news/create', [NewsController::class , 'create'])->name('admin.news.create');
    Route::post('/news/store', [NewsController::class , 'store'])->name('admin.news.store');
    Route::delete('/news/{id}', [NewsController::class , 'destroy'])->name('admin.news.destroy');
});