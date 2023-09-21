<?php
// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Contact";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->
<main>

    <h2><?= $title ?></h2>
    <img class="photocontact" src="asset/img/logo2.png">
    

    <!-- Formulaire de contact -->

    <form class="formu" method="post" action=""> 
        <label class="soustitre" for="name_contact"> </label><br><br>
        <input  type="text" placeholder="Nom" name="name_contact" required>

        <label class="soustitre" for="mail_contact"> </label><br><br>
        <input type="email" placeholder="E-mail" name="mail_contact" required>

        <label class="soustitre" for="objet"> </label><br><br>
        <input type="text" placeholder="Objet" id="objet_contact" required>

        <label class="soustitre" for="message_contact"> </label><br><br>
        <input name="message_contact" placeholder="Message" rows="5" required></input><br>

        <br><br><br><button  type="button" class="submit">Envoyer</button>
    </form>

    <?php if(isset($allInfo)) : ?>
        <?php foreach($allInfo as $info): ?>
            <h4><?= $info -> getMwNameInfo()  ?></h4>
            <a href="https://maps.google.com/maps?q=<?= str_replace(["<p>", "</p>", "<br>", "<br/>"], " ", $info -> getMwAdressInfo()) ?>" target="_blank"><?= $info -> getMwAdressInfo() ?></a>
            <?php if(!is_null($info -> getMwPhoneInfo())) : ?>
                <p><?= $info -> getMwPhoneInfo() ?></p>
            <?php endif; ?>
            <?php if(!is_null($info -> getMwMailInfo())) : ?>
                <p><?= $info -> getMwMailInfo() ?></p>
            <?php endif; ?>

        <?php endforeach; ?>
    <?php endif; ?>
</main>
<!-- FOOTER -->
<?php
include_once "../view/include/footer.php";
?>
