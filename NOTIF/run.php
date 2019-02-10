<?php
include 'vendor/autoload.php';
include 'conf.php';

try {
    $req = 'mysql:dbname='.$conf['db']['name'].';host='.$conf['db']['host'].';';
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".$conf['db']['charset']
    ];

    $PDO = new PDO ($req,$conf['db']['login'],$conf['db']['passwd'], $options);
} catch (PDOException $e) {
    print('Database connection error : '.$e);
}

try {
    $mongo = new MongoDB\Client('mongodb://' . $conf['mongo']['host'] . '/');
} catch (Exception $e) {
    print('Mongo connection error : '.$e);
}

include 'syncusers.php';
die();
$qry = 'SELECT id_offre, commentaire, date_creation, nom, prenom, latitude, longitude FROM offres, users WHERE notif_fait = 0 AND offres.id_user = users.id_user';
$st = $PDO->prepare($qry);
$st->execute();

while($row = $st->fetch()) {
    var_dump($row);
}