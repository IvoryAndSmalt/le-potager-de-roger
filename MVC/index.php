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

switch($id){

    case "":
    header('Location: '.$baseURL.'/home');
    break;

    case "home":
        include "controllers/userController.php";
        getHome($twig,$PDO);
    break;

    case "mentions" :
    break;

    case "inscription" :
    break;

    case "utilisateur":
    break;

    case "propos":
    break;


    default :
       header('Location: '.$baseURL.'/home');
    exit;       
}