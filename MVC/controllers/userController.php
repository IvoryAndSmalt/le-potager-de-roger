<?php

function getHome($twig,$pdo){
        $users = $pdo->query("SELECT users.latitude, users.longitude, users.prenom, offres.commentaire, offres.url_photo FROM users, users_offres, offres WHERE users.id_user=users_offres.id_user AND users_offres.id_offre = offres.id_offre")->fetchAll();
        echo $twig->render('home.html.twig', ['users' => $users, 'test' => "bonjour"]);
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