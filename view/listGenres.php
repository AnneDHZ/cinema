<?php
ob_start();

?>

<div class="cards">
<?php
$currentGenre = null;  

foreach ($films as $film) {
    if ($film['id_genre'] !== $currentGenre) {
        $currentGenre = $film['id_genre'];
        echo "<h2>" . $film["nomGenre"] . "</h2>";
    }
?>
    <div class="card">
        <!-- <div class="img"> -->
            <img src="<?= $film["affiche"] ?>" class="imgFilm" alt="affiche film">
        <!-- </div> -->
        <div class="description">
            <p><a href="index.php?action=listGenre&id=<?= $film["id_film"] ?>"><?= htmlspecialchars($film["titre"]) ?></a></p>
            <p><?= $film["anneeSortie"] ?></p>
            <p><?= $film["synopsis"] ?></p>
            <p><?= $film["note"] ?></p>
        </div>
    </div>
<?php
}
?>
    
<?php
$titrePage = "Liste par genres";
$content = ob_get_clean();
require"view/template.php";
?>