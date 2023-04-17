<?php
namespace App\Repositories;

use App\Models\Movie;
use App\Models\User;

interface MovieRepository
{
    public function getAll(string $title = null, int $pageSize = 10);
    public function getById(int $id): ?Movie;
    public function getBySlug(string $slug): ?Movie;
    public function followMovie(User $user, Movie $movie): bool;
}
