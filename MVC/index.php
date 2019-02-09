<?php

require("models/twig.php");
require("models/database.php");

$uri = $_SERVER['REQUEST_URI'];
$uriExplode = explode( "/" , $uri);
$id=$uriExplode[1];

session_start();

switch($id){

    case "":
    header('Location: /home');
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
        header('Location: /home');
    exit;       
}