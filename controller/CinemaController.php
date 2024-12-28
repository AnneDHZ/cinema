<?php

namespace Controller;
use Model\Connect;

class CinemaController {



//* controller listFilms
//* controller listeActeurs
//* controller detailFilm
//* controller detailActeur
//* controller classementNote

    // liste des films
    public function listFilms() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT f.id_film, f.titre, f.anneeSortie, f.note, f.synopsis, f.affiche, GROUP_CONCAT(g.nomGenre SEPARATOR ' / ') AS genres
            FROM film f
            INNER JOIN associer ass
            ON f.id_film = ass.id_film
            INNER JOIN genre g
            ON ass.id_genre = g.id_genre
            GROUP BY f.id_film
        ");

        $films = $requete->fetchAll();

        require "view/listFilms.php";
    }
    
       
    // liste des acteurs
    public function listActeurs() {
        $pdo = Connect::seConnecter();
        $requete =$pdo->query("
        SELECT  pe.id_personne, pe.nom, pe.prenom, pe.dateNaissance, pe.bio, pe.photo
        FROM personne pe
        ");
        
        $acteurs = $requete->fetchAll();
        require "view/listActeurs.php";
    }


    // détail film
    public function detailFilm($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT f.titre, f.anneeSortie, f.synopsis, f.affiche, f.duree, f.note, CONCAT(pe.nom,' ',pe.prenom) AS realisateurFull, pe.dateNaissance, pe.bio, pe.photo AS photoRealisateur, f.id_realisateur
            FROM film f
            INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
            INNER JOIN personne pe ON r.id_personne = pe.id_personne
            WHERE f.id_film = :id
        ");

        $requete->execute(["id" => $id]);
        $film = $requete->fetch();
        
        $requeteGenres = $pdo->prepare("
            SELECT GROUP_CONCAT(nomGenre SEPARATOR ', ') AS genres
            FROM genre g
            INNER JOIN associer ass 
            ON g.id_genre = ass.id_genre
            WHERE ass.id_film = :id
            ");
            
        $requeteGenres->execute(["id" => $id]);
        $genres = $requeteGenres->fetch();
        
        $requeteCasting = $pdo->prepare("
           SELECT a.id_acteur, CONCAT(pe.nom,' ',pe.prenom) AS acteurFilm, pe.photo, pa.nomPersonnage, f.titre
            FROM personne pe
            INNER JOIN acteur a
            ON pe.id_personne = a.id_personne
            INNER JOIN casting c
            ON a.id_acteur = c.id_acteur
            INNER JOIN film f
            ON c.id_film = f.id_film
            INNER JOIN personnage pa
            ON c.id_personnage = pa.id_personnage
            WHERE f.id_film = :id
        ");

        $requeteCasting->execute(["id" => $id]);
        $castings = $requeteCasting->fetchAll();
                
        require "view/detailFilm.php";
        }
        
    // détail acteur
    public function detailActeur($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT  pe.id_personne, pe.nom, pe.prenom, pe.dateNaissance, pe.bio, pe.photo
            FROM personne pe
            WHERE pe.id_personne = :id
        ");

        $requete->execute(["id" => $id]);
        $acteur = $requete->fetch();
        
        $requeteFilmos = $pdo->prepare("
            SELECT f.titre, f.affiche, pa.nomPersonnage
            FROM film f
            INNER JOIN casting c
            ON f.id_film = c.id_film
            INNER JOIN personnage pa
            ON c.id_personnage = pa.id_personnage
            WHERE c.id_acteur = :id
        ");
            
        $requeteFilmos->execute(["id" => $id]);
        $filmos = $requeteFilmos->fetchAll();
                
        require "view/detailActeur.php";
        }
        
        //classement par note
        public function listNotes() {
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("
                SELECT f.id_film, f.titre, f.anneeSortie, f.note, f.synopsis, f.affiche, GROUP_CONCAT(g.nomGenre SEPARATOR ' / ') AS genres
                FROM film f
                INNER JOIN associer ass
                ON f.id_film = ass.id_film
                INNER JOIN genre g
                ON ass.id_genre = g.id_genre
                GROUP BY f.id_film
                ORDER BY f.note DESC
            ");
    
            $films = $requete->fetchAll();
    
            require "view/listNotes.php";
        }
        
        //classement par genres
        public function listGenres() {
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("
                SELECT f.id_film, f.titre, f.anneeSortie, f.note, f.synopsis, f.affiche, g.nomGenre, g.id_genre
                FROM film f
                INNER JOIN associer ass
                ON f.id_film = ass.id_film
                INNER JOIN genre g
                ON ass.id_genre = g.id_genre
                ORDER BY g.id_genre, f.titre
            ");
    
            $films = $requete->fetchAll();
    
            require "view/listGenres.php";
        }
        
        //page accueil
        public function accueil() {
            $pdo = Connect::seConnecter();
            
            $requeteNouveautes = $pdo->query("
            SELECT f.id_film, f.titre, f.anneeSortie, f.note, f.synopsis, f.affiche, GROUP_CONCAT(g.nomGenre SEPARATOR ' / ') AS genres
            FROM film f
            INNER JOIN associer ass
            ON f.id_film = ass.id_film
            INNER JOIN genre g
            ON ass.id_genre = g.id_genre
            GROUP BY f.id_film
            ORDER BY f.anneeSortie DESC;
        ");

            $nouveautes = $requeteNouveautes->fetchAll();

            $requeteParGenres = $pdo->query("
                SELECT f.id_film, f.titre, f.anneeSortie, f.note, f.synopsis, f.affiche, g.nomGenre, g.id_genre
                FROM film f
                INNER JOIN associer ass
                ON f.id_film = ass.id_film
                INNER JOIN genre g
                ON ass.id_genre = g.id_genre
                ORDER BY g.id_genre, f.titre
            ");
    
            $parGenres = $requeteParGenres->fetchAll();

            $requeteParNotes = $pdo->query("
                SELECT f.id_film, f.titre, f.anneeSortie, f.note, f.synopsis, f.affiche, GROUP_CONCAT(g.nomGenre SEPARATOR ' / ') AS genres
                FROM film f
                INNER JOIN associer ass
                ON f.id_film = ass.id_film
                INNER JOIN genre g
                ON ass.id_genre = g.id_genre
                GROUP BY f.id_film
                ORDER BY f.note DESC
            ");
    
            $parNotes = $requeteParNotes->fetchAll();
    
    
            require "view/accueil.php";
        
    }
    
}    
    ?>


