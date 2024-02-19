<?php
//les parametres de la base de donnees
$servername = "127.0.0.1";
$username = "root";
$password = "root";

try {
  // se connecter a la base de donnees
  $conn = new PDO("mysql:host=$servername;dbname=mydb", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Script Output</title>
  </head>
  <body>
    <br>
    <strong>Login</strong>
    <form action="modify.php" method="post">
        <input type="text">
        <input type="password">
        <input type="submit">
    </form>
      </body>
</html> 