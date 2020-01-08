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
        <section>
            <article> 
            <?php
            date_default_timezone_set('Europe/Paris');
            $cnx = mysqli_connect("localhost", "root", "", "forum");
            $idtopic = $_GET['idtopic'];
            $requete = "SELECT * FROM threads WHERE id_topic=$idtopic ORDER BY datethread DESC";
            $query = mysqli_query($cnx, $requete);
            $resultat = mysqli_fetch_all($query, MYSQLI_ASSOC);
            $taille = count($resultat);
            $a = 0;
            while ($a < $taille) {
                $datesql = $resultat[$a]['datethread'];
                $newdate = date('d-m-Y à H:i:s', strtotime($datesql));
                $iduser = $resultat[$a]['id_utilisateur'];
                $idthread = $resultat[$a]['id'];
                $requetelogin = "SELECT login FROM utilisateurs WHERE id=$iduser";
                $query2 = mysqli_query($cnx, $requetelogin);
                $resultatlogin = mysqli_fetch_all($query2, MYSQLI_ASSOC);

                 echo "<b><i>Créer le : </i></b>".$newdate;
                 echo "<b><i> par : </i></b><u>".$resultatlogin[0]["login"]."</u><br>";
                 echo " <a href=\"messages.php?idthread=".$idthread."\">".$resultat[$a]['nomthread']."</a><br /><br />";
            $a++;
            }
            if (isset($_SESSION["login"])) 
            {
                  echo "<br>Bonjour, " . $_SESSION["login"] . " vous êtes connecté vous pouvez créer un <a href=\"new-thread.php?idtopic=".$idtopic."\">thread</a>.<br />";
            } 
            else{
            	  echo "<br>Bonjour Guest, Veuillez vous connecté afin de pouvoir créer un topic.<br />";
            }
            ?>
        </article>
        </section>
        <section class="gifmain"> 
            <img src="img/anim.gif">
    </section>
    </main>
<?php include("footer.php"); ?>
</body>

</html>