<?php

namespace App\Providers;

use App\Services\ApiService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['layouts.inc.header', 'layouts.inc.footer'], function ($view) {
            $apiService = app(ApiService::class);

            $data = Cache::remember('footer_categories', 30, function () use ($apiService) {
                $meta = $apiService->get('articles', ['include_meta' => 'true']);
                return [
                    'categories' => collect($meta['meta']['categories'] ?? [])->take(10),
                    'sources' => collect($meta['meta']['sources'] ?? []),
                ];
            });

            $recentArticles = Cache::remember('footer_recent_articles', 30, function () use ($apiService) {
                $articles = $apiService->get('articles', ['per_page' => 5]);
                return collect($articles['data']['data'] ?? []);
            });

            $view->with([
                'categories' => $data['categories'],
                'sources' => $data['sources'],
                'recentArticles' => $recentArticles,
            ]);
        });
    }
}