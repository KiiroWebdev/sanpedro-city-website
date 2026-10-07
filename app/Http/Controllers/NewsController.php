<?php

namespace App\Http\Controllers;

use App\Models\Post;

class NewsController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(9);

        return view('news.index', compact('posts'));
    }

    public function show($slug)
{
    $post = Post::where('slug', $slug)
        ->where('status', 'published')
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->firstOrFail();

    $previousPost = Post::where('status', 'published')
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->where('published_at', '<', $post->published_at)
        ->orderByDesc('published_at')
        ->first();

    $nextPost = Post::where('status', 'published')
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->where('published_at', '>', $post->published_at)
        ->orderBy('published_at')
        ->first();

    return view('news.show', compact(
        'post',
        'previousPost',
        'nextPost'
    ));
}
}