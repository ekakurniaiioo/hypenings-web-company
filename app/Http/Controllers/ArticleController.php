<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // === Home Page ===
    public function index()
    {

        $topArticles = Article::where('is_topic', true)
            ->where('is_shorts', false)
            ->latest()
            ->take(4)
            ->get();

        // Artikel slider
        $sliderArticles = Article::where('is_featured_slider', true)
            ->latest()
            ->take(4)
            ->get();

        // Artikel trending (tapi bukan slider)
        $trendingArticles = Article::where('is_trending', true)
            ->where('is_featured_slider', false)
            ->latest()
            ->take(4)
            ->get();

        // Artikel topik untuk bagian tengah 
        $topicArticles = Article::where('is_topic', true)
            ->latest()
            ->take(8)
            ->get();

        // Shorts
        $shorts = Article::where('is_shorts', true)
            ->latest()
            ->take(10)
            ->get();

        return view('hypenings', compact(
            'trendingArticles',
            'topicArticles',
            'topArticles',
            'sliderArticles',
            'shorts',
        ));
    }

    // === Artikel Detail ===
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $mediaItems = $article->slider ? $article->slider->media : [];

        $articles = Article::where('id', '!=', $article->id)
            ->where('is_shorts', false)
            ->inRandomOrder()
            ->take(8)
            ->get();

        $topicArticles = Article::where('is_topic', true)
            ->latest()
            ->take(8)
            ->get();

        session(['content_type' => 'article']);

        return view('articles.show', compact('article', 'mediaItems', 'articles', 'topicArticles'));
    }

    // === Shorts Detail ===
    public function shortShow($slug)
    {
        $short = Article::where('slug', $slug)->where('is_shorts', true)->firstOrFail();

        $moreShorts = Article::where('is_shorts', true)
            ->where('id', '!=', $short->id)
            ->latest()
            ->take(4)
            ->get();

        return view('articles.shortshow', compact('short', 'moreShorts'));
    }

    // === Redirect Short by Category ===
    public function showShorts()
    {
        session(['content_type' => 'shorts']);

        $previousUrl = url()->previous();
        $segments = explode('/', $previousUrl);
        $categoryName = end($segments);

        return redirect()->route('showShortsByCategory', ['name' => $categoryName]);
    }

    // === Redirect Topic by Category ===
    public function showTopic()
    {
        session(['content_type' => 'article']);

        $previousUrl = url()->previous();
        $segments = explode('/', $previousUrl);
        $categoryName = end($segments);

        return redirect()->route('showTopicByCategory', ['name' => $categoryName]);
    }

    // === Category Page ===
    public function showCategory($name)
    {
        $category = Category::where('name', $name)->firstOrFail();
        $isShortsOnly = session('content_type') === 'shorts';

        $viewName = "articles.categories.$name";
        if (!view()->exists($viewName)) {
            abort(404, 'Kategori tidak ditemukan');
        }

        if ($isShortsOnly) {
            $shorts = Article::where('category_id', $category->id)
                ->where('is_shorts', true)
                ->latest()
                ->paginate(5);

            $articles = collect();

            return view($viewName, compact('shorts', 'articles', 'isShortsOnly'));
        }

        $articles = Article::where('category_id', $category->id)
            ->where('is_shorts', false)
            ->latest()
            ->paginate(4);

        $shorts = Article::where('category_id', $category->id)
            ->where('is_shorts', true)
            ->latest()
            ->paginate(6); // <-- ubah dari get() jadi paginate()

        return view($viewName, compact('articles', 'shorts', 'isShortsOnly'));
    }

    public function loadMore(Request $request)
    {
        $excludeIds = $request->input('exclude_ids', []);

        $articles = Article::where('is_topic', true)
            ->whereNotIn('id', $excludeIds)
            ->latest()
            ->paginate(4);

        return view('partials.article-cards', compact('articles'));
    }

}
