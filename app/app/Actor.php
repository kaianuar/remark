<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    public function Movies($search)
    {
        $data = Actor::leftJoin('actormovie', 'actors.id', '=', 'actormovie.actor_id')
                        ->leftJoin('movies', 'actormovie.movie_id', '=', 'movies.id')
                            ->where('name', 'LIKE', "%" . $search ."%")
                            ->get();

        return $data;
    } 
}
