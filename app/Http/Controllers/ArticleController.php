<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    // === Home Page ===
    public function index()
    {
        $topics = ['tech', 'social', 'sport', 'other'];

        $groupedArticles = [];
        foreach ($topics as $topic) {
            $groupedArticles[$topic] = Article::where('topic', $topic)
                ->where('is_topic', true)
                ->latest()
                ->take(4)
                ->get();
        }

        $sliderArticles = Article::where('is_featured_slider', true)
            ->latest()
            ->take(4)
            ->get();

        $trendingArticles = Article::where('is_trending', true)
            ->where('is_featured_slider', false)
            ->latest()
            ->take(4)
            ->get();

        $topicArticles = Article::where('is_topic', true)->latest()->take(8)->get();

        $shorts = Article::where('is_shorts', true)->latest()->take(10)->get();

        return view('hypenings', compact(
            'trendingArticles',
            'topicArticles',
            'sliderArticles',
            'shorts',
            'groupedArticles'
        ));
    }

    // === Show Detail Artikel Biasa ===
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $mediaItems = $article->slider ? $article->slider->media : [];

        session(['content_type' => 'article']);
        return view('articles.show', compact('article', 'mediaItems'));
    }

    // === Show Detail Shorts ===
    public function shortShow($slug)
    {
        $short = Article::where('slug', $slug)
            ->where('is_shorts', true)
            ->firstOrFail();

        session(['content_type' => 'shorts']);
        return view('articles.shortshow', compact('short'));
    }
    public function showShorts()
    {
        session(['content_type' => 'shorts']);
        return redirect('/shorts/category/lifestyle');
    }

    public function showTopic()
    {
        session(['content_type' => 'article']);
        return redirect('/topic/category/lifestyle');
    }

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
                ->paginate(9);

            return view($viewName, compact('shorts', 'isShortsOnly'));
        }

        $articles = Article::where('category_id', $category->id)
            ->where('is_shorts', false)
            ->latest()
            ->paginate(4);

        $shorts = Article::where('category_id', $category->id)
            ->where('is_shorts', true)
            ->latest()
            ->take(6)
            ->get();

        return view($viewName, compact('articles', 'shorts', 'isShortsOnly'));
    }

}
