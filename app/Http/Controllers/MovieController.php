<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MovieRepository;

class MovieController extends Controller
{
    private $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function index(Request $request)
    {
        $title = $request->query('title');
        $pageSize = $request->query('page_size') ?? 10;

        $movies = $this->movieRepository->getAll($title, $pageSize);

        return response()->json(['movies' => $movies]);
    }

    public function followMovie(Request $request, $id)
    {
        $user = auth()->user();

        $movie = $this->movieRepository->getById($id);

        if (!$movie) {
            return response()->json(['error' => 'Movie not found'], 404);
        }

        $success = $this->movieRepository->followMovie($user, $movie);

        if ($success) {
            return response()->json(['message' => 'Movie followed successfully']);
        } else {
            return response()->json(['error' => 'Error following movie'], 500);
        }
    }

    public function showMovieBySlug($slug)
    {
        $movie = $this->movieRepository->getBySlug($slug);

        return response()->json(['movie' => $movie]);
    }
}