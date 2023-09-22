<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Mise à jour section";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

// var_dump($agendaById, $pictureByAgendaId);
?>

<!-- HTML -->

<!-- nav bar de l'admin -->
<?php include_once '../view/include/privateNav.php'; ?>



<div class="container-crud">
    <h3><?= $title ?></h3>

    <div class="response">
        <?php if(isset($response)) : ?>
            <p><?= $response ?></p>
        <?php endif; ?>
        
        <?php if(isset($uploadResponse)) : 
                if(is_array($uploadResponse)) :     
                    $picUrl = $uploadResponse[1] ?>
                    <p><?= $uploadResponse[0] ?></p>
                <?php else: ?>
                    <p><?= $uploadResponse ?></p>
                <?php endif; ?>
        <?php endif; ?>
    </div>
    
    <div class="crud-form">
        <h4>Upload Photo : </h4>
        <form class="pic-form" action="" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <button type="submit" name="submitPic">Upload image</button>
        </form>
        
        <hr class="separate-pic-form">

        <h4>Mise à jour d'un évenement : </h4>
        <form class="general-form" action="" method="POST">
            <label for="mw_update_title_section">Title:</label><br>
            <input type="text" id="mw_update_title_section" name="mw_update_title_section" value="<?= $sectionById -> getMwTitleSect() ?>"><br>
           
            <label for="mw_update_content_section">Contenu:</label><br>
            <textarea name="mw_update_content_section" id="mytextarea">
                <?= $sectionById->getMwContentSect() ?>
            </textarea><br>

            <label for="mw_update_visible_section">Visible:</label><br>
            <select id="mw_update_visible_section" name="mw_update_visible_section" value="<?= $sectionById->getMwVisibleSect() ?>">
                <option value="1">Visible</option>
                <option value="0">Non-visible</option>
            </select><br>
        
            <h4>Photo : </h4>
            <label for="mw_update_title_pic">Photo titre:</label><br>
            <input type="text" id="mw_update_title_pic" name="mw_update_title_pic" value="<?= $pictureBySectionId -> getMwTitlePicture() ?>"><br>
        
        
            <label for="mw_update_url_pic">URL de la photo : </label>
        <?php if(isset($picUrl)) :?>
            <input type="text" id="mw_update_url_pic" name="mw_update_url_pic" value="<?= $picUrl ?>"><br>
        <?php else : ?>
            <input type="text" id="mw_update_url_pic" name="mw_update_url_pic" value="<?= $pictureBySectionId-> getMwUrlPicture() ?>"><br>
        <?php endif; ?>
        <button>Enregistrer</button>    
        </form> 
    </div>
</div>



<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";
