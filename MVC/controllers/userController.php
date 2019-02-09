<?php

function getHome($twig,$pdo){
        $users = $pdo->query("SELECT users.latitude, users.longitude FROM users")->fetchAll();
        echo $twig->render('base.html.twig', ['users' => $users, 'test' => "bonjour"]);
}

/****************/

?>