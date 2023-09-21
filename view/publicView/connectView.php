<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Connection";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->
<main>
<figure class="circle"></figure>
<h2><?= $title ?></h2>

<?php if(isset($erreur)){
    echo $erreur;
}
?>

<form class="connect-form" method="POST">
    <input type="text" name="login" placeholder="Votre login">
    <input type="password" name="pwd" placeholder="Votre mot de passe">
    <button>Connection</button>
</form>

</main>
<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";
