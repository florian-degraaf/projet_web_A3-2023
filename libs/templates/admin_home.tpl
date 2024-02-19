<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
    <p>ID de la personne connecté : {$person_id}</p>
    <p>Role de la personne connecté : {$role}</p>
    <button id="person" type="button">tableau personne</button>
    <button id="company" type="button">tableau entreprise</button>
    <button id="offer" type="button">tableau offres</button>
    <a id="offers" type="button" href="offers_home.php">offres</a>

    <div id="table_container"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="templates/home.js"></script>
</body>


</html>