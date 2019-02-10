<?php

$DB = [
  'charset'=> 'utf8',
  'name'=> 'roger',
  'host'=> '192.168.2.91',
  'login'=> 'roger',
  'passwd'=> 'roger2019',
];

// Surcharge config BDD si fichier local présent
if(is_file(__DIR__ . '/database.local.php')) {
  include 'database.local.php';
}

// Surcharge config BDD si variables environnement présentes
if(getenv('DB_HOST')) {
  include 'database.env.php';
}





//  DATABASE Controler

// Init DB connect

try {

 // 118,150,156, MS:1433 MS:1434 mysql:3306 postgre:5432

 $req = 'mysql:dbname='.$DB['name'].';host='.$DB['host'].';';

 $options = [

   PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

   PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".$DB['charset']

 ];

$PDO = new PDO ($req,$DB['login'],$DB['passwd']/*,$options*/);

}

catch (PDOException $e){

 print('Database connection error : '.$e);

}



unset($DB);

?>