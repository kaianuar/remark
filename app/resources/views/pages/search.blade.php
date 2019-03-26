<html>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<html>
<body>
    <div class="container">
        <h1>Actor's Movie List</h1>
        @foreach($actors as $key => $actor)
        <div class="movie col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-12">
                <h2>Actor : {{ $actor->name }}</h2>
            </div>
            @break
        </div>     
        @endforeach  
        @foreach($actors as $key => $actor)
        <div class="movie col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-12">
                <h3>Movie : {{ $actor->title }}</h3>
                <span><b>Description</b> : <i>{{ $actor->description }}</i><br />
                    <b>Year </b>: <i> {{ $actor->year }} </i>
                </span>
            </div>
            @break
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