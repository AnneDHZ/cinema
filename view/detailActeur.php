<?php
ob_start();

?>

    
<h1 class="name"><?= $acteur["nom"] ." ". $acteur["prenom"]?></h1>
<div class="cardActeur">
    <img src="<?= $acteur["photo"]?>" alt="photo acteur" class="imgPersonne">
    <aside class="description">
        <p class="dateNaissance"><?= $acteur["dateNaissance"]?></p>
        <p class="bio"> <?= $acteur["bio"]?>
        </p>
    </aside>
</div>

<div class="cardFilmo">
    <h2>Filmographie</h2>
    <div class="cardfilm">
        <div class="img">
            <?php
            foreach ($filmos as $filmo) {
            ?>    
                <img src="<?= $filmo["affiche"]?>" alt="photo du film" class="imgFilm">
        </div>
        <div class="description">
            <p class="title"><?= $filmo["titre"]?></p>
            <p class="nomPersonnage"><?= $filmo["nomPersonnage"]?></p>
            <?php
            }
            ?>
        </div>
    </div>
</div>

     

<?php
$titrePage = "Acteur";
$content = ob_get_clean();
require"view/template.php";
?>