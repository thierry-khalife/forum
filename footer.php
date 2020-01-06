  <footer>
        <nav class="navfooter">
            <a href="index.php">Home</a>
            <?php if(!isset($_SESSION['login'])){ ?>
            <a href="inscription.php">Register</a>
            <a href="connexion.php">Login</a>
            <?php } if(isset($_SESSION['login'])){ ?>
            <a href="profil.php">Profil</a>
            <a href="members.php">Members</a>
            <a href="index.php?deco">Logout</a>
            <?php } ?>
        </nav>
        <article>
            <p>Copyright 2019 Coding School | All Rights Reserved | Project by Thierry & Nicolas.</p>
        </article>
  </footer>
