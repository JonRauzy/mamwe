<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Agenda";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->
<main>
<figure class="circle"></figure>
    <h2 class="agenda-title"><?= $title ?></h2>
    <div class="agenda-container">

        <h4>Evenement à venir : </h4>
        <div class="card-container">
            <?php foreach($futurAgenda as $futur): ?>
            <div class="agenda-card">
                <h5><?= $futur-> getMwTitleAgenda() ?></h5>
                <img src="<?= $futur -> getPicture() ?>" alt="" width="300px">
                <p><?= $futur -> getMwContentAgenda() ?></p>
                <p class="agenda-date"><?= date('d/m/Y', strtotime($futur-> getMwDateAgenda())) ?></p>
            </div>
            <?php endforeach; ?>
        </div>


        <h4>Evenements passés : </h4>
        <div class="card-container">
            <?php foreach($pastAgenda as $past): ?>
            <div class="agenda-card">
                <h5><?= $past-> getMwTitleAgenda() ?></h5>
                <img src="<?= $past -> getPicture() ?>" alt="" width="300px">
                <p><?= $past -> getMwContentAgenda() ?></p>
                <p><?= date('d/m/Y', strtotime($past-> getMwDateAgenda())) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</main>
<?php
// FOOTER
include_once "../view/include/footer.php";