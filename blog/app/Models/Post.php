<?php

namespace App\Models;

class Post
{
    public static function find($slug)
    {
        base_path();
        if (! file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) {
                return redirect('/');
        }

        return cache()->remember("posts.{$slug}", 5, function() use ($path){
            return file_get_contents($path);
        });
    }
}
