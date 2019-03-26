<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function director()
    {
        $data = Movie::leftJoin('directors', 'movies.director_id', '=', 'directors.id')
                        ->get();

        return $data;
    } 
}
