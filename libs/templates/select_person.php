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

////var_dump($sectors, $locations);
//$data = $data[0];
////var_dump($data);


if ($type == 3) {
    $update_data = json_decode($_POST["inputData"], true);
    $id = $_POST['data_id'];
    ////var_dump($update_data);

    foreach ($update_data as $key => $value) {
        $$key = $value;
        ////var_dump($key, $$key);
    };
    //var_dump($id);

    ////var_dump($_POST["inputData"]);

    if ($table == "personne") {
        $modify = $pdo->prepare("UPDATE personne 
        SET nom = :nom,
            prenom = :prenom,
            dob = :dob,
            roles_id = (select roles.id from roles where description = :role)
        WHERE personne.id = :id;");
        $modify->bindParam('nom', $nom);
        $modify->bindParam('prenom', $prenom);
        $modify->bindParam('dob', $dob);
        $modify->bindParam('id', $id);
        $modify->bindParam('role', $role);
        $modify->execute();
    }

    if ($table == "entreprise") {

        $id = $_POST['data_id'];

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
    } else if ($table == "offre") {

        $id = $_POST['data_id'];

        $modify = $pdo->prepare("UPDATE offre 
        SET titre = :titre,
            date_offre = :date_offre,
            base_de_remuneration = :base_de_remuneration,
            duree_stage = :duree_stage,
            nombre_places = :nombre_places,
            description_offre = :description_offre,
            localite_id = (SELECT localite.id FROM localite WHERE adresse_localite = :localite),
            entreprise_id = (select id from entreprise where nom = :entreprise) 
        WHERE offre.id = :id;
        ");
        $modify->bindParam(':id', $id);
        $modify->bindParam(':titre', $titre);
        $modify->bindParam(':date_offre', $date_offre);
        $modify->bindParam(':base_de_remuneration', $base_de_remuneration);
        $modify->bindParam(':duree_stage', $duree_stage);
        $modify->bindParam(':nombre_places', $nombre_places);
        $modify->bindParam(':description_offre', $description_offre);
        $modify->bindParam(':localite', $localite);
        $modify->bindParam(':entreprise', $entreprise);
        $modify->execute();
    }
}

if ($type == 4) {

    if ($table == "entreprise") {
        ////var_dump($type, $column, $value);
        $column = $_POST['column'];
        $value = $_POST['value'];
        $id = $_POST['data_id'];
        if ($column == 1) {
            $delete = $pdo->prepare("DELETE FROM agir where entreprise_id = :id and secteur_id = (select id from secteur where nom_secteur = :secteur)");
            $delete->bindParam('id', $id);
            $delete->bindParam('secteur', $value);
            ////var_dump($id, $value);
            $delete->execute();
        }
        if ($column == 2) {
            $delete = $pdo->prepare("DELETE FROM localite where entreprise_id = :id and adresse_localite = :localite");
            $delete->bindParam('id', $id);
            $delete->bindParam('localite', $value);
            ////var_dump($id, $value);
            $delete->execute();
        }
    }
    else if ($table == "offre"){
        $value = $_POST['value'];
        $id = $_POST['data_id'];
        $delete = $pdo->prepare("DELETE FROM requerir where offre_id = :id and competences_id = (select id from competences where nom_competence = :competence)");
        $delete->bindParam('id', $id);
        $delete->bindParam('competence', $value);
        ////var_dump($id, $value);
        $delete->execute();
    }
}

if ($type == 5) {

    if($table == "offre"){
        $table = $_POST['table'];
        $competence = $_POST['value'];
        $id = $_POST['data_id'];
        ////var_dump($id,$competence);
        $modify_skills = $pdo->prepare("INSERT IGNORE INTO requerir(offre_id,competences_id)
        VALUES (:offre_id,
        (SELECT id from competences where nom_competence = :nom_competence))");
            $modify_skills->bindParam('offre_id', $id);
            $modify_skills->bindParam('nom_competence', $competence);
            $modify_skills->execute();
        }
    else if ($table == "entreprise") {
        $table = $_POST['table'];
        $column = $_POST['column'];
        $value = $_POST['value'];
        $id = $_POST['data_id'];
        if ($column == 1) {
            $secteur = $_POST['value'];
            ////var_dump($secteur);
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
    } else if ($table == "personne") {
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
    } else if ($table == "offre") {
        $create_offer = $pdo->prepare("insert into offre(titre,date_offre,base_de_remuneration,duree_stage,nombre_places,description_offre,localite_id,entreprise_id) 
        values (:titre,:date_offre,:base_de_remuneration,:duree_stage,:nombre_places,:description_offre,
        (select localite.id from localite where adresse_localite = :localite),
        (select entreprise.id from entreprise where nom = :entreprise)
        );");
        $create_offer->bindParam(':titre', $titre);
        $create_offer->bindParam(':date_offre', $date_offre);
        $create_offer->bindParam(':base_de_remuneration', $base_de_remuneration);
        $create_offer->bindParam(':duree_stage', $duree_stage);
        $create_offer->bindParam(':nombre_places', $nombre_places);
        $create_offer->bindParam(':description_offre', $description_offre);
        $create_offer->bindParam(':localite', $localite);
        $create_offer->bindParam(':entreprise', $entreprise);
        $create_offer->execute();
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
    } else if ($table == "personne") {
        $delete = $pdo->prepare("DELETE FROM personne where personne.id = :id;");
        $delete->bindParam('id', $id);
        $delete->execute();
    } else if ($table == "offre") {
        $delete = $pdo->prepare("DELETE FROM offre where offre.id = :id;");
        $delete->bindParam('id', $id);
        $delete->execute();
    }
}

//=============================== AFFICHAGE =========================================

////var_dump($_POST);
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
    } else if ($table == "entreprise") {
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
    } else if ($table == "offre") {
        $locations = array();
        $companies = array();
        $skills = array();
        $cpt = 0;
        $skills_sub_array = array();
        foreach ($data as $row) {
            foreach ($row as $key => $value) {
                $$key = $value;
            }
            // ============================================================= !!!!!!!!!!!!!!!!!!!
            $select_location = $pdo->prepare("select adresse_localite from localite where id = :localite_id");
            $select_location->bindParam('localite_id', $localite_id);
            $select_location->execute();
            $locations[] = $select_location->fetchAll(PDO::FETCH_ASSOC);
            $locations[$cpt] = $locations[$cpt][0];
            
            $select_entreprise = $pdo->prepare("select nom from entreprise where id = :entreprise_id");
            $select_entreprise->bindParam('entreprise_id', $entreprise_id);
            $select_entreprise->execute();
            $companies[] = $select_entreprise->fetchAll(PDO::FETCH_ASSOC);

            $companies[$cpt] = $companies[$cpt][0];
            $select_skills = $pdo->prepare("SELECT DISTINCT nom_competence from competences inner join requerir on competences.id = requerir.competences_id inner join offre on offre_id = :id");
            $select_skills->bindParam('id', $id);
            $select_skills->execute();
            $skills[] = $select_skills->fetchAll(PDO::FETCH_ASSOC);

            
            ////var_dump($skills_row);
            $cpt += 1;
            // ============================================================= !!!!!!!!!!!!!!!!!!!!!!!!!
        }
        foreach ($skills as $key=>$row) {
            foreach($row as $item){
                $skill = $item;
                $skills_sub_array[] = $skill;
            }
        }
        $smarty->assign('locations', $locations);
        $smarty->assign('companies', $companies);
        $smarty->assign('skills', $skills_sub_array);

        $smarty->assign('data', $data);
        $table_data = $smarty->fetch('select_offer.tpl');
    }
} else if ($type == 2 or $type == 4 or $type == 5) {
    $id = $_POST['data_id'];

    if ($table == 'personne') {
        $role = $_SESSION['role'];
        // selecting data for the id 
        $data_for_id = define_sub_array($data, $id);
        $smarty->assign('data_for_id', $data_for_id);
        $smarty->assign('data', $data);
        $smarty->assign('role', $role);

        ////var_dump($data_for_id);

        $table_data = $smarty->fetch('person_modify.tpl');
    } else if ($table == 'entreprise') {
        // selecting data for the id 
        $data_for_id = define_sub_array($data, $id);

        // selecting sectors and locations for id
        $sectors_for_id = define_sectors($pdo, $id);
        $locations_for_id = define_locations($pdo, $id);
        ////var_dump($sectors_for_id, $locations_for_id);

        // assigning smarty variables
        $smarty->assign('data', $data_for_id);
        $smarty->assign('sectors', $sectors_for_id);
        $smarty->assign('locations', $locations_for_id);

        $table_data = $smarty->fetch('company_modify.tpl');
    } else if ($table == 'offre') {
        $data_for_id = define_sub_array($data, $id);
        ////var_dump($data_for_id);
        foreach ($data_for_id as $key => $value) {
            $$key = $value;
        }
        // ============================================================= !!!!!!!!!!!!!!!!!!!
        $select_location = $pdo->prepare("select adresse_localite from localite where id = :localite_id");
        $select_location->bindParam('localite_id', $localite_id);
        $select_location->execute();
        $location = $select_location->fetchAll(PDO::FETCH_ASSOC);

        $select_entreprise = $pdo->prepare("select nom from entreprise where id = :entreprise_id");
        $select_entreprise->bindParam('entreprise_id', $entreprise_id);
        $select_entreprise->execute();
        $company = $select_entreprise->fetchAll(PDO::FETCH_ASSOC);
        
        $select_skills = $pdo->prepare("SELECT DISTINCT nom_competence from competences inner join requerir on competences.id = requerir.competences_id inner join offre on offre_id = :id");
        $select_skills->bindParam('id', $id);
        $select_skills->execute();
        $skills_row = $select_skills->fetchAll(PDO::FETCH_ASSOC);
        ////var_dump($skills_row);

        $skills_sub_array = array();
        foreach ($skills_row as $row) {
            $skill = $row['nom_competence'];
            $skills_sub_array[] = $skill;
        }
        ////var_dump($skills_sub_array);
        // ============================================================= !!!!!!!!!!!!!!!!!!!

        ////var_dump($company, $location);

        $smarty->assign('location', $location);
        $smarty->assign('company', $company);
        $smarty->assign('skills', $skills_sub_array);

        $smarty->assign('data', $data_for_id);

        $table_data = $smarty->fetch('offer_modify.tpl');
    }
} else if ($type == 6) {
    if ($table == "entreprise") {
        $table_data = $smarty->fetch('company_create.tpl');
    } else if ($table == "personne") {
        $table_data = $smarty->fetch('person_create.tpl');
    } else if ($table = "offre") {
        $table_data = $smarty->fetch('offer_create.tpl');
    }
} else if ($type == 9) {
    if ($table == "offre") {
        $offer_id = $_POST['offer_id'];
        // recuperer les données et les stocker dans des variables
        $data_for_id = define_sub_array($data, $offer_id);
        $locations = array();
        $companies = array();

        $cpt = 0;
        foreach ($data as $row) {
            foreach ($row as $key => $value) {
                $$key = $value;
            }
            // ============================================================= !!!!!!!!!!!!!!!!!!!
            $select_location = $pdo->prepare("select adresse_localite from localite where id = :localite_id");
            $select_location->bindParam('localite_id', $localite_id);
            $select_location->execute();
            $locations[] = $select_location->fetchAll(PDO::FETCH_ASSOC);
            $locations[$cpt] = $locations[$cpt][0];

            $select_entreprise = $pdo->prepare("select nom from entreprise where id = :entreprise_id");
            $select_entreprise->bindParam('entreprise_id', $entreprise_id);
            $select_entreprise->execute();
            $companies[] = $select_entreprise->fetchAll(PDO::FETCH_ASSOC);
            $companies[$cpt] = $companies[$cpt][0];

            $cpt += 1;
            // ============================================================= !!!!!!!!!!!!!!!!!!!!!!!!!
        }
        $smarty->assign('locations', $locations);
        $smarty->assign('companies', $companies);
        $smarty->assign('data', $data_for_id);
        $smarty->assign('apply_state', 0);


        $table_data = $smarty->fetch('select_offers_home.tpl');
    }
} else if ($type == 10){
    if ($table == "offre") {
        ////var_dump($_POST);
        $offer_id = $_POST['data_id'];
        // recuperer les données et les stocker dans des variables
        $data_for_id = define_sub_array($data, $offer_id);
        ////var_dump($data_for_id);
        $locations = array();
        $companies = array();

        $cpt = 0;
        foreach ($data as $row) {
            foreach ($row as $key => $value) {
                $$key = $value;
            }
            // ============================================================= !!!!!!!!!!!!!!!!!!!
            $select_location = $pdo->prepare("select adresse_localite from localite where id = :localite_id");
            $select_location->bindParam('localite_id', $localite_id);
            $select_location->execute();
            $locations[] = $select_location->fetchAll(PDO::FETCH_ASSOC);
            $locations[$cpt] = $locations[$cpt][0];

            $select_entreprise = $pdo->prepare("select nom from entreprise where id = :entreprise_id");
            $select_entreprise->bindParam('entreprise_id', $entreprise_id);
            $select_entreprise->execute();
            $companies[] = $select_entreprise->fetchAll(PDO::FETCH_ASSOC);
            $companies[$cpt] = $companies[$cpt][0];

            $cpt += 1;
            // ============================================================= !!!!!!!!!!!!!!!!!!!!!!!!!
        }
        $smarty->assign('locations', $locations);
        $smarty->assign('companies', $companies);
        $smarty->assign('data', $data_for_id);
        $smarty->assign('apply_state', 1);


        $table_data = $smarty->fetch('select_offers_home.tpl');
}
} else if ($type == 11){
    $cv = $_POST['cv'];
    $lm = $_POST['lm'];
    $offre_id = $_POST['data_id'];
    ////var_dump($id);
    $apply = $pdo->prepare("insert into postulat (cv,motivation,personne_id,offre_id)
    values(:cv,:lm,:id,:offre_id)");
    $apply->bindParam('cv',$cv);
    $apply->bindParam('lm',$lm);
    $apply->bindParam('id',$_SESSION["person_id"]);
    $apply->bindParam('offre_id',$offre_id);
    $apply->execute();
    $table_data = "votre candidature est bien recu!";
} else if ($type == 12){
    $offer_id = $_POST['data_id'];
    $add_to_wishlist = $pdo->prepare("insert into wishlist (offre_id,personne_id)
    values(:offre_id,:personne_id);");
    $add_to_wishlist->bindParam('offre_id',$offer_id);
    $add_to_wishlist->bindParam('personne_id',$_SESSION["person_id"]);
    $add_to_wishlist->execute();
    // recuperer les données et les stocker dans des variables
    $data_for_id = define_sub_array($data, $offer_id);
    $locations = array();
    $companies = array();

    $cpt = 0;
    foreach ($data as $row) {
        foreach ($row as $key => $value) {
            $$key = $value;
        }
        // ============================================================= !!!!!!!!!!!!!!!!!!!
        $select_location = $pdo->prepare("select adresse_localite from localite where id = :localite_id");
        $select_location->bindParam('localite_id', $localite_id);
        $select_location->execute();
        $locations[] = $select_location->fetchAll(PDO::FETCH_ASSOC);
        $locations[$cpt] = $locations[$cpt][0];

        $select_entreprise = $pdo->prepare("select nom from entreprise where id = :entreprise_id");
        $select_entreprise->bindParam('entreprise_id', $entreprise_id);
        $select_entreprise->execute();
        $companies[] = $select_entreprise->fetchAll(PDO::FETCH_ASSOC);
        $companies[$cpt] = $companies[$cpt][0];

        $cpt += 1;
        // ============================================================= !!!!!!!!!!!!!!!!!!!!!!!!!
    }
    $smarty->assign('locations', $locations);
    $smarty->assign('companies', $companies);
    $smarty->assign('data', $data_for_id);
    $smarty->assign('apply_state', 0);

    echo "rajouté l'offre au wishlist avec succés!";    
    $table_data = $smarty->fetch('select_offers_home.tpl');
} else if ($type == 13){
    $offer_id = $_POST['data_id'];
    $add_to_wishlist = $pdo->prepare("delete from wishlist where offre_id = :offre_id and personne_id = :personne_id;");
    $add_to_wishlist->bindParam('offre_id',$offer_id);
    $add_to_wishlist->bindParam('personne_id',$_SESSION["person_id"]);
    $add_to_wishlist->execute();
    // recuperer les données et les stocker dans des variables
    $data_for_id = define_sub_array($data, $offer_id);
    $locations = array();
    $companies = array();

    $cpt = 0;
    foreach ($data as $row) {
        foreach ($row as $key => $value) {
            $$key = $value;
        }
        // ============================================================= !!!!!!!!!!!!!!!!!!!
        $select_location = $pdo->prepare("select adresse_localite from localite where id = :localite_id");
        $select_location->bindParam('localite_id', $localite_id);
        $select_location->execute();
        $locations[] = $select_location->fetchAll(PDO::FETCH_ASSOC);
        $locations[$cpt] = $locations[$cpt][0];

        $select_entreprise = $pdo->prepare("select nom from entreprise where id = :entreprise_id");
        $select_entreprise->bindParam('entreprise_id', $entreprise_id);
        $select_entreprise->execute();
        $companies[] = $select_entreprise->fetchAll(PDO::FETCH_ASSOC);
        $companies[$cpt] = $companies[$cpt][0];

        $cpt += 1;
        // ============================================================= !!!!!!!!!!!!!!!!!!!!!!!!!
    }
    $smarty->assign('locations', $locations);
    $smarty->assign('companies', $companies);
    $smarty->assign('data', $data_for_id);
    $smarty->assign('apply_state', 0);

    echo "supprimé l'offre du wishlist avec succés!";    
    $table_data = $smarty->fetch('select_offers_home.tpl');
}
echo $table_data;
