<?php

function getFilm($twig,$Film_id,$pdo){


    $Request = $pdo->query("SELECT * FROM films WHERE films.id = $Film_id" )->fetch();
   $Actors = $pdo->query("SELECT acteurs.nom  FROM acteurs,films_acteurs WHERE films_acteurs.ID_Film = $Film_id AND acteurs.id=films_acteurs.ID_Acteur")->fetchAll();
   $Real = $pdo->query("SELECT realisateurs.nom  FROM realisateurs,films_realisateurs WHERE films_realisateurs.ID_Film = $Film_id AND realisateurs.id=films_realisateurs.ID_Realisateur")->fetchAll();
   $Genre = $pdo->query("SELECT genres.nom  FROM genres,films_genres WHERE films_genres.ID_Film = $Film_id AND genres.id=films_genres.ID_Genre")->fetchAll();
   $GenreSuggestion = $pdo->query("SELECT genres.nom  FROM genres,films_genres WHERE films_genres.ID_Film = $Film_id AND genres.id=films_genres.ID_Genre")->fetch();
   $Trailer = $pdo->query("SELECT trailer.chemin  FROM trailer WHERE trailer.id = $Film_id")->fetch();
   $Suggestion = $pdo->query("SELECT films.titre, films.id, genres.nom  FROM films, genres,films_genres WHERE films_genres.ID_Film = Films.id AND genres.id=films_genres.ID_Genre AND genres.nom = '$GenreSuggestion[0]' AND films.id != $Film_id" )->fetchAll();
   shuffle($Suggestion);

    if(isset($_SESSION['user_name'])){   
        echo $twig->render('movie.html.twig', [
        'film' => $Request,
        'actors' => $Actors,
        'reals' => $Real,
        'genres' => $Genre,
        'trailer' => $Trailer,
        'suggestions' => $Suggestion,
        'user' => $_SESSION['user_name']]);
    }else{
        echo $twig->render('movie.html.twig', [
        'film' => $Request,
        'actors' => $Actors,
        'reals' => $Real,
        'genres' => $Genre,
        'trailer' => $Trailer,
        'suggestions' => $Suggestion
        ]);
    }

}

function getFilms($twig,$pdo){

    if(isset($_SESSION['user_name'])){
        $allMovies = $pdo->query("SELECT * FROM films")->fetchAll();
        echo $twig->render('movies.html.twig', ['films' => $allMovies,'user' => $_SESSION['user_name']]);
    }else{
        $allMovies = $pdo->query("SELECT * FROM films")->fetchAll();
        echo $twig->render('movies.html.twig', ['films' => $allMovies]);
    }
}

/******************************************************************************/

    function registerMovie($twig){

        if(isset($_SESSION['user_name'])){
            echo $twig->render('addMovie.html.twig',['user' => $_SESSION['user_name']]);
        }else{
            echo $twig->render('inscription.html.twig');
        }

    }
