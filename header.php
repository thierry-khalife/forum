<header>
        <nav class="nav">
            <section class="headerleft">
                <section id="logo">
                <a href="index.php"><img src="img/logo.png"></a>
                </section>
            </section>
            <section class="headerright">
                  <?php if( !isset($_SESSION['login']) ){ ?>
            <section class="undernav">
<<<<<<< HEAD
                <a href="inscription.php"><img src="img/icon.png"></a>
                <a href="inscription.php">Register</a>
            </section>
            <section class="undernav">
                <a href="connexion.php"><img src="img/icon.png"></a>
                <a href="connexion.php">Login</a>
            </section>
            <?php } if( isset($_SESSION['login']) ){ ?>
             <section class="undernav">
                <a href="profil.php"><img src="img/icon.png"></a>
                <a href="profil.php">Profile</a>
            </section>
            <section class="undernav">
                <a href="members.php"><img src="img/icon.png"></a>
                <a href="members.php">Members</a>
            </section>
            <section class="undernav">
                <a href="index.php?deco"><img src="img/icon.png"></a>
                <a href="index.php?deco">Logout</a>
=======
                <a href="connexion.php"><img src="img/connexion.png"></a>
                <a href="connexion.php">Connexion</a>
            </section>
            <section class="undernav">
                <a href="inscription.php"><img src="img/inscription.png"></a>
                <a href="inscription.php">Inscription</a>
            </section>
            <?php } if( isset($_SESSION['login']) ){ ?>
             <section class="undernav">
                <a href="profil.php"><img src="img/profil.png"></a>
                <a href="profil.php">Profil</a>
            </section>
            <section class="undernav">
                <a href="members.php"><img src="img/membres.png"></a>
                <a href="members.php">Membres</a>
            </section>
            <section class="undernav">
                <a href="index.php?deco"><img src="img/deconnexion.png"></a>
                <a href="index.php?deco">Déconnexion</a>
>>>>>>> f4cea656401f5304e66163a8825705ee101d4e51
            </section>
            <?php } ?>
            </section>
        </nav>
    </header>