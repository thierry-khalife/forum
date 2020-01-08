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
            </section>
            <?php } ?>
            </section>
        </nav>
    </header>