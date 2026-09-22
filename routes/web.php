<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminMediaController;
use App\Http\Controllers\AdminAnnouncementController;
use App\Http\Controllers\AnnouncementController;
use App\Models\Announcement;

Route::get('/', function () {
    $latestPosts = \App\Models\Post::where('status', 'published')
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->latest('published_at')
        ->take(3)
        ->get();

    $latestAnnouncements = Announcement::where('status', 'published')
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->latest('published_at')
        ->take(3)
        ->get();

    return view(
        'home.index',
        compact('latestPosts', 'latestAnnouncements')
    );
});

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/news/{slug}', [NewsController::class, 'show'])
    ->name('news.show');

Route::get('/admin/login', [AdminController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'login'])
    ->name('admin.login.submit');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');

Route::post('/admin/logout', [AdminController::class, 'logout'])
    ->name('admin.logout');

Route::get('/admin/posts', [AdminPostController::class, 'index'])
    ->name('admin.posts.index');

Route::get('/admin/posts/create', [AdminPostController::class, 'create'])
    ->name('admin.posts.create');

Route::post('/admin/posts', [AdminPostController::class, 'store'])
    ->name('admin.posts.store');

Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit'])
    ->name('admin.posts.edit');

Route::put('/admin/posts/{post}', [AdminPostController::class, 'update'])
    ->name('admin.posts.update');

Route::delete('/admin/posts/{post}', [AdminPostController::class, 'destroy'])
    ->name('admin.posts.destroy');

Route::get('/admin/media', [AdminMediaController::class, 'index'])
    ->name('admin.media.index');

Route::post('/admin/media', [AdminMediaController::class, 'store'])
    ->name('admin.media.store');

Route::delete('/admin/media/{filename}', [AdminMediaController::class, 'destroy'])
    ->name('admin.media.destroy');

Route::get('/admin/announcements', [AdminAnnouncementController::class, 'index'])
    ->name('admin.announcements.index');

Route::get('/admin/announcements/create', [AdminAnnouncementController::class, 'create'])
    ->name('admin.announcements.create');

Route::post('/admin/announcements', [AdminAnnouncementController::class, 'store'])
    ->name('admin.announcements.store');

Route::get('/admin/announcements/{announcement}/edit', [AdminAnnouncementController::class, 'edit'])
    ->name('admin.announcements.edit');

Route::put('/admin/announcements/{announcement}', [AdminAnnouncementController::class, 'update'])
    ->name('admin.announcements.update');

Route::delete('/admin/announcements/{announcement}', [AdminAnnouncementController::class, 'destroy'])
    ->name('admin.announcements.destroy');

Route::get('/announcements', [AnnouncementController::class, 'index'])
    ->name('announcements.index');

Route::get('/announcements/{slug}', [AnnouncementController::class, 'show'])
    ->name('announcements.show');