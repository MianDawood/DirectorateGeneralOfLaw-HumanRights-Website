<?php

namespace App\Support;

class YoutubeHelper
{
    public static function extractVideoId(?string $url): ?string
    {
        if (!$url || !is_string($url)) {
            return null;
        }

        $url = trim($url);

        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $url, $matches)) {
            return $matches[1];
        }

        return null;
    }

    public static function normalizeUrl(string $url): ?string
    {
        $id = self::extractVideoId($url);

        return $id ? "https://www.youtube.com/watch?v={$id}" : null;
    }
}
