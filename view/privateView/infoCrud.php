<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Info";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";
// var_dump($allInfo);
?>

<!-- HTML -->

<!-- nav bar de l'admin -->
<?php include_once '../view/include/privateNav.php'; ?>


<div class="container-crud">
    <h3><?= $title ?></h3>
    <div class="response">
        <?php if(isset($response)) : ?>
            <p><?= $response ?><p>
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
    
    
    <table class="crud-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>E-mail</th>
                <th>Photo</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php if(isset($allInfo)): 
        foreach ($allInfo as $info): ?>
            <tr>
                <td><?= $info->getMwIdInfo() ?></td>
                <td><?= $info->getMwNameInfo() ?></td>
                <td><?= $info->getMwAdressInfo() ?></td>
                <td><?= $info->getMwPhoneInfo() ?></td>
                <td><?= $info->getMwMailInfo() ?></td>
                <td><?= $info->getMwPictureMwIdPicture() ?></td>
                <td>
                    <button>
                        <a href="?p=info-update&info-update=<?= $info->getMwIdInfo() ?>">update</a>
                    </button>
                </td>
                <td>
                    <button>
                        <a onclick="void(0);let a=confirm('Voulez-vous vraiment supprimer \'<?= $info->getMwIdInfo() ?>\' ?'); if(a){ document.location = '?p=info&info-delete=<?= $info->getMwIdInfo() ?>'; };" href="#">delete</a>
                    </button>
                </td>
            </tr>
        <?php endforeach; 
        endif; ?>
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


        <h4>Ajout d'information : </h4>
        <form class="general-form" action="" method="POST">
            <!-- y'a le #mytextarea pour relier à l'éditeur de text -->
            <label for="info_insert_name">Nom : </label>
            <input name="info_insert_name" id="info_insert_name" ></input><br>

            <label for="info_insert_adress">Adresse : </label>
            <textarea name="info_insert_adress" id="mytextarea"></textarea><br>

            <label for="info_insert_phone">Téléphone : </label>
            <input name="info_insert_phone" id="info_insert_phone" ></input><br>

            <label for="info_insert_mail">E-mail : </label>
            <input name="info_insert_mail" id="info_insert_mail" ></input><br>
        
            <h4>Photo : </h4>
        
            <div class="photo-form">
                <label for="info-insert-pic-title">Titre de la photo : </label>
                <input type="text" name="info-insert-pic-title"><br>
            
                <label for="info-insert-pic-url">URL de la photo : </label>
            <?php if(isset($picUrl)) :?>
                <input type="text" name="info-insert-pic-url" value="<?= $picUrl ?>"><br>
            <?php else : ?>
                <input type="text" name="info-insert-pic-url"><br>
            <?php endif; ?>
            </div>
                
            <button>Enregistrer</button>
        </form>
    </div>
</div>


<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";