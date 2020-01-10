<?php session_start() ?>

<!DOCTYPE html>

<html>

<head>
    <title>Topics</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<?php include("header.php"); ?>
    <main>
        <section class="cmid">
            <article> 
            <?php
            date_default_timezone_set('Europe/Paris');
            $cnx = mysqli_connect("localhost", "root", "", "forum");
            $idcat = $_GET['idcat'];
            $requete = "SELECT * FROM topics  WHERE id_categorie=$idcat ORDER BY datecreation DESC";
            $query = mysqli_query($cnx, $requete);
            $resultat = mysqli_fetch_all($query, MYSQLI_ASSOC);
            $taille = count($resultat);
            $a = 0;
            while ($a < $taille) {
                $datesql = $resultat[$a]['datecreation'];
                $newdate = date('d-m-Y à H:i:s', strtotime($datesql));
                $iduser = $resultat[$a]['id_utilisateur'];
                $idtopic = $resultat[$a]['id'];
                $requetelogin = "SELECT login FROM utilisateurs WHERE id=$iduser";
                $query2 = mysqli_query($cnx, $requetelogin);
                $resultatlogin = mysqli_fetch_all($query2, MYSQLI_ASSOC);

                 echo "<b><i>Créer le : </i></b>".$newdate;
                 echo "<b><i> par : </i></b><u>".$resultatlogin[0]["login"]."</u><br>";
                 echo " <a href=\"threads.php?idtopic=".$idtopic."\">".$resultat[$a]['nomtopic']."</a><br /><br />";
            $a++;
            }
            if (isset($_SESSION["login"])) 
            {
                  echo "<br>Bonjour, " . $_SESSION["login"] . " vous êtes connecté vous pouvez créer un <a href=\"new-topic.php\">TOPIC</a>.<br />";
            } 
            else{
            	  echo "<br>Bonjour Guest, Veuillez vous connecté afin de pouvoir créer un topic.<br />";
            }
            ?>
        </article>
        </section>
    </main>
<?php 

include("footer.php"); 
mysqli_close($cnx);

?>
</body>

</html>