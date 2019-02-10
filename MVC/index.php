<?php

$baseURL = $_SERVER['PHP_SELF'];
$baseExplode = explode('/', $baseURL);
$lastUri = array_pop($baseExplode);
$baseURL = implode('/',$baseExplode);

require("models/twig.php");
require("models/database.php");

$uri = $_SERVER['REQUEST_URI'];
$uriExplode = explode( "/" , $uri);
$id = array_pop($uriExplode);

session_start();

include "controllers/userController.php";
switch($id){

    case "":
        header('Location: '.$baseURL.'/home');
    break;

    case "home":
        getHome($twig,$PDO);
    break;

    case "mentions" :
        getMentions($twig,$PDO);
    break;

    case "inscription" :
        getInscription($twig,$PDO);
    break;

    case "utilisateur":
        getUtilisateur($twig,$PDO);
    break;

    case "propos":
        getPropos($twig,$PDO);
    break;


    default :
       header('Location: '.$baseURL.'/home');
    exit;
}