<?php
session_start();

require_once 'D:\Programs\wamp64\www\PROJETWEB\libs\libs\Smarty.class.php';

$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
$smarty->setCacheDir('cache/');
$smarty->setConfigDir('configs/');

$servername = "127.0.0.1";
$username = "root";
$password = "root";
try {
    $pdo = new PDO("mysql:host=$servername;dbname=mydb", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$type = $_POST["type"];
$table = $_POST["table"];

$select_person = $pdo->prepare("SELECT * from $table");
$select_person->execute();
$data = $select_person->fetchAll(PDO::FETCH_ASSOC);

foreach ($data as $row) {
    foreach ($row as $key => $value) {
        $$key = $value;
    }
};
$data = $data[0];
var_dump($data);

$select_sector = $pdo->prepare("SELECT nom_secteur from secteur inner join agir on secteur.id = agir.secteur_id inner join entreprise on entreprise_id = :id");
$select_sector->bindParam('id', $id);
$select_sector->execute();
$sectors_raw = $select_sector->fetchAll(PDO::FETCH_ASSOC);

$sectors = array();
foreach ($sectors_raw as $row) {
    $sector = $row['nom_secteur'];
    $sectors[] = $sector;
}
var_dump($sectors);

$select_location = $pdo->prepare("SELECT adresse_localite FROM localite inner join personne on entreprise_id = :id");
$select_location->bindParam('id', $id);
$select_location->execute();
$locations_raw = $select_location->fetchAll(PDO::FETCH_ASSOC);

$locations = array();
foreach ($locations_raw as $row) {
    $location = $row['adresse_localite'];
    $locations[] = $location;
}
var_dump($locations);

$smarty->assign('sectors', $sectors);
$smarty->assign('locations', $locations);
var_dump($data);

if ($type == 3) {
    $update_data = json_decode($_POST["inputData"], true);
    var_dump($update_data);

        foreach ($update_data as $key => $value) {
            $$key = $value;
        };
    var_dump($_POST["inputData"]);

    if ($table == "personne") {
        $modify = $pdo->prepare("UPDATE personne 
        SET nom = :nom,
            prenom = :prenom,
            dob = :dob,
            mot_de_passe = :mot_de_passe
        WHERE personne.login = :login;
    
      ");
        $modify->bindParam('nom', $nom);
        $modify->bindParam('prenom', $prenom);
        $modify->bindParam('dob', $dob);
        $modify->bindParam('login', $login);
        $modify->bindParam('mot_de_passe', $mot_de_passe);
    }

    if ($table == "entreprise") {

        $sectors = $secteur;
        var_dump($sectors);

        $locations = $localite;
        var_dump($locations);

        $modify = $pdo->prepare("UPDATE mydb.entreprise 
        SET nom = :nom,
            evaluation_stagaire = :evaluation_stagaire,
            confiance_pilote = :confiance_pilote,
            description_entreprise = :description_entreprise
        WHERE entreprise.id = :id;");
        $modify->bindParam(':id', $id);
        $modify->bindParam(':nom', $nom);
        $modify->bindParam(':evaluation_stagaire', $evaluation_stagaire);
        $modify->bindParam(':confiance_pilote', $confiance_pilote);
        $modify->bindParam(':description_entreprise', $description_entreprise);

        $modify->execute();


/*
        foreach ($sectors as $row) {
            $modify_sectors = $pdo->prepare("INSERT IGNORE INTO agir(entreprise_id,secteur_id)
        VALUES (:id,
        (SELECT id from secteur where nom_secteur = :nom_secteur))");
            $modify_sectors->bindParam('id', $id);
            $modify_sectors->bindParam('nom_secteur', $row);
            $modify_sectors->execute();
        };
        foreach ($locations as $row) {
            $modify_locations = $pdo->prepare("INSERT IGNORE INTO localite(adresse_localite, entreprise_id)
        VALUES (:adresse_localite, :id)");
            $modify_locations->bindParam('id', $id);
            $modify_locations->bindParam('adresse_localite', $row);
            $modify_locations->execute();
        };*/
    }

    $select_person = $pdo->prepare("SELECT * from $table;");
    $select_person->execute();
    $data = $select_person->fetchAll(PDO::FETCH_ASSOC);
    $data = $data[0];
}


$smarty->assign('data', $data);
$smarty->assign('table', $table);

var_dump($_POST);

if ($type == 1 or $type == 3) {
    $table_data = $smarty->fetch('table_template.tpl');
} else if ($type == 2) {
    if ($table == 'personne') {
        $table_data = $smarty->fetch('person_modify_table.tpl');
    } else if ($table == 'entreprise') {
        $smarty->assign('data', $data);

        $select_sector = $pdo->prepare("SELECT nom_secteur from secteur inner join agir on secteur.id = agir.secteur_id inner join entreprise on entreprise_id = :id");
        $select_sector->bindParam('id', $id);
        $select_sector->execute();
        $sectors_raw = $select_sector->fetchAll(PDO::FETCH_ASSOC);

        $sectors = array();
        foreach ($sectors_raw as $row) {
            $sector = $row['nom_secteur'];
            $sectors[] = $sector;
        }
        var_dump($sectors);

        $select_location = $pdo->prepare("SELECT adresse_localite FROM localite inner join personne on entreprise_id = :id");
        $select_location->bindParam('id', $id);
        $select_location->execute();
        $locations_raw = $select_location->fetchAll(PDO::FETCH_ASSOC);

        $locations = array();
        foreach ($locations_raw as $row) {
            $location = $row['adresse_localite'];
            $locations[] = $location;
        }
        var_dump($locations);

        $smarty->assign('sectors', $sectors);
        $smarty->assign('locations', $locations);

        $table_data = $smarty->fetch('company_modify_table.tpl');
    } else if ($table == 'offre') {
        $table_data = $smarty->fetch('listing_modify_table.tpl');
    }
}
if ($type==4){
    $column = $_POST['column'];
    $value = $_POST['value'];

    var_dump($type, $column);
    if ($column = 1){
        $delete = $pdo->prepare("DELETE FROM localite where entreprise_id = :id and adresse_localite = :localite");
        $delete->bindParam('id',$id);
        $delete->bindParam('localite',$value);
        var_dump($id,$value);
        $delete->execute();
    }   
    if ($column = 2){
        $delete = $pdo->prepare("DELETE FROM agir where entreprise_id = :id and secteur_id = (select id from secteur where nom_secteur = :secteur)");
        $delete->bindParam('id',$id);
        $delete->bindParam('secteur',$value);
        var_dump($id,$value);
        $delete->execute();
    }   

}

echo $table_data;