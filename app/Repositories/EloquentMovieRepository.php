<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class EloquentMovieRepository implements MovieRepository
{
    public function getAll(string $title = null, int $pageSize = 10)
    {
        $cacheKey = 'movies.' . $title . '.' . $pageSize;
        $minutes = 60;

        $movies = Cache::remember($cacheKey, $minutes, function () use ($title, $pageSize) {
            $movies = Movie::query();

            if ($title) {
                $movies->where('title', 'like', '%' . $title . '%');
            }

            return $movies->paginate($pageSize);
        });

        Log::info("Retrieved movies from the cache for title: {$title} and page size: {$pageSize}");

        return $movies; 
    }

    public function getById(int $id): ?Movie
    {
        return Movie::find($id);
    }

    public function getBySlug(string $slug): ?Movie
    {
        return Movie::where('slug', $slug)->first();
    }

    public function followMovie(User $user, Movie $movie): bool
    {
        $user->movies()->syncWithoutDetaching($movie);
        return true;
    }
}