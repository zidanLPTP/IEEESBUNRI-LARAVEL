<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CloudinaryService
{
    /**
     * Automatically shred an image from Cloudinary storage.
     * Uses authenticated API Key and Secret.
     */
    public static function deleteImage($imageUrl)
    {
        if (empty($imageUrl) || !str_contains($imageUrl, 'res.cloudinary.com')) {
            return false;
        }

        // Break down the public URL:
        // https://res.cloudinary.com/dplwjacdx/image/upload/v1773845228/vanqmflx83n1qkp83xmk.jpg
        $parts = explode('/upload/', $imageUrl);
        if (count($parts) < 2)
            return false;

        $path = $parts[1];

        // Exclude version string if it exists ('v1773845228/')
        if (preg_match('/^v\d+\//', $path, $matches)) {
            $path = substr($path, strlen($matches[0]));
        }

        // Strip the file extension '.jpg' / '.png'
        $publicId = preg_replace('/\.[^.]+$/', '', $path);

        $cloudName = env('NEXT_PUBLIC_CLOUDINARY_CLOUD_NAME');
        $apiKey = env('CLOUDINARY_API_KEY');
        $apiSecret = env('CLOUDINARY_API_SECRET');
        $timestamp = time();

        // SHA1 signature required by Cloudinary for authenticated REST API Destroy
        $signatureStr = "public_id={$publicId}&timestamp={$timestamp}{$apiSecret}";
        $signature = sha1($signatureStr);

        try {
            $response = Http::asForm()->post("https://api.cloudinary.com/v1_1/{$cloudName}/image/destroy", [
                'public_id' => $publicId,
                'api_key' => $apiKey,
                'timestamp' => $timestamp,
                'signature' => $signature,
            ]);

            return $response->successful();
        }
        catch (\Exception $e) {
            return false;
        }
    }
}
