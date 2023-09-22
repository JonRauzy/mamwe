<?php
$title = "Section";
include_once "../view/include/header.php";
// var_dump($_POST);
?>

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
                        <h4><?= $uploadResponse[0] ?></h4>
                    <?php else: ?>
                        <h4><?= $uploadResponse ?></h4>
                    <?php endif; ?>
            <?php endif; ?>
        </div>
        <table class="crud-table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Visible</th>
                <th>Photo</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>    
            <?php foreach($allSection as $section): ?>
                <tr>
                    <td><?= $section->getMwTitleSect(); ?></td>
                    <td><?= $section->getMwContentSect(); ?></td>
                    <td><?= $section->getMwVisibleSect() ?></td>
                    <td><?= $section->getPicture() ?></td>
                    <td>
                        <button>
                            <a href="?p=section-update&section-update=<?= $section-> getMwIdSect() ?>">Update</a>
                        </button>
                    </td>
                    <td>
                        <button>
                            <a onclick="void(0);let a=confirm('Voulez-vous vraiment supprimer \'<?= $section->getMwTitleSect() ?>\' ?'); if(a){ document.location = '?p=section&section-delete=<?= $section->getMwIdSect() ?>'; };" href="#">delete</a>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="crud-form">
        <h4>Upload Photo : </h4>
        <form class="pic-form"action="" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <button type="submit" name="submitPic">Upload image</button>
        </form>
        
        <hr class="separate-pic-form">


        <h4>Ajout de section : </h4>
        <form class="general-form" action="" method="POST">
            <!-- y'a le #mytextarea pour relier à l'éditeur de text -->
            <label for="section-insert-title">Nom : </label>
            <input name="section-insert-title" id="section-insert-title" ></input><br>

            <label for="section-insert-content">Description : </label>
            <textarea name="section-insert-content" id="mytextarea"></textarea><br>

            <label for="section-insert-visible">Visibilité :</label>
            <select id="section-insert-visible" name="section-insert-visible">
                <option value="1">Visible</option>
                <option value="0">Non-visible</option>
            </select><br>
        
            <h4>Photo : </h4>
        
            <div class="photo-form">
                <label for="section-insert-pic-title">Titre de la photo : </label>
                <input type="text" name="section-insert-pic-title"><br>
            
                <label for="info-insert-pic-url">URL de la photo : </label>
            <?php if(isset($picUrl)) :?>
                <input type="text" name="section-insert-pic-url" value="<?= $picUrl ?>"><br>
            <?php else : ?>
                <input type="text" name="section-insert-pic-url"><br>
            <?php endif; ?>
            </div>
                
            <button>Enregistrer</button>
        </form>
    </div>
</div>



<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";