<?php

function getHome($twig,$pdo){
        $users = $pdo->query("SELECT users.latitude, users.longitude, users.prenom FROM users")->fetchAll();
        echo $twig->render('base.html.twig', ['users' => $users, 'test' => "bonjour"]);
}

function getMentions($twig,$pdo){
        echo $twig->render('mentions.html.twig', []);
}

function getInscription($twig,$pdo){
        echo $twig->render('inscription.html.twig', []);
}

function getUtilisateur($twig,$pdo){
        echo $twig->render('utilisateur.html.twig', []);
}

function getPropos($twig,$pdo){
        echo $twig->render('propos.html.twig', []);
}