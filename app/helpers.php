<?php

if (!function_exists('storage_exists')) {
    function storage_exists(string $path): bool
    {
        return file_exists(public_path('storage/' . $path));
    }
}
