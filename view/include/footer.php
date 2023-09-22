    <!-- pour se connecter, on fera un truc discret dès que ça marche -->

    <br><br><br><br><footer>
        <div class="footer-section">
            <h2 class="titrecont">Contact</h2>
            <p class="textcont"> 72, AVENUE DU DUC JEAN 
              1083 BRUXELLES </p>
            <p>0486 73 48 35</p>
            <p>iliamsi@hotmail.com</p>
        </div>
        <div class="footer-section">
            <h2 class="titrecont">Navigation</h2>
            <a class="lienfoot" href="./">Accueil</a>
            <a class="lienfoot" href="?sectionId=1">Avant la Grosses</a>
            <a class="lienfoot" href="?sectionId=2">Grosses</a>
            <a class="lienfoot" href="?sectionId=3">Après la naissance</a>
            <a class="lienfoot" href="?p=agenda">Agenda</a>
            <a class="lienfoot" href="?p=contact">Contact</a>
            <a class="lienfoot" href="?p=livreDor">Livre D'or</a>
        </div>
        <div class="footer-section">
        <img class="picfoot" src="asset/img/logo1.png">
        </div>

      <!--on met le bouton de connexion directement dans le footer  -->

      <!-- si on est connecté -->   
      <?php if($title !== "Connection" ) : ?> 
        <?php if(empty($_SESSION)) : ?>
          <button class="btn"><a href="?p=connect"><i class="fa-solid fa-screwdriver-wrench"></i></a></button>
        <?php else : ?>
          <button class="btndeco"><a href="?deconnect">deconnection</a></button>
          <a href="?p=admin">Admin</a>
        <?php endif;  ?>
      <?php endif; ?>

      </footer>

    <button onclick="backToTop()" id="btt" title="Back to top">Top</button>

    
    
    <!-- JS -->
    <script src="../public/js/js.js"></script>
    <script src="js/btt.js"></script>

</body>
</html>
