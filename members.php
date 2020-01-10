<?php
session_start();
?>

<!DOCTYPE html>

<html>

<head>
    <title>Liste des membres</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php include("header.php"); ?>
    <main>
        <section class="cmid">
        <section class="listmembre">
        <h1 id="ctitlemembre">Liste des membres</h1>
<?php

$connexion = mysqli_connect("localhost", "root","", "forum");
$requete = "SELECT * FROM utilisateurs";
$query = mysqli_query($connexion, $requete);
$resultat = mysqli_fetch_all($query);
$i = 0;

if( isset($_SESSION['login']) == true )
{
    foreach($resultat as $cle => $valeur) {
        $i += 1;
        if ( $i%2 == 1) {
            ?>
            <a href="user.php?userid=<?php echo $resultat[$cle][0]; ?>"><section class="cmembre mimpair">
                <img alt="photoprofil" class="photoprofil" src="<?php echo $resultat[$cle][7] ?>">
                <article class="pseudograde">
                    <p class="pseudo"><?php echo $resultat[$cle][1]; ?></p>
                    <?php
                        if ( $resultat[$cle][5] == 1 ) {
                        ?>
                        <p class="grade">Administrateur</p>
                        <?php
                        }
                        if ( $resultat[$cle][5] == 2 ) {
                        ?>
                        <p class="grade">Modérateur</p>
                        <?php
                        }
                        if ( $resultat[$cle][5] == 3 ) {
                        ?>
                        <p class="grade">Membre</p>
                        <?php
                        }
                    ?>
                </article>
                <article class="inscritle">
                    <p>Inscrit depuis le <?php echo date('d-m-Y à H:i:s', strtotime($resultat[$cle][6])); ?></p>
                </article>
            </section></a>
            <?php
        }
        else {
            ?>
            <a href="user.php?userid=<?php echo $resultat[$cle][0]; ?>"><section class="cmembre mpair">
                <img alt="photoprofil" class="photoprofil" src="<?php echo $resultat[$cle][7] ?>">
                <article class="pseudograde">
                    <p class="pseudo"><?php echo $resultat[$cle][1]; ?></p>
                    <?php
                        if ( $resultat[$cle][5] == 1 ) {
                        ?>
                        <p class="grade">Administrateur</p>
                        <?php
                        }
                        if ( $resultat[$cle][5] == 2 ) {
                        ?>
                        <p class="grade">Modérateur</p>
                        <?php
                        }
                        if ( $resultat[$cle][5] == 3 ) {
                        ?>
                        <p class="grade">Membre</p>
                        <?php
                        }
                    ?>
                </article>
                <article class="inscritle">
                    <p>Inscrit depuis le <?php echo date('d-m-Y à H:i:s', strtotime($resultat[$cle][6])); ?></p>
                </article>
            </section>
            </a>
            <?php
        }
    }
}
else
{
    echo "Vous n'avez pas accès à cette page";
}
?>
        </section>
        </section>
    </main>
    <?php include("footer.php"); 
          mysqli_close($connexion);
    ?>
</body>

</html>
