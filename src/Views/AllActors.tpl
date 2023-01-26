<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/Assets/Css/AllActors.css" media="all"/>
</head>
<body>
<header>
    <div class="topnav">
        <a href="/film_rental/">Main page</a>
        <a class="active" href="/film_rental/actors">Actors</a>
        <a href="/film_rental/films">Films</a>
    </div>
</header>
{*
  1. all actors list in table with id and fullname
  2.  search by name and lastname
  3. clickable names that navigate to actor individual page
  *}

<div>
    <form class="search-section" method="post" action="/film_rental/actor">
        <input name="name" class="search-input" type="text" placeholder="Type Actors name and surname..." required>
        <div class="search-button">
            <button type="submit">Search</button>
        </div>
    </form>
</div>

</div>
<div class="table-section">
    <table>
        <tr>
            <th>Nr.</th>
            <th>Full Name</th>
            <th>Details</th>
        </tr>
        <tr>
            {foreach $actor as $act}
            <td>
                {$act.id}
            </td>
            <td>
                {$act.first_name} {$act.last_name}
            </td>
            <td>
                <form action="/film_rental/actor" method="post">
                    <input type="hidden" name="actorId" value="{$act.id}"/>
                    <button type="submit">Details</button>
                </form>
            </td>
        </tr>
        {/foreach}
    </table>
</div>
</body>