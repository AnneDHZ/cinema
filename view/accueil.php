<?php
ob_start();
?>


<!-- genres -->
<h1>Genres</h1>

<div class="slider">
    <div class="sliderNav">
        <button onclick="previous()" class="sliderNavButton sliderNavButtonPrev">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm48-88a8,8,0,0,1-8,8H107.31l18.35,18.34a8,8,0,0,1-11.32,11.32l-32-32a8,8,0,0,1,0-11.32l32-32a8,8,0,0,1,11.32,11.32L107.31,120H168A8,8,0,0,1,176,128Z"></path>
            </svg>
        </button>
        <button onclick="next()" class="sliderNavButton sliderNavButtonNext">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm45.66-93.66a8,8,0,0,1,0,11.32l-32,32a8,8,0,0,1-11.32-11.32L148.69,136H88a8,8,0,0,1,0-16h60.69l-18.35-18.34a8,8,0,0,1,11.32-11.32Z"></path>
            </svg>
        </button>
    </div>
</div>

<div class="sliderContainer">
    <?php foreach ($parGenres as $parGenre): ?>
        <div class="sliderContainerItem">
            <img src="<?= $parGenre["affiche"] ?>" class="imgFilm" alt="affiche film">
            <h2><a href="index.php?action=detailFilm&id=<?=$parGenre["id_film"] ?>"><?= $parGenre["titre"] ?></a></h2>
            <p><?= $parGenre["anneeSortie"] ?></p>
            <p><?= $parGenre["nomGenre"] ?></p>
            <p><?= $parGenre["synopsis"] ?></p>
            <p><?= $parGenre["note"] ?></p>
        </div>
        <?php endforeach; ?>
</div>
        







<?php
$titrePage = "accueil";
$content = ob_get_clean();
require"view/template.php";
?>