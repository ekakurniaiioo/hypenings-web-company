<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function lifestyle(Request $request)
    {
        return $this->loadCategory('lifestyle', $request);
    }

    public function music(Request $request)
    {
        return $this->loadCategory('music', $request);
    }

    public function sport(Request $request)
    {
        return $this->loadCategory('sport', $request);
    }

    public function knowledge(Request $request)
    {
        return $this->loadCategory('knowledge', $request);
    }

    public function other(Request $request)
    {
        return $this->loadCategory('other', $request);
    }

    private function loadCategory($categoryName, $request)
    {
        $category = Category::where('name', $categoryName)->first();

        if (!$category) {
            abort(404, 'Kategori tidak ditemukan.');
        }

        $posts = Article::where('category_id', $category->id)
            ->where('is_shorts', 0)
            ->paginate(4, ['*'], 'posts_page');

        $shorts = Article::where('category_id', $category->id)
            ->where('is_shorts', 1)
            ->paginate(4, ['*'], 'shorts_page');

        if ($request->ajax()) {
            if ($request->has('shorts_page')) {
                return view('components.shorts-list', compact('shorts'))->render();
            }
            return view('components.article-list', compact('posts'))->render();
        }

        return view("categories.$categoryName", compact('posts', 'shorts'));
    }

}
