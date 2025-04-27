<?php
namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $random = null;
        $randomCategory = null;
        $randomSource = null;
        $secondRandomCategory = null;
        $thirdRandomCategory = null;
        $fourthRandomCategory = null;
        $fifthRandomCategory = null;
        $randomCategoryArticles = collect();
        $secondRandomCategoryArticles = collect();
        $thirdRandomCategoryArticles = collect();
        $fourthRandomCategoryArticles = collect();
        $fifthRandomCategoryArticles = collect();
        $randomSourceArticles = collect();
        $categories = collect();
        $sources = collect();
        $featured = null;
        $data = ['data' => []];

        try {
            $queryParams = $request->only([
                'search',
                'date_from',
                'date_to',
                'category',
                'source',
                'per_page'
            ]);
            $queryParams['include_meta'] = 'true';

            // Cache the response for 30 minutes
            $cacheKey = 'articles_' . md5(json_encode($queryParams));
            $response = Cache::remember($cacheKey, 30, function () use ($queryParams) {
                return $this->apiService->get("articles", $queryParams);
            });

            $categories = collect($response['meta']['categories'] ?? []);
            $sources = collect($response['meta']['sources'] ?? []);

            // Caching the featured articles
            $featured = Cache::remember('featured_articles', 30, function () use ($queryParams) {
                return $this->apiService->get("articles", $queryParams);
            });

            // Caching the random articles
            $random = Cache::remember('random_articles', 30, function () {
                return $this->apiService->get("articles/random", ['count' => 5]);
            });

            $randomCategory = $categories->random();
            $secondRandomCategory = $categories->reject(fn($cat) => $cat === $randomCategory)->random();
            $thirdRandomCategory = $categories->reject(fn($cat) => $cat === $randomCategory)
                ->reject(fn($cat) => $cat === $secondRandomCategory)->random();
            $fourthRandomCategory = $categories->reject(fn($cat) => $cat === $randomCategory)
                ->reject(fn($cat) => $cat === $secondRandomCategory)
                ->reject(fn($cat) => $cat === $thirdRandomCategory)->random();
            $fifthRandomCategory = $categories->reject(fn($cat) => $cat === $randomCategory)
                ->reject(fn($cat) => $cat === $secondRandomCategory)
                ->reject(fn($cat) => $cat === $thirdRandomCategory)
                ->reject(fn($cat) => $cat === $fourthRandomCategory)->random();

            $randomSource = $sources->random();

            // Caching category articles
            $allCategoryArticles = Cache::remember('category_articles', 30, function () {
                return $this->apiService->get("articles", [
                    'per_page' => 100,
                ]);
            });

            $categoryGrouped = collect($allCategoryArticles['data']['data'] ?? [])
                ->groupBy('category');

            $randomCategoryArticles = $categoryGrouped->get($randomCategory, collect())->take(6);
            $secondRandomCategoryArticles = $categoryGrouped->get($secondRandomCategory, collect())->take(7);
            $thirdRandomCategoryArticles = $categoryGrouped->get($thirdRandomCategory, collect())->take(7);
            $fourthRandomCategoryArticles = $categoryGrouped->get($fourthRandomCategory, collect())->take(7);
            $fifthRandomCategoryArticles = $categoryGrouped->get($fifthRandomCategory, collect())->take(7);

            // Caching random source articles
            $randomSourceArticles = Cache::remember('random_source_articles', 30, function () use ($randomSource) {
                return $this->apiService->get("articles/source", [
                    'source' => $randomSource,
                    'count' => 4,
                ]);
            });

            if (isset($response['data'])) {
                $data = $response;
            } else {
                $data = ['data' => []];
                flash()->error('Failed to fetch articles.');
            }

        } catch (\Exception $e) {
            $data = ['data' => []];
            flash()->error('An error occurred while fetching articles. Please try again later.');
        }

        return view('blog.index', compact(
            'data',
            'random',
            'randomCategory',
            'secondRandomCategory',
            'randomSource',
            'randomCategoryArticles',
            'secondRandomCategoryArticles',
            'randomSourceArticles',
            'categories',
            'sources',
            'featured',
            'thirdRandomCategory',
            'fourthRandomCategory',
            'fifthRandomCategory',
            'thirdRandomCategoryArticles',
            'fourthRandomCategoryArticles',
            'fifthRandomCategoryArticles'
        ));
    }

    public function show($id)
    {
        try {
            // Cache the individual article
            $article = Cache::remember("article_{$id}", 30, function () use ($id) {
                return $this->apiService->get("articles/{$id}");
            });
        } catch (\Exception $e) {
            flash()->error('An error occurred while fetching article. Please try again later.');
        }

        return view('blog.show', ['article' => $article]);
    }

    public function posts(Request $request, string $type)
    {
        $queryParams = $request->only([
            'search',
            'date_from',
            'date_to',
            'category',
            'source',
            'per_page'
        ]);

        // Cache posts
        $posts = Cache::remember('posts_' . md5(json_encode($queryParams)), 30, function () use ($queryParams) {
            return $this->apiService->get("articles", $queryParams);
        });

        return view('blog.posts', compact('posts', 'type'));
    }

    public function search(Request $request)
    {
        $queryParams = $request->only([
            'search'
        ]);

        $search = $request->search;

        // Cache posts
        $posts = Cache::remember('posts_' . md5(json_encode($queryParams)), 30, function () use ($queryParams) {
            return $this->apiService->get("articles", $queryParams);
        });

        return view('blog.search', compact('posts', 'search'));
    }
}