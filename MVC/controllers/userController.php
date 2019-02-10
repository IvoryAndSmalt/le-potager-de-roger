<?php

function getHome($twig,$pdo){
        $users = $pdo->query("SELECT users.latitude, users.longitude, users.prenom, offres.commentaire FROM users, users_offres, offres WHERE users.id_user=users_offres.id_user AND users_offres.id_offre = offres.id_offre")->fetchAll();
        echo $twig->render('base.html.twig', ['users' => $users, 'test' => "bonjour"]);
}

/****************/

?>