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
        // Artikel trending 
        $trendingArticles = Article::where('is_trending', true)
            ->where('is_featured_slider', false)
            ->orderBy('published_at', 'desc')
            ->latest()
            ->take(4)
            ->get();

        // Artikel slider
        $sliderArticles = Article::where('is_featured_slider', true)
            ->orderBy('published_at', 'desc')
            ->latest()
            ->take(4)
            ->get();

        // Artikel topik bagian tengah 
        $topArticles = Article::where('is_topic', true)
            ->where('is_shorts', false)
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        $topicArticles = Article::where('is_topic', true)
            ->orderBy('published_at', 'desc')
            ->latest()
            ->take(5)
            ->get();

        // Shorts
        $shorts = Article::where('is_shorts', true)
            ->orderBy('published_at', 'desc')
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

    // Artikel topik bagian bawah
    public function loadMore(Request $request)
    {
        $offset = $request->input('offset', 0);
        $limit = 5;

        $articles = Article::where('is_topic', true)
            ->where('is_shorts', false)
            ->orderBy('published_at', 'desc')
            ->skip($offset)
            ->take($limit)
            ->get();

        if ($articles->isEmpty()) {
            return response()->json([
                'html' => '',
                'hasMore' => false
            ]);
        }

        $html = view('partials.article-card-list', compact('articles'))->render();

        return response()->json([
            'html' => $html,
            'hasMore' => true
        ]);
    }

    // === Artikel Detail ===
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $mediaItems = $article->slider ? $article->slider->media : [];

        $articles = Article::where('id', '!=', $article->id)
            ->where('is_shorts', false)
            ->orderBy('published_at', 'desc')
            ->take(8)
            ->get();

        $topicArticles = Article::where('is_topic', true)
            ->orderBy('published_at', 'desc')
            ->take(8)
            ->get();

        session(['content_type' => 'article']);

        $sessionKey = 'article_viewed_' . $article->id;
    
        if (!session()->has($sessionKey)) {
            $article->increment('views');
            session()->put($sessionKey, true);
        }
        return view('articles.show', compact('article', 'mediaItems', 'articles', 'topicArticles'));
    }

    // === Shorts Detail ===
    public function shortShow($slug)
    {
        $short = Article::where('slug', $slug)->where('is_shorts', true)->firstOrFail();

        $moreShorts = Article::where('is_shorts', true)
            ->where('id', '!=', $short->id)
            ->orderBy('published_at', 'desc')
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
                ->orderBy('published_at', 'desc')
                ->paginate(4);

            $articles = collect();

            return view($viewName, compact('shorts', 'articles', 'isShortsOnly'));
        }

        $articles = Article::where('category_id', $category->id)
            ->where('is_shorts', false)
            ->orderBy('published_at', 'desc')
            ->paginate(4);

        $shorts = Article::where('category_id', $category->id)
            ->where('is_shorts', true)
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        return view($viewName, compact('articles', 'shorts', 'isShortsOnly'));
    }

}
