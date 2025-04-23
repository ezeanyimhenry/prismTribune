<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('blog.index');
Route::get('/post/{id}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/page/{page}', function ($page) {
    $allowedMethods = ['policy', 'terms', 'about', 'contact'];

    if (!in_array($page, $allowedMethods)) {
        abort(404);
    }

    return app(PageController::class)->$page();
});