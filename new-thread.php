<?php 
session_start();
$idtopic = $_GET['idtopic'];
$topic = intval($idtopic);
?>

<!DOCTYPE html>

<html>

<head>
    <title>New Thread</title>
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
                    echo "Bonjour, " . $_SESSION["login"] . " vous êtes connecté vous pouvez créer un thread.<br />";
            ?>
                    <article><h1>Veuillez rentrer le nom du thread :</h1></article>
                    <form class="form_site" action="new-thread.php?idtopic=<?php echo $topic ?>" method="post">
                        <label>Nom du thread</label>
                        <input type="text" name="thread" required>
                        <br />
                        <input class="mybutton"  type="submit" value="Créer un thread" name="valider">
                    </form>
            <?php
                    if ( isset($_POST["valider"]) )
                    {
                        $nomthread = $_POST['thread'];
                        $rename = addslashes($nomthread);
                        $requete = "INSERT INTO threads (nomthread, id_utilisateur, datethread, id_topic) VALUES ('$rename', ".$resultat2[0]['id'].", '".date("Y-m-d H:i:s")."', '$topic')";
                        $query = mysqli_query($cnx, $requete);
                        header("Location: threads.php?idtopic=$topic");
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
