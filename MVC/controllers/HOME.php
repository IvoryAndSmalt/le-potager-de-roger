<?php

function getHome(){
    require_once 'vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);


try{
    $pdo = new PDO('mysql:host=localhost;dbname=yakwa;charset=utf8', 'root', '');
}
catch(Exception $e){
die('Erreur : '.$e->getMessage());
}

$allMovies = $pdo->query("SELECT * FROM films")->fetchAll();
    if(isset($_SESSION['user_name'])){
        echo $twig->render('accueil.html.twig', ['films' => $allMovies,'user' => $_SESSION['user_name']]);
    }else{
        echo $twig->render('accueil.html.twig', ['films' => $allMovies]);
    }
}
