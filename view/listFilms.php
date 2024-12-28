<?php
ob_start();

?>

<div class="cards">
<?php
    foreach ($films as $film) { 
?>
    <div class="card">
        <!-- <div class="img"> -->
            <img src="<?= $film["affiche"] ?>" class="imgFilm" alt="affiche film">
        <!-- </div> -->
        <div class="description">
            <h2><a href="index.php?action=detailFilm&id=<?=$film["id_film"] ?>"><?= $film["titre"] ?></a></h2>
            <p><?= $film["anneeSortie"] ?></p>
            <p><?= $film["genres"] ?></p>
            <p><?= $film["synopsis"] ?></p>
        </div>
    </div>
<?php 
}
?>
</div>


<?php
$titrePage = "Liste des films";
$content = ob_get_clean();
require"view/template.php";
?>