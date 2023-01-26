<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actor Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/Assets/Css/ActorPage.css" media="all"/>
</head>
{*
        1. ABOUT ACTOR BLOCK
        2. FILMS WITH ACTOR: LIST, COLUMNS: TITLE, RELEASE DATE, DESCRIPTION
    *}
<body>
<header>
    <div class="topnav">
        <a href="/film_rental/">Main page</a>
        <a href="/film_rental/actors">Actors</a>
        <a class="active" href="/film_rental/actor">Your Actor</a>
        <a href="/film_rental/films">Films</a>
    </div>
</header>
<section class="actor-block">
    <div class="actor-container">
        <div class="sticky">
            <div>
                <img src="https://media.istockphoto.com/id/1214428300/vector/default-profile-picture-avatar-photo-placeholder-vector-illustration.jpg?b=1&s=170667a&w=0&k=20&c=DA0U801QrcB0wZP0ijwYpymeB34fyFjYWebZqalaStI=">
            </div>
            <div>
                <h1>{foreach $actorFilms as $actorFilm}
                        <h1>{$actorFilm.first_name}  </h1>
                        <h1>{$actorFilm.last_name}</h1>
                        {break}
                    {/foreach}</h1>
            </div>
        </div>
    </div>
    <div class="film-container">
        <div class="film-header">
            <h3>Films</h3>
        </div>
        <div class="details_container">
            <h1>{foreach $actorFilms as $actorFilm}
                    <h4>{$actorFilm.title}</h4>
                    <h5>({$actorFilm.release_year})</h5>
                    <h6>{$actorFilm.description}</h6>
                    <hr>
                {/foreach}</h1>
            <br>
            <h1></h1>
        </div>
    </div>
</section>
</body>




