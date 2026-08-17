<?php

if (!function_exists('storage_exists')) {
    function storage_exists(string $path): bool
    {
        return file_exists(public_path('storage/' . $path));
    }
}

if (!function_exists('storage_delete')) {
    function storage_delete(string $path): bool
    {
        $fullPath = public_path('storage/' . $path);
        return file_exists($fullPath) ? @unlink($fullPath) : false;
    }
}

if (!function_exists('storage_put')) {
    function storage_put(string $path, string $contents): bool
    {
        $fullPath = public_path('storage/' . $path);
        $dir = dirname($fullPath);
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }
        return file_put_contents($fullPath, $contents) !== false;
    }
}
