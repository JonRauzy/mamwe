<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/section.css">
    <link rel="stylesheet" href="css/livredor.css">    
    <link rel="stylesheet" href="css/ressources.css">
    <link rel="stylesheet" href="css/crud.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/agenda.css">
    <link rel="stylesheet" href="css/connect.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;700&family=Metrophobic&family=Roboto&family=Waiting+for+the+Sunrise&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/tinymce.js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
    <script src="js/submenu.js"></script>

    <!-- $title est défini en haut de chaque page vue, on y met le nom de la catégory ou sous catégory pour qu'il saffiche dans l'onglet du navigateur -->
    <title>MAMWE - <?= $title ?></title> 

</head>
<body>

<!-- HEADER -->

<!-- NAVBAR -->  

<!-- Affichage de la barre de navigation pour le public -->
<div class="public-nav">
    <div class="titre">
        <h1>MAMWE</h1>
        <h2>Sage-femme de Bruxelles</h2>
    </div>
    <img class="logo" src="asset/img/logo1.png">
    <nav>  
        <a href="./">Accueil</a>

        <!-- lien pour les category :-->
        <?php                
        foreach($allSection as $section) :  
        ?>
        <!-- VERIFIER DB pour les noms -->
        <div class="menu_ressouces">
            <a class="menu" href="?sectionId=<?= $section -> getMwIdSect() ?>"><?= $section -> getMwTitleSect() ;?></a>
        <!--       <menu id="ressource-select">
                <?php foreach($articleBySection as $abs):?>
                        <li> <a href="#<?=$abs->getmwTitleArt()?>">
                            <?=$abs->getmwTitleArt()?></a>
                        </li>
                <?php endforeach; ?>
            </menu>  -->
        </div>
        <?php
        endforeach;
        ?> 
        <a href="?p=ressources">Ressources</a>
        <a href="?p=agenda">Agenda</a>
        <a href="?p=contact">Contact</a>
        <a href="?p=livreDor">Livre D'or</a>
    </nav>
</div>

<!-- Condition pour vérifier si l'utilisateur est connecté en tant qu'administrateur -->