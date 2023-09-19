<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Mise à jour des informations";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

// var_dump($infoById, $pictureByinfoId);
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
        <h4>Upload de nouvelles photo : </h4>
        <form class="pic-form" action="" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <button type="submit" name="submitPic">Upload image</button>
        </form>

        <hr class="separate-pic-form">

        <h4>Mise à jour de l'adresse : </h4>
        <form class="general-form" action="" method="POST">

        <label for="mw_update_name_info">Nom : </label>
        <input name="mw_update_name_info" id="mw_update_name_info" value="<?= $infoById->getMwNameInfo() ?>"></input><br>

        <label for="mw_update_adress_info">Adresse : </label><br>
        <textarea name="mw_update_adress_info" id="mytextarea" >
            <?= $infoById->getMwAdressInfo() ?>
        </textarea><br>
        
        <label for="mw_update_phone_info">Téléphone : </label>
        <input name="mw_update_phone_info" id="mw_update_phone_info" value="<?= $infoById->getMwPhoneInfo() ?>"></input><br>

        <label for="mw_update_mail_info">E-mail : </label>
        <input name="mw_update_mail_info" id="mw_update_mail_info" value="<?= $infoById->getMwMailInfo() ?>"></input><br>

        <?php if(isset($picture)) : ?>
            <h4>Photo : </h4>
            <label for="mw_update_title_pic">Photo titre:</label><br>
            <input type="text" id="mw_update_title_pic" name="mw_update_title_pic" value="<?= $pictures-> getMwTitlePicture() ?>"><br>

            <label for="mw_update_url_pic">URL de la photo : </label>
                <?php if(isset($picUrl)) :?>
            <input type="text" id="mw_update_url_pic" name="mw_update_url_pic" value="<?= $picUrl ?>"><br>
                <?php else : ?>
            <input type="text" id="mw_update_url_pic" name="mw_update_url_pic" value="<?= $pictures-> getMwUrlPicture() ?>"><br>
                <?php endif; ?>
        
        <?php else : ?>
                <h4>Nouvelles photo : </h4>
                    <label for="mw_insert_title_pic">Photo titre:</label><br>
                    <input type="text" id="mw_insert_title_pic" name="mw_insert_title_pic" placeholder="Entrez titre de la photo"><br>
        
                    <label for="mw_insert_url_pic">URL de la photo : </label>
                <?php if(isset($picUrl)) :?>
                    <input type="text" id="mw_insert_url_pic" name="mw_insert_url_pic" value="<?= $picUrl ?>"><br>
                <?php else : ?>
                    <input type="text" id="mw_insert_url_pic" name="mw_insert_url_pic" placeholder="Entrez l'Url de la photo"><br>
                <?php endif; ?>

        <?php endif; ?>
        
            <button type="submit">Enregistrer</button>    
        </form> 
    </div>
</div>


<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";
