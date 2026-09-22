<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\ImageOptimizer;

class AdminPostController extends Controller
{
    public function index()
    {
        if (!session('admin_id')) {
            return redirect()->route('admin.login');
        }

        $posts = Post::latest()->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        if (!session('admin_id')) {
            return redirect()->route('admin.login');
        }

        $images = $this->getMediaImages();

        return view('admin.posts.create', compact('images'));
    }

    public function store(Request $request)
    {
        if (!session('admin_id')) {
            return redirect()->route('admin.login');
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'category' => ['required', 'string', 'max:100'],
            'author' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],

            // Existing media library image
            'featured_image' => ['nullable', 'string', 'max:255'],

            // New uploaded image
            'featured_image_upload' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,gif',
                'max:5120',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $validated['slug'] = Str::slug($validated['title']);

        $originalSlug = $validated['slug'];
        $counter = 1;

        while (Post::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        /*
        |--------------------------------------------------------------------------
        | Author
        |--------------------------------------------------------------------------
        */

        if (empty($validated['author'])) {
            $validated['author'] = session('admin_name');
        }

        /*
        |--------------------------------------------------------------------------
        | Featured Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('featured_image_upload')) {

            $image = $request->file('featured_image_upload');

            $filename = time() . '_' . Str::slug(
                pathinfo(
                    $image->getClientOriginalName(),
                    PATHINFO_FILENAME
                )
            ) . '.' . $image->getClientOriginalExtension();

           ImageOptimizer::optimize(
    $image,
    public_path('images'),
    $filename
);

            $validated['featured_image'] = $filename;
        } elseif (!empty($validated['featured_image'])) {

            // Make sure selected media actually exists
            $selectedImage = basename($validated['featured_image']);

            $imagePath = public_path('images/' . $selectedImage);

            if (!file_exists($imagePath)) {
                return back()
                    ->withErrors([
                        'featured_image' => 'The selected media image could not be found.',
                    ])
                    ->withInput();
            }

            $validated['featured_image'] = $selectedImage;

        } else {

            $validated['featured_image'] = null;

        }

        /*
        |--------------------------------------------------------------------------
        | Publication Date
        |--------------------------------------------------------------------------
        */

        if (
            $validated['status'] === 'published' &&
            empty($validated['published_at'])
        ) {
            $validated['published_at'] = now();
        }

        if ($validated['status'] === 'draft') {
            $validated['published_at'] = null;
        }

        unset($validated['featured_image_upload']);

        Post::create($validated);

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        if (!session('admin_id')) {
            return redirect()->route('admin.login');
        }

        $images = $this->getMediaImages();

        return view(
            'admin.posts.edit',
            compact('post', 'images')
        );
    }

    public function update(Request $request, Post $post)
    {
        if (!session('admin_id')) {
            return redirect()->route('admin.login');
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'category' => ['required', 'string', 'max:100'],
            'author' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],

            // Existing media library image
            'featured_image' => ['nullable', 'string', 'max:255'],

            // New uploaded image
            'featured_image_upload' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,gif',
                'max:5120',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $newSlug = Str::slug($validated['title']);

        $originalSlug = $newSlug;
        $counter = 1;

        while (
            Post::where('slug', $newSlug)
                ->where('id', '!=', $post->id)
                ->exists()
        ) {
            $newSlug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $validated['slug'] = $newSlug;

        /*
        |--------------------------------------------------------------------------
        | Author
        |--------------------------------------------------------------------------
        */

        if (empty($validated['author'])) {
            $validated['author'] = session('admin_name');
        }

        /*
        |--------------------------------------------------------------------------
        | Featured Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('featured_image_upload')) {

            $image = $request->file('featured_image_upload');

            $filename = time() . '_' . Str::slug(
                pathinfo(
                    $image->getClientOriginalName(),
                    PATHINFO_FILENAME
                )
            ) . '.' . $image->getClientOriginalExtension();

         ImageOptimizer::optimize(
    $image,
    public_path('images'),
    $filename
);

            $validated['featured_image'] = $filename;

        } elseif (!empty($validated['featured_image'])) {

            $selectedImage = basename($validated['featured_image']);

            $imagePath = public_path('images/' . $selectedImage);

            if (!file_exists($imagePath)) {
                return back()
                    ->withErrors([
                        'featured_image' => 'The selected media image could not be found.',
                    ])
                    ->withInput();
            }

            $validated['featured_image'] = $selectedImage;

        } else {

            // Keep existing image
            $validated['featured_image'] = $post->featured_image;

        }

        /*
        |--------------------------------------------------------------------------
        | Publication Date
        |--------------------------------------------------------------------------
        */

        if (
            $validated['status'] === 'published' &&
            empty($validated['published_at'])
        ) {
            $validated['published_at'] =
                $post->published_at ?? now();
        }

        if ($validated['status'] === 'draft') {
            $validated['published_at'] = null;
        }

        unset($validated['featured_image_upload']);

        $post->update($validated);

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if (!session('admin_id')) {
            return redirect()->route('admin.login');
        }

        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post deleted successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | Media Images
    |--------------------------------------------------------------------------
    */

    private function getMediaImages()
    {
        $imagePath = public_path('images');

        $images = [];

        if (!is_dir($imagePath)) {
            return $images;
        }

        foreach (scandir($imagePath) as $filename) {

            if ($filename === '.' || $filename === '..') {
                continue;
            }

            $fullPath = $imagePath . DIRECTORY_SEPARATOR . $filename;

            if (!is_file($fullPath)) {
                continue;
            }

            $extension = strtolower(
                pathinfo($filename, PATHINFO_EXTENSION)
            );

            if (!in_array($extension, [
                'jpg',
                'jpeg',
                'png',
                'webp',
                'gif',
            ])) {
                continue;
            }

            $images[] = [
                'filename' => $filename,
                'url' => asset('images/' . $filename),
            ];
        }

        return $images;
    }
}