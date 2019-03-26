<html>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<html>
<body>
    <div class="container">
        <h1>Movie List</h1>
    @foreach($movies as $key => $movie)
        <div class="movie col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-12">
                <h2>Title : {{ $movie->title }}</h2>
            </div>
            <div class="col-md-12">
                <span><b>Description</b> : <i>{{ $movie->description }}</i><br />
                    <b>Year </b>: <i> {{ $movie->year }} </i><br />
                    <b>Director </b>: <i> {{ $movie->name }} </i>
                </span>
               
            </div>
        </div>     
    @endforeach
    <div>
    <div class="container">
        <form action="searchActor">
            Enter an actor name <input type="text" id="actor_name" name="actor_name">
            <input type="submit">
        </form>
    </div>
</body>