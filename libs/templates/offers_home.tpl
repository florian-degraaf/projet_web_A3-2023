<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
    <p>ID de la personne connecté : {$person_id}</p>
    <p>Role de la personne connecté : {$role}</p>

    <button id="offer" data-id="7" type="button">tableau offres</button>
    <div id="table_container"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="templates/offers_home.js"></script>
</body>


</html>