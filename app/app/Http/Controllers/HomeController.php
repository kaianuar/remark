<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;
use App\Actor As Actor;
use App\Movie As Movie;
use Symfony\Component\HttpFoundation\Request;


class HomeController extends Controller
{
    public function index()
    {
        $movie = new Movie;
        $movies = $movie->director();

        return view('pages.index')->with(compact('movies'));
    }

    public function search(Request $request)
    {
        $search = $request->input('actor_name');

        $actors = new Actor;
        $actors = $actors->Movies($search);

        return view('pages.search')->with(compact('actors'));
    }    
}