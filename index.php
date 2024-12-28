<?php

use Controller\CinemaController;

spl_autoload_register(function ($class_name){
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])){
    switch ($_GET["action"]) {

        case "listFilms" : $ctrlCinema->listFilms(); 
        break;
        case "listActeurs" : $ctrlCinema->listActeurs();
        break;
        case "detailFilm" : $ctrlCinema->detailFilm($id);
        break;
        case "detailActeur" : $ctrlCinema->detailActeur($id);
        break;
        case "listNotes" : $ctrlCinema->listNotes();
        break;
        case "listGenres" : $ctrlCinema->listGenres();
        break;
        case "accueil" : $ctrlCinema->accueil();
        break;
    }
}


?>