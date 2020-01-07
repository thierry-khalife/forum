<?php session_start() ?>

<!DOCTYPE html>

<html>

<head>
    <title>New catégorie</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<?php include("header.php"); ?>
    <main>
        <section>
            <?php
            date_default_timezone_set('Europe/Paris');
            $cnx = mysqli_connect("localhost", "root", "", "forum");
            if (isset($_SESSION["login"])) {
                    $requete2 = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
                    $query2 = mysqli_query($cnx, $requete2);
                    $resultat2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
                    echo "Bonjour, " . $_SESSION["login"] . " vous êtes connecté vous pouvez créer un topic.<br />";
            ?>
                    <article><h1>Veuillez rentrer le nom du topic :</h1></article>
                    <form class="form_site" action="new-categorie.php" method="post">
                        <label>Nom de la catégorie</label>
                        <input type="text" name="nomcat" required>
                        <br />
                        <input class="mybutton"  type="submit" value="Créer un topic" name="valider">
                    </form>
            <?php
                    if ( isset($_POST["valider"]) )
                    {
                          $nomcat = $_POST['nomcat'];
                          $renomcat = addslashes($nomcat); 
                          $requete = "INSERT INTO categories (nomcat, id_utilisateur) VALUES ('$renomcat', ".$resultat2[0]['id'].")";
                          $query = mysqli_query($cnx, $requete);
                          header('Location: index.php');
                    }
            } 
            else {
                 echo "Bonjour, veuillez vous connecter afin de pouvoir créer un topic.<br />";
               
            }

            mysqli_close($cnx);
            ?>
        </section>
    </main>
<?php include("footer.php"); ?>
</body>

</html>
