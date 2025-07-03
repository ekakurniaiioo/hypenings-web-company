<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function lifestyle(Request $request)
    {
        $posts = [
            [
                'title' => 'Judul Artikel 1',
                'content' => 'Deskripsi singkat artikel pertama. Ringkas dan menarik.',
                'image' => 'image/article1.jpeg',
                'date' => '3 Juli 2025',
            ],
            [
                'title' => 'Judul Artikel 2',
                'content' => 'Deskripsi singkat artikel kedua. Singkat dan padat.',
                'image' => 'image/article2.jpeg',
                'date' => '2 Juli 2025',
            ],
            // Tambah lagi sesuai kebutuhan
        ];

        return view('lifestyle', compact('posts'));
    }
}

