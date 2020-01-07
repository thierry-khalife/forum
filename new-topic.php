<?php session_start() ?>

<!DOCTYPE html>

<html>

<head>
    <title>New Topic</title>
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
                    <form class="form_site" action="new-topic.php" method="post">
                        <label>Nom du topic</label>
                        <input type="text" name="topic" required>
                        <label>Catégorie</label>
                        <select name="categorie" required>
                            <option value=1>Annonces officielles</option>
                            <option value=2>Communauté</option>
                            <option value=3>Recrutement</option>
                        </select>
                        <br />
                        <input class="mybutton"  type="submit" value="Créer un topic" name="valider">
                    </form>
            <?php
                    if ( isset($_POST["valider"]) )
                    {
                          $nomtopic = $_POST['topic'];
                          $categorie = $_POST['categorie'];
                          $rename = addslashes($nomtopic); 
                          $requete = "INSERT INTO topics (nomtopic, id_utilisateur, datecreation, id_categorie) VALUES ('$rename', ".$resultat2[0]['id'].", '".date("Y-m-d H:i:s")."', '$categorie')";
                          $query = mysqli_query($cnx, $requete);
                          header("Location: topics.php?idcat=$categorie");
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
