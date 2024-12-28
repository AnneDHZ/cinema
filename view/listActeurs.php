<?php
ob_start();

?>

<div class="cards">
<?php
    foreach ($acteurs as $acteur) { ?>
        <div class="card">
            <!-- <div class="img"> -->
                <img src="<?= $acteur["photo"] ?>" class="imgPersonne" alt="photo acteur">
            <!-- </div> -->
            <div class="description">
                <h2><a href="index.php?action=detailActeur&id=<?=$acteur["id_personne"] ?>"><?= $acteur["nom"] ." ". $acteur["prenom"] ?></a></h2>
                <p><?= $acteur["dateNaissance"] ?></p>
                <p><?= $acteur["bio"] ?></p>
            </div>
        </div>
    <?php }
?>
</div>


<?php
$titrePage = "Liste des acteurs";
$content = ob_get_clean();
require"view/template.php";
?>