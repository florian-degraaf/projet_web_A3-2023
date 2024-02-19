<?php

// parties en commun pour tous les actions ====================================

// session
session_start();

// importer smarty
require_once 'D:\Programs\wamp64\www\PROJETWEB\libs\libs\Smarty.class.php';

$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
$smarty->setCacheDir('cache/');
$smarty->setConfigDir('configs/');

// connection à la base de données
$servername = "127.0.0.1";
$username = "root";
$password = "root";
try {
    $pdo = new PDO("mysql:host=$servername;dbname=mydb", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// stocker le type de requete et nom de table
$type = $_POST["type"];
$table = $_POST["table"];

// recuperer les données et les stocker dans des variables
$select_person = $pdo->prepare("SELECT * from $table");
$select_person->execute();
$data = $select_person->fetchAll(PDO::FETCH_ASSOC);

//================================================================================================================================================


function define_sectors($pdo, $id)
{
    $select_sector = $pdo->prepare("SELECT DISTINCT nom_secteur from secteur inner join agir on secteur.id = agir.secteur_id inner join entreprise on entreprise_id = :id");
    $select_sector->bindParam('id', $id);
    $select_sector->execute();
    $sectors_raw = $select_sector->fetchAll(PDO::FETCH_ASSOC);

    $sectors_sub_array = array();
    foreach ($sectors_raw as $row) {
        $sector = $row['nom_secteur'];
        $sectors_sub_array[] = $sector;
    }
    return $sectors_sub_array;
}
function define_locations($pdo, $id)
{
    $select_location = $pdo->prepare("SELECT DISTINCT adresse_localite FROM localite inner join personne on entreprise_id = :id");
    $select_location->bindParam('id', $id);
    $select_location->execute();
    $locations_raw = $select_location->fetchAll(PDO::FETCH_ASSOC);

    $locations_sub_array = array();
    foreach ($locations_raw as $row) {
        $location = $row['adresse_localite'];
        $locations_sub_array[] = $location;
    }
    return $locations_sub_array;
}

function define_sub_array($data, $id)
{
    foreach ($data as $key => $row) {
        if ($data[$key]['id'] == $id) {
            $data_for_id = $data[$key];
        };
    }
    return $data_for_id;
}

$sectors = array();
$locations = array();

foreach ($data as $row) {
    foreach ($row as $key => $value) {
        $$key = $value;
    }
    // repeated code --------------------------------------------------------------------------------------------------------------------------

    $sectors[] = define_sectors($pdo, $id);
    $locations[] = define_locations($pdo, $id);
};

$smarty->assign('sectors', $sectors);
$smarty->assign('locations', $locations);

//var_dump($sectors, $locations);
//$data = $data[0];
//var_dump($data);


if ($type == 3) {
    $update_data = json_decode($_POST["inputData"], true);
    //var_dump($update_data);

    foreach ($update_data as $key => $value) {
        $$key = $value;
        //var_dump($key, $$key);
    };
    //var_dump($_POST["inputData"]);

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
        $id = $_POST['data_id'];

        //var_dump($update_data);
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
        $select_person = $pdo->prepare("SELECT * from $table;");
        $select_person->execute();
        $data = $select_person->fetchAll(PDO::FETCH_ASSOC);
        $data = $data[0]; // A MODIFIER !!!!!!!!!*/
    }
}

if ($type == 4) {
    $column = $_POST['column'];
    $value = $_POST['value'];
    $id = $_POST['data_id'];
    if ($table == "entreprise") {
        //var_dump($type, $column, $value);
        if ($column == 1) {
            $delete = $pdo->prepare("DELETE FROM agir where entreprise_id = :id and secteur_id = (select id from secteur where nom_secteur = :secteur)");
            $delete->bindParam('id', $id);
            $delete->bindParam('secteur', $value);
            //var_dump($id, $value);
            $delete->execute();
        }
        if ($column == 2) {
            $delete = $pdo->prepare("DELETE FROM localite where entreprise_id = :id and adresse_localite = :localite");
            $delete->bindParam('id', $id);
            $delete->bindParam('localite', $value);
            //var_dump($id, $value);
            $delete->execute();
        }
    }
}

if ($type == 5) {
    $table = $_POST['table'];
    $column = $_POST['column'];
    $value = $_POST['value'];
    $id = $_POST['data_id'];

    if ($table == "entreprise") {
        if ($column == 1) {
            $secteur = $_POST['value'];
            //var_dump($secteur);
            $modify_sectors = $pdo->prepare("INSERT IGNORE INTO agir(entreprise_id,secteur_id)
        VALUES (:id,
        (SELECT id from secteur where nom_secteur = :nom_secteur))");
            $modify_sectors->bindParam('id', $id);
            $modify_sectors->bindParam('nom_secteur', $secteur);
            $modify_sectors->execute();
        }
        if ($column == 2) {
            $localite = $_POST['value'];
            $modify_locations = $pdo->prepare("INSERT IGNORE INTO localite(adresse_localite, entreprise_id)
        VALUES (:adresse_localite, :id)");
            $modify_locations->bindParam('id', $id);
            $modify_locations->bindParam('adresse_localite', $localite);
            $modify_locations->execute();
        };
    }
}

if ($type == 7) {
    $table = $_POST['table'];
    $data = json_decode($_POST['inputData']);

    foreach ($data as $key => $row) {
        $$key = $row;
    }

    if ($table == "entreprise") {
        $create_company = $pdo->prepare("INSERT INTO entreprise(nom,evaluation_stagaire,confiance_pilote,description_entreprise) 
        values (:nom,:evaluation_stagaire,:confiance_pilote,:description_entreprise);");
        $create_company->bindParam(':nom', $nom);
        $create_company->bindParam(':evaluation_stagaire', $evaluation_stagaire);
        $create_company->bindParam(':confiance_pilote', $confiance_pilote);
        $create_company->bindParam(':description_entreprise', $description_entreprise);
        $create_company->execute();
    }
    else if ($table == "personne"){
        $create_company = $pdo->prepare("insert into personne(nom,prenom,dob,login,mot_de_passe,roles_id) 
        values (:nom,:prenom,:dob,:login,:mot_de_passe,
            (SELECT id FROM roles WHERE description = :role)
        );");
        $create_company->bindParam(':nom', $nom);
        $create_company->bindParam(':prenom', $prenom);
        $create_company->bindParam(':dob', $dob);
        $create_company->bindParam(':login', $login);
        $create_company->bindParam(':mot_de_passe', $mot_de_passe);
        $create_company->bindParam(':role', $role);
        $create_company->execute();
    }
}

if ($type == 8) {
    $id = $_POST['data_id'];
    if ($table == 'entreprise') {
        $delete = $pdo->prepare("DELETE FROM agir where entreprise_id = :id;
        delete from localite where entreprise_id = :id;
        delete from entreprise where entreprise.id = :id;");
        $delete->bindParam('id', $id);
        $delete->execute();
    }
    else if ($table == "personne"){
        $delete = $pdo->prepare("DELETE FROM personne where personne.id = :id;");
        $delete->bindParam('id', $id);
        $delete->execute();
    }
}

//=============================== AFFICHAGE =========================================

//var_dump($_POST);
$smarty->assign('table', $table);

if ($type == 1 or $type == 3 or $type == 7 or $type == 8) {
    $table = $_POST["table"];
    // recuperer les données et les stocker dans des variables
    $select_person = $pdo->prepare("SELECT * from $table");
    $select_person->execute();
    $data = $select_person->fetchAll(PDO::FETCH_ASSOC);

    if ($table == "personne") {
        foreach ($data as $row) {
            foreach ($row as $key => $value) {
                $$key = $value;
            }   
            /*
            $select_information = $pdo->prepare("select centre from info_supplementaire inner join donner on info_supplementaire_id = info_supplementaire.id where personne_id = :id");
            $select_information->bindParam('id',$id);
            $select_information->execute();
            $information[] = $select_information->fetchAll(PDO::FETCH_ASSOC);*/
        }    
        $smarty->assign('data', $data);
        $table_data = $smarty->fetch('select_person.tpl');
     }
    else if ($table == "entreprise") {
        $sectors = array();
        $locations = array();

        foreach ($data as $row) {
            foreach ($row as $key => $value) {
                $$key = $value;
            }
            // repeated code --------------------------------------------------------------------------------------------------------------------------

            $sectors[] = define_sectors($pdo, $id);
            $locations[] = define_locations($pdo, $id);
        };
        $smarty->assign('sectors', $sectors);
        $smarty->assign('locations', $locations);
        $smarty->assign('data', $data);
        $table_data = $smarty->fetch('select_company.tpl');
    }

} else if ($type == 2 or $type == 4 or $type == 5) {
    if ($table == 'personne') {
        $role = $_SESSION['role'];
        $id = $_POST['data_id'];

        // selecting data for the id 
        $data_for_id = define_sub_array($data, $id);
        $smarty->assign('data_for_id', $data_for_id);
        $smarty->assign('data', $data);
        $smarty->assign('role', $role);

        var_dump($data_for_id);
        
        $table_data = $smarty->fetch('person_modify.tpl');

    } else if ($table == 'entreprise') {
        $id = $_POST['data_id'];

        // selecting data for the id 
        $data_for_id = define_sub_array($data, $id);

        // selecting sectors and locations for id
        $sectors_for_id = define_sectors($pdo, $id);
        $locations_for_id = define_locations($pdo, $id);
        //var_dump($sectors_for_id, $locations_for_id);

        // assigning smarty variables
        $smarty->assign('data', $data_for_id);
        $smarty->assign('sectors', $sectors_for_id);
        $smarty->assign('locations', $locations_for_id);

        $table_data = $smarty->fetch('company_modify.tpl');
    } else if ($table == 'offre') {
        $table_data = $smarty->fetch('listing_modify_table.tpl');
    }
} else if ($type == 6) {
    if ($table == "entreprise") {
        $sectors = array();
        $locations = array();
        $smarty->assign('sectors', $sectors);
        $smarty->assign('locations', $locations);

        $table_data = $smarty->fetch('company_create.tpl');
    }
    else if($table == "personne"){
        $table_data = $smarty->fetch('person_create.tpl');
    }
}

echo $table_data;
