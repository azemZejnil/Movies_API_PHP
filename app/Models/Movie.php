<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Movie extends Model {
    use HasFactory, HasSlug;


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    protected $table = 'movies';

    protected $fillable = ['title', 'description', 'slug'];

    public function users() {
        return $this->belongsToMany(User::class, 'user_movie');
    }
}