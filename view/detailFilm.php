<?php
ob_start();

?>

    
<h1 class="name"><?= $film["titre"]?></h1>
<div class="cardFilm">
    <img src="<?= $film["affiche"]?>" alt="photo film" class="imgFilm">
    <aside class="description">      
        <p class="nomGenre"><?= $genres["genres"]?></p>   
        <p class="dateSortie"><?= $film["anneeSortie"]?></p>
        <p class="synopsis"> <?= $film["synopsis"]?></p>
        <p class="note"> <?= $film["note"]?></p>
    </aside>
</div>

<h1 class="name">Réalisateur :</h1>
<div class="cardRealisateur">
    <div class="img">
        <img src="<?= $film["photoRealisateur"] ?>" alt="photo realisateur" class="imgPersonne">
    </div>
    <div class="description">
        <p><a href="index.php?action=detailActeur&id=<?=$film["id_realisateur"] ?>"><?= $film["realisateurFull"] ?></a></p>
    </div>
</div>

<h1>Casting :</h1>
<?php
    foreach ($castings as $casting) { 
?>
<div class="cardCasting">
    <div class="img">
        <img src="<?= $casting["photo"] ?>" class="imgPersonne" alt="photo acteur">
    </div>
    <div class="description">        
        <p><a href="index.php?action=detailActeur&id=<?=$casting["id_acteur"] ?>"><?= $casting["acteurFilm"] ?></a></p>
        <p><?= $casting["nomPersonnage"] ?></p>
    </div>
<?php 
}
?>
</div>


     

<?php
$titrePage = "Film";
$content = ob_get_clean();
require"view/template.php";
?>