/*****************************************************************************/
    function insertMovieIntoDatabase($movie,$actors,$twig,$pdo){

        // 1. insertion du film dans la base ("",titre,annee,synopsis)
        $Request = $pdo->query("INSERT INTO films VALUES ('','$movie[titre]','$movie[annee]','$movie[synopsis]')");
        

        // 2. insetion des acteurs SI il(s) n'éxistent pas dans la base
            for($i=0;$i<3;$i++){

                $acteur_data = $pdo->query("SELECT nom 
                FROM acteurs 
                WHERE nom = '$actors[$i]'")->fetch();

                if($acteur_data == NULL){
                    $Request = $pdo->query("INSERT INTO acteurs VALUES ('','$actors[$i]')");
                }
            }

        // 3. insertion du réalisateur SI il n'éxiste pas dans la base
            $realisator_data = $pdo->query("SELECT nom 
            FROM realisateurs 
            WHERE nom = '$movie[realisateurs]'")->fetch();

            if($realisator_data == NULL){
                $Request = $pdo->query("INSERT INTO realisateurs VALUES ('','$movie[realisateurs]')");
            }

        // 4. insertion du genre
            $genre_data = $pdo->query("SELECT nom 
            FROM genres 
            WHERE nom = '$movie[genre]'")->fetch();

            if($genre_data == NULL){
                $Request = $pdo->query("INSERT INTO genres VALUES ('','$movie[genre]')");
            }

        // 5. Faire les associations dans les tables intérmédiaires

            //5.1 Lier les acteurs au film dans la table intermediaire

                // -> recup des id des acteurs et du film
                    $movie_id = $pdo->query("SELECT id 
                    FROM films 
                    WHERE titre = '$movie[titre]'")->fetch();

                    for($i=0;$i<3;$i++){

                        $actor_id = $pdo->query("SELECT id 
                        FROM acteurs 
                        WHERE nom = '$actors[$i]'")->fetch();

                        $Request = $pdo->query("INSERT INTO films_acteurs VALUES ('$movie_id[0]','$actor_id[0]')");

                    }

            //4.2 Lier le realisateur au film

                // -> recup de l'id du real et du film (en faire une variable au dessus on la réutilise)
                $realisator_id = $pdo->query("SELECT id 
                FROM realisateurs 
                WHERE nom = '$movie[realisateurs]'")->fetch();

                // -> insertion dans la table intermediaire
                $Request = $pdo->query("INSERT INTO films_realisateurs VALUES ('$movie_id[0]','$realisator_id[0]')");


            //4.3 Lier le genre au film

                // -> mêmes traitements que pour le réalisateur mais pour le genre
                $genre_id = $pdo->query("SELECT id 
                FROM genres 
                WHERE nom = '$movie[genre]'")->fetch();

                // -> insertion dans la table intermediaire
                $Request = $pdo->query("INSERT INTO films_genres VALUES ('$movie_id[0]','$genre_id[0]')");
            
            //4.4 Lier l'utilisateur au film

                // mêmes traitements que pour le realisateur et le genre mais pour l'user
                $user_id = $pdo->query("SELECT id 
                FROM users 
                WHERE login = '$_SESSION[user_name]'")->fetch();

                // -> insertion dans la table intermediaire
                $Request = $pdo->query("INSERT INTO films_users VALUES ('$movie_id[0]','$user_id[0]')");

        //5. Faire le render Twig, prévoir un message de confirmation de l'ajout du film
            
        echo $twig->render('accueil.html.twig',['user' => $_SESSION['user_name']]);
    }

    /****************************************************/

function addMovie($twig,$pdo){

    $acteur = $_POST['acteurs'];
    $error_state=true;

    // Si l'acteur existe //
    $acteur_data = $pdo->query("SELECT nom 
    FROM acteurs 
    WHERE nom = '$acteur'")->fetch();
    //var_dump($acteur_data);

    $movie_title = $_POST['titre'];
    $movie = $pdo->query("SELECT titre 
    FROM films 
    WHERE titre = '$movie_title'")->fetch();


    if($movie == NULL){

        if (preg_match("#(?:(?:19|20)[0-9]{2})#", $_POST["annee"])){

            if (preg_match("#^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$#i", $_POST["genre"])) {
                
                if (preg_match("#^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$#i", $_POST["realisateurs"])){ 

                    if(preg_match("#^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)? [a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+\s?[,'\s]\s?[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)? [a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+\s?[,'\s]\s?[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)? [a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+$#i", $acteur) ){

                        if($_POST['synopsis']!=NULL){

                            // insertMovieIntoDatabase($realisator,$actors,$movie,$user,$genre)
                            $actors_list = preg_split('/,+/', $_POST['acteurs']);

                            insertMovieIntoDatabase($_POST,$actors_list,$twig,$pdo);
                            //var_dump($actors_list);
                            //$Request = $pdo->query("INSERT INTO acteurs VALUES ('','$acteur')");
                            //echo $twig->render('addMovie.html.twig');
                        
                        }else{
                            
                            echo $twig->render('addMovie.html.twig', ['inputs' => $_POST,
                            'errorSynopsis' => "Saisie invalide du synopsis: veuillez éviter la saisie de caractères spéciaux",'user' => $_SESSION['user_name']]);
                        }
                
                    }else{
                        echo $twig->render('addMovie.html.twig', ['inputs' => $_POST,
                        'error' => "mauvaise saisie",'user' => $_SESSION['user_name']]);
                    }


                }else{
                    //$error_realisateur=false;
                    echo $twig->render('addMovie.html.twig', ['inputs' => $_POST,
                    'errorRealisateursMessage' => "Saisie invalide: veuillez éviter la saisie de caractères spéciaux",'user' => $_SESSION['user_name']]);
                }

            }else{
                
                //$error_genre = false;
                echo $twig->render('addMovie.html.twig', ['inputs' => $_POST,
                'errorGenreMessage' => "Saisie invalide: veuillez éviter la saisie de caractères spéciaux",'user' => $_SESSION['user_name']]);
            }

        }else{
            echo $twig->render('addMovie.html.twig', ['inputs' => $_POST, 'errorAnnee' => "Saisie invalide: Veuillez saisir une année valide",'user' => $_SESSION['user_name']]);
        }
    }else{
        echo $twig->render('addMovie.html.twig', ['errorExist' => "Ce film éxiste déjà",'user' => $_SESSION['user_name']]);
    }

}



/**************************************************************************/

function searchMovie($twig){

    try{
        $pdo = new PDO('mysql:host=localhost;dbname=yakwa;charset=utf8', 'root', '');
        }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }

    $movie_id = $pdo->query("SELECT id 
                FROM films 
                WHERE titre = '$_POST[input]'")->fetch();
    if($movie_id != NULL){
        getfilm($twig,$movie_id[0]);
    }else{
        if(isset($_SESSION['user_name'])){
            echo $twig->render('empty.html.twig', ['input' => $_POST['input'],'user' => $_SESSION['user_name']]);
        }else{
            echo $twig->render('empty.html.twig', ['input' => $_POST['input']]);
        }
    }
}

/*******************************************************************************/

function randomMovie($twig){

    $movie=rand(1,25);
    getfilm($twig,$movie);
}
