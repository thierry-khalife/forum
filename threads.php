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
                
                $requetederrep = "SELECT (SELECT COUNT(*) FROM messages WHERE id_thread=$idthread) as countrep, (SELECT datemessage FROM messages WHERE id_thread=$idthread AND messages.id = (SELECT MAX(messages.id) FROM messages WHERE id_thread=$idthread)) as  daterep, (SELECT login FROM utilisateurs, messages WHERE messages.id_utilisateur = utilisateurs.id AND messages.id = (SELECT MAX(messages.id) FROM messages WHERE id_thread=$idthread)) as logincrea";
                $queryderrep = mysqli_query($cnx, $requetederrep);
                $resultatderrep = mysqli_fetch_all($queryderrep);
                 echo "<a href=\"messages.php?idthread=".$idthread."\"><article class=\"indexcasethread\"><p>".$resultat[$a]['nomthread']."</p><p>Créer le : ".$newdate." par : ".$resultatlogin[0]["login"]."</p><article class=\"messageder\"><p>Réponses: ".$resultatderrep[0][0]."</p><p>Dernière réponse par ".$resultatderrep[0][2]."</p><p>le ".$resultatderrep[0][1]."</p></article></article></a>";
            $a++;
            }
            ?>
        </article>
        <article>
        <?php
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
    </main>
<?php 

include("footer.php"); 
mysqli_close($cnx);

?>
</body>

</html>