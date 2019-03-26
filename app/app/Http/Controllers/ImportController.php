<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;
use App\Director As Director;
use App\Actor As Actor;
use App\Location As Location;
use App\Country As Country;
use App\Movie As Movie;
use App\ActorMovie As ActorMovie;
use App\Review As Review;


class ImportController extends Controller
{
    private $filePath;
     
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->filePath = public_path('imports');
    }

    public function importmovies()
    {
        $pathToMovies =  "/imports/movies.csv";

        $body = Storage::get($pathToMovies);

        $reader = Reader::createFromString($body);      
        $reader->setHeaderOffset(0);
        $records = $reader->getRecords();

        $this->saveMovies($records);

    }

    public function importreviews()
    {
        $pathToReviews =  "/imports/reviews.csv";

        $body = Storage::get($pathToReviews);

        $reader = Reader::createFromString($body);      
        $reader->setHeaderOffset(0);
        $records = $reader->getRecords();

        $this->saveReviews($records);

    }    

    private function saveMovies($records)
    {
        foreach ($records as $key => $record) {

            $director = new Director;
            $actor = new Actor;
            $location = new Location;
            $country = new Country;
            $movie = new Movie;

            $directorID = $this->createIfNotExist($director, $record['Director']);
            $actorID = $this->createIfNotExist($actor, $record['Actor']);
            $locationID = $this->createIfNotExist($location, $record['Filming location']);
            $countryID = $this->createIfNotExist($country, $record['Country']);
            
            $id = $movie::where('title', $record['Movie'])->value('id');

            if(!$id = $movie::where('title', $record['Movie'])->value('id')){

    
                $movie->title = $record['Movie'];
                $movie->description = $record['Description'];
                $movie->year = $record['Year'];
                $movie->director_id = $directorID;

    
                $movie->save();
                $id = $movie->id;

                
            }

            $actorMovie = new ActorMovie;
            $actorMovie->movie_id = $id;
            $actorMovie->actor_id = $actorID;
            $actorMovie->location_id = $locationID;
            $actorMovie->country_id = $countryID;            
            $actorMovie->save();

        }

        echo "Import Completed";
    }

    private function saveReviews($records)
    {   
        foreach ($records as $key => $record) {
            $review = new Review;
            $movie = new Movie;

            if($id = $movie::where('title', $record['Movie'])->value('id')){
                $review->movie_id = $id;
                $review->name = $record['User'];
                $review->stars = $record['Stars'];
                $review->review = $record['Review'];

                $review->save();
            }
        }
        echo "Import Completed";
    }

    private function createIfNotExist($class, $value)
    {

        if(!$id = $class::where('name', $value)->value('id')){
            $class->name = $value;
    
            $class->save();

            $id = $class->id;
        }

        return $id;
    }


 
}
