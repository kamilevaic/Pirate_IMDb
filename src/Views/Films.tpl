<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actor Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/Assets/Css/films.css" media="all"/>
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
        <a class="active" href="/film_rental/films">Films</a>
    </div>
</header>
<section class="film-section">
    {foreach $films as $film}
        <div class="film-box">
            <h3> {$film.title}</h3>
            <h4> {$film.release_year}</h4>
            <h5> {$film.description}</h5>
            <h4> {$film.rental_rate} $/day</h4>
        </div>
    {/foreach}

</section>
</body>
