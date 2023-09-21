<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = $sectionById-> getMwTitleSect();

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->
<main>
<figure class="circle"></figure>

<?php

foreach ($articleBySection as $abs):  ?>

<div>
    <h2 class="sous-titre"><?= $abs -> getmwTitleArt();?></h2><br>
    <div class="text-section">
        <?= $abs -> getmwContentArt();?>
    </div>
    <div class="picture1">
    
   <?php
   
$picture = $abs->getPicture();

    if ($picture !== null) {
        $pic = explode("|||", $picture);

        if (isset($pic[1])) {
            $img1 = explode('---', $pic[1]);
            echo '<img src="' . $img1[0] . '" alt="1" width="300px" ><br>';
        }

        if (isset($pic[2])) {
            $img2 = explode('---', $pic[2]);
            echo '<img src="' . $img2[0] . '" alt="2" width="300px"  ><br>';
        }

        if (isset($pic[3])) {
            $img3 = explode('---', $pic[3]);
            echo '<img src="' . $img3[0] . '" alt="3" width="300px"  ><br>';
        } 
    } else {
        echo 'Aucune image disponible<br>';
    }
    ?>
    </div>

    
    <div class="article-date">
        <p>Mis à jour le :</p>
        <p><?= date('d/m/Y', strtotime($abs -> getmwDateArt())); ?></p>
    </div>
    

</div>

<?php endforeach ?>

</main>
<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";


