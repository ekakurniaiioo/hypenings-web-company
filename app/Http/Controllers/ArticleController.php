<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function lifestyle() {
        return $this->loadCategoryPage('lifestyle');
    }

    public function music() {
        return $this->loadCategoryPage('music');
    }

    public function sport() {
        return $this->loadCategoryPage('sport');
    }

    public function knowledge() {
        return $this->loadCategoryPage('knowledge');
    }

    public function other() {
        return $this->loadCategoryPage('other');
    }

    private function loadCategoryPage($categoryName) {
        $category = Category::where('name', $categoryName)->first();

        if (!$category) {
            abort(404, 'Kategori tidak ditemukan.');
        }

        $posts = Article::where('category_id', $category->id)
                        ->latest()
                        ->paginate(6);

        return view("categories.$categoryName", compact('posts'));
    }
}
