<?php
$qry = 'SELECT * FROM users WHERE estdansdbgeo = 0';
$st = $PDO->prepare($qry);
$st->execute();

$coll = $mongo->roger->users;
var_dump(iterator_to_array($coll->listIndexes()));
$o = $coll->createIndex(['position' => '2d']);
while($row = $st->fetch()) {
    $user = [
        'nom' => $row['prenom'] . ' ' . $row['nom'],
        'userid' => (int)$row['user_id'],
        'position' => [
            (float)$row['longitude'], (float)$row['latitude']
        ],
    ];
    $coll->insertOne($user);
}