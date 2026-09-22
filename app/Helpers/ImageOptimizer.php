<?php

namespace App\Helpers;

class ImageOptimizer
{
    private const MAX_WIDTH = 1600;
    private const MAX_HEIGHT = 1600;
    private const QUALITY = 82;

    public static function optimize(
        $uploadedFile,
        string $destinationPath,
        string $filename
    ): string {
        $extension = strtolower(
            $uploadedFile->getClientOriginalExtension()
        );

        $sourcePath = $uploadedFile->getRealPath();

        /*
        |--------------------------------------------------------------------------
        | GIF
        |--------------------------------------------------------------------------
        | Keep GIF files as GIF so animated GIFs are not broken.
        */
        if ($extension === 'gif') {
            $uploadedFile->move($destinationPath, $filename);

            return $filename;
        }

        $imageInfo = @getimagesize($sourcePath);

        if (!$imageInfo) {
            $uploadedFile->move($destinationPath, $filename);

            return $filename;
        }

        $width = $imageInfo[0];
        $height = $imageInfo[1];
        $mime = $imageInfo['mime'];

        /*
        |--------------------------------------------------------------------------
        | Create source image
        |--------------------------------------------------------------------------
        */
        $source = match ($mime) {
            'image/jpeg' => @imagecreatefromjpeg($sourcePath),
            'image/png'  => @imagecreatefrompng($sourcePath),
            'image/webp' => @imagecreatefromwebp($sourcePath),
            default      => false,
        };

        if (!$source) {
            $uploadedFile->move($destinationPath, $filename);

            return $filename;
        }

        /*
        |--------------------------------------------------------------------------
        | Calculate new dimensions
        |--------------------------------------------------------------------------
        */
        $scale = min(
            self::MAX_WIDTH / $width,
            self::MAX_HEIGHT / $height,
            1
        );

        $newWidth = (int) round($width * $scale);
        $newHeight = (int) round($height * $scale);

        /*
        |--------------------------------------------------------------------------
        | Create destination canvas
        |--------------------------------------------------------------------------
        */
        $destination = imagecreatetruecolor(
            $newWidth,
            $newHeight
        );

        /*
        |--------------------------------------------------------------------------
        | Preserve transparency
        |--------------------------------------------------------------------------
        */
        if (
            $mime === 'image/png' ||
            $mime === 'image/webp'
        ) {
            imagealphablending($destination, false);
            imagesavealpha($destination, true);

            $transparent = imagecolorallocatealpha(
                $destination,
                0,
                0,
                0,
                127
            );

            imagefilledrectangle(
                $destination,
                0,
                0,
                $newWidth,
                $newHeight,
                $transparent
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Resize
        |--------------------------------------------------------------------------
        */
        imagecopyresampled(
            $destination,
            $source,
            0,
            0,
            0,
            0,
            $newWidth,
            $newHeight,
            $width,
            $height
        );

        /*
        |--------------------------------------------------------------------------
        | Generate WebP filename
        |--------------------------------------------------------------------------
        */
        $originalName = pathinfo(
            $filename,
            PATHINFO_FILENAME
        );

        $webpFilename = $originalName . '.webp';

        $outputPath = $destinationPath
            . DIRECTORY_SEPARATOR
            . $webpFilename;

        /*
        |--------------------------------------------------------------------------
        | Save as WebP
        |--------------------------------------------------------------------------
        */
        $saved = imagewebp(
            $destination,
            $outputPath,
            self::QUALITY
        );

        /*
        |--------------------------------------------------------------------------
        | Clean up
        |--------------------------------------------------------------------------
        */
        imagedestroy($source);
        imagedestroy($destination);

        /*
        |--------------------------------------------------------------------------
        | Fallback
        |--------------------------------------------------------------------------
        */
        if (!$saved) {
            $uploadedFile->move(
                $destinationPath,
                $filename
            );

            return $filename;
        }

        return $webpFilename;
    }
}