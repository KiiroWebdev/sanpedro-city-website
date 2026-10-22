<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\ImageOptimizer;

class AdminMediaController extends Controller
{
    public function index()
    {
        if (!session('admin_id')) {
            return redirect()->route('admin.login');
        }

        $imagePath = public_path('images');

        $images = [];

        if (is_dir($imagePath)) {
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
                    'gif'
                ])) {
                    continue;
                }

                $dimensions = @getimagesize($fullPath);

                $images[] = [
                    'filename' => $filename,
                    'url' => asset('images/' . $filename),
                    'size' => filesize($fullPath),
                    'width' => $dimensions[0] ?? null,
                    'height' => $dimensions[1] ?? null,
                    'used' => Post::where('featured_image', $filename)->exists(),
                ];
            }
        }

        usort($images, function ($a, $b) {
            return strcmp($b['filename'], $a['filename']);
        });

        return view('admin.media.index', compact('images'));
    }

    public function store(Request $request)
    {
        if (!session('admin_id')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp,gif',
                'max:5120',
            ],
        ]);

        $image = $request->file('image');

        
$filename = Str::uuid() . '_' . Str::slug(
    pathinfo(
        $image->getClientOriginalName(),
        PATHINFO_FILENAME
    )
) . '.' . strtolower($image->getClientOriginalExtension());


   
try {
    ImageOptimizer::optimize(
        $image,
        public_path('images'),
        $filename
    );
} catch (\RuntimeException $e) {
    return redirect()
        ->route('admin.media.index')
        ->with('error', 'The image could not be processed. Please upload a valid JPG, PNG, or WebP image.');
}

return redirect()
    ->route('admin.media.index')
    ->with('success', 'Image uploaded successfully.');

    }

    public function destroy(string $filename)
    {
        if (!session('admin_id')) {
            return redirect()->route('admin.login');
        }

        if (
    basename($filename) !== $filename ||
    !preg_match('/\A[a-zA-Z0-9._-]+\.(jpg|jpeg|png|webp|gif)\z/i', $filename)
) {
    return redirect()
        ->route('admin.media.index')
        ->with('error', 'Invalid image filename.');
}

        $path = public_path('images/' . $filename);

        if (!file_exists($path)) {
            return redirect()
                ->route('admin.media.index')
                ->with('error', 'Image not found.');
        }

        // Prevent deletion if the image is being used by a post
        if (Post::where('featured_image', $filename)->exists()) {
            return redirect()
                ->route('admin.media.index')
                ->with('error', 'This image cannot be deleted because it is currently used by a post.');
        }

        unlink($path);

        return redirect()
            ->route('admin.media.index')
            ->with('success', 'Image deleted successfully.');
    }
}