<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./public/style.css">
    <title><?= $titrePage ?></title>
</head>

<body>
   <div id="container">

        <nav class="navBar">
            <div class="sup">
                <input type="search" name="" id="search" placeholder="Chercher un film, un acteur, un réalisateur">
                <a href="" class="search"><i class="fa-solid fa-magnifying-glass"></i></a>
            </div>
            <div class="inf">
                <a href="index.php?action=accueil"><img src="./public/img/logo.png" alt="logo retropro.be"></a>
                <ul>
                    <li>
                        <a href="index.php?action=listFilms">Films</a>
                    </li>
                    <li>
                        <a href="index.php?action=listActeurs">Acteurs</a>
                        
                    </li>
                    <li>
                        <a href="index.php?action=listNotes">Classement par note</a>
                    </li>
                    <li>
                        <a href="index.php?action=listGenres">Genres</a>
                    </li>
                </ul>
            </div>
        </nav>
<main>
<?= $content?>
</main>
        <footer>
            <address>
                Vous cherchez un film à voir ? Retropro.be a la joie de vous proposer quatre ou cinq films qui se battent en duels, de l’unique, du moyen qualitatif, mitigé cochon d’inde quoi. Téléchargement Gratuit. De toute façon, vu la diversité des films proposés vous ne pouvez pas cracher dessus. Si éventuellement vous êtes à la recherche d’un film vous pouvez aller voir sur d’autres plateforme de streaming. Bon visionnage à vous!
            </address>
            <small>
                Retropro.be mentions légales et bla bla bla
            </small>
        </footer>
    </div> 

<script src="./public/script.js"></script>
</body>
</html>