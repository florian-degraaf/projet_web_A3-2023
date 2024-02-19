<?php 
session_start();

require_once 'libs/Smarty.class.php';

$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
$smarty->setCacheDir('cache/');
$smarty->setConfigDir('configs/');

if(isset($_POST['submit'])){
  // on vérifie que le champ "Pseudo" n'est pas vide
  // empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set)
  if(empty($_POST['username'])){
      echo "Le champ Pseudo est vide.";
  } else {
      // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
      if(empty($_POST['password'])){
          echo "Le champ Mot de passe est vide.";
      } else {
        $servername = "127.0.0.1";
        $username = "root";
        $password = "root";
        try {
        $pdo = new PDO("mysql:host=$servername;dbname=mydb", $username, $password);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }
        $login=$_POST['username'];
        $mot_de_passe=$_POST['password'];
        $select_user = $pdo->prepare("SELECT personne.id, roles.description from personne inner join roles on personne.roles_id = roles.id WHERE personne.login = :login AND personne.mot_de_passe = :mot_de_passe;
        ");
        $select_user->bindParam('login', $login);
        $select_user->bindParam('mot_de_passe', $mot_de_passe);
        $select_user->execute();
        $data = $select_user->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($data as $row) {
          $person_id = $row["id"];
          $role = $row["description"];
        }

        if(count($data)> 0){
          $_SESSION['person_id'] = $person_id;
          $_SESSION['role'] = $role;
          header("Location: home.php"); 
        }
        else{
          session_destroy();
          echo "<p>Le login et/ou mot de passe sont fausses, veuillez reessayer ou contacter l'administration de votre établissement.</p>";
        }
      }
  }
}

$smarty->display('index.tpl');
