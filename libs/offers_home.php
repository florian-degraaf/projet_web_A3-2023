<?php
session_start();

require_once 'libs/Smarty.class.php';

$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
$smarty->setCacheDir('cache/');
$smarty->setConfigDir('configs/');

// recuperer role et id de la personne connecté
$role = $_SESSION["role"];
$smarty->assign('person_id',$_SESSION["person_id"]);
$smarty->assign('role',$role);


// afficher la bonne page selon le role 
$smarty->display('offers_home.tpl');
