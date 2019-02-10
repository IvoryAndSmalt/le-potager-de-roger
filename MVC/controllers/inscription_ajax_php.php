<?php

  /*
    FORM controler by BOILLEY Adrien
  */

  ini_set('display_errors','1');
  include '../models/database.php';
  $errortable=[
    'error'=>[
      'address' => '',
      'nom' => '',
      'prenom' => '',
      'email' => '',
      'password' => '',
    ],
    'success'=>'',
  ];

  echo '<pre>'.print_r($_POST,1).'</pre>';

  if(
    isset($_POST)
    && !empty($_POST)
  ){

    if(
      isset($_POST['prenom']) && empty($_POST['prenom']) &&
      !preg_match('#^([a-z0-9._-]+ ?)+#i',$_POST['prenom'])
    ){
      $errortable['error']['prenom'] = 'Absent ou mal formaté.';
      $error=true;
    }

    if(
      isset($_POST['nom']) && empty($_POST['nom']) &&
      !preg_match('#^([a-z0-9._-]+ ?)+#i',$_POST['nom'])
    ){
      $errortable['error']['nom'] = 'Absent ou mal formaté.';
      $error=true;
    }

    if(
      isset($_POST['email']) && empty($_POST['email']) &&
      !preg_match('#^[a-z0-9._-]+@[a-z0-9_-]+\.[a-z0-9_-]+#i',$_POST['email'])
    ){
      $errortable['error']['email'] = 'Absent ou mal formaté.';
      $error=true;
    }
    if(
      !isset($_POST['password']) || empty($_POST['password']) ||
      (strlen($_POST['password']) < 8)
    ){
      $errortable['error']['password'] = 'Absent ou pas assez long (8 charactères min.)';
      $error=true;
    }

    if(
      isset($_POST['address']) && empty($_POST['address'])
    ){
      $errortable['error']['address'] = 'Vueillez renseigner une addresse';
      $error=true;
    }


    if(!isset($error)){


      // $req = 'INSERT INTO users
      //         (email, password, nom, prenom, adresse, statut, latitude, longitude)
      //         VALUES (?,?,?,?,?,?,?,?);
      // ';
      // $stat = $PDO->prepare($req);
      // $stat->execute(array(
      //   $_POST['email'],
      //   crypt($_POST['password'],md5($_POST['email'])),
      //   $_POST['nom'],
      //   $_POST['prenom'],
      //   $_POST['address'],
      //   '',
      //   0,
      //   0
      // ));
      $req = 'INSERT INTO users
              (email, password, nom, prenom, adresse, latitude, longitude)
              VALUES (?,?,?,?,?,?,?);
      ';
      $stat = $PDO->prepare($req);
      $stat->execute(array(
        $_POST['email'],
        crypt($_POST['password'],md5($_POST['email'])),
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['address'],
        0.0,
        0.0
      ));




      if(
        ($sqlerror=$stat->errorInfo())
        && !empty($sqlerror)
      ){
        // error_log($sqlerror);
        //  Je sais, c'est pas propre : mais c'est le temps de debbug
        var_dump($sqlerror);
        // $errortable['success'] = 'Erreur SQL : '.$sqlerror."\n<br>";
      }
      else{
        $errortable['success'] = 'Vous avez été bien enregistré.';
      }
    }
  }

  // echo json_encode($errortable);


 ?>
