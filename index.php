<?php session_start() ?>

<!DOCTYPE html>

<html>

<head>
    <title>LoL Board</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="https://nsm09.casimages.com/img/2018/03/29//18032901353323808115638354.png" />
</head>

<body>
<?php include("header.php"); ?>
    <main>
        <section class="cmid">
            <?php
            date_default_timezone_set('Europe/Paris');
            $cnx = mysqli_connect("localhost", "root", "", "forum");
            $requete = "SELECT categories.nomcat,topics.id_utilisateur,nomtopic,topics.datecreation,id_categorie,visibilite,topics.id as idtopic FROM categories INNER JOIN topics ON categories.id = topics.id_categorie";
            $query = mysqli_query($cnx, $requete);
            $resultat = mysqli_fetch_all($query, MYSQLI_ASSOC);
            $taille = count($resultat);
            //var_dump($resultat);
            $i = 0;
            $max = 0; 
            while ($i < $taille) { //boucle pour recuperer l'id max de categorie
            if($max < $resultat[$i]['id_categorie'])
              {
                $max = $resultat[$i]['id_categorie'];
              }
            $i++;
            }
            $a = 0;
            $iddone = [];
            while ($a < $taille) {
                $idcat = $resultat[$a]['id_categorie'];

                if($idcat >= 0 && $idcat <= $max && !in_array($idcat, $iddone)){
            ?>
            <section class="homecat">
            <img src="img/cat.png">    
            <?php
                echo "<a href=\"topics.php?idcat=".$idcat."\">".$resultat[$a]['nomcat']."</a>";
            ?>
            </section>
            <?php
                $b = 0;
                ?>
                <section class="hometop">
                <?php 
                while($b < $taille)
                {
                    if($resultat[$b]['id_categorie'] == $idcat && $resultat[$b]['visibilite'] == 1)
                    {
                        $idtopic = $resultat[$b]['idtopic'];
                        echo "- <a href=\"threads.php?idtopic=".$idtopic."\">".$resultat[$b]['nomtopic']."</a><br />";
                    }
                    if($resultat[$b]['id_categorie'] == $idcat && isset($_SESSION['login']) && $resultat[$b]['visibilite'] == 2) 
                    {
                        $idtopic = $resultat[$b]['idtopic'];
                        echo "- <a href=\"threads.php?idtopic=".$idtopic."\">".$resultat[$b]['nomtopic']."</a><br />";
                    }
                    if($resultat[$b]['id_categorie'] == $idcat && isset($_SESSION['login']) && $_SESSION['rank'] == 1 && $resultat[$b]['visibilite'] == 3) 
                    {
                       $idtopic = $resultat[$b]['idtopic'];
                       echo "- <a href=\"threads.php?idtopic=".$idtopic."\">".$resultat[$b]['nomtopic']."</a><br />";
                    }
                    $b++;
                }
                ?>
                </section>
                <?php 
                array_push($iddone,$idcat);
                }
            $a++;
            }
            if (isset($_SESSION["login"])) 
            {
                  echo "<br>Bonjour, " . $_SESSION["login"] . " vous êtes connecté vous pouvez créer un <a href=\"newtopic.php\">TOPIC</a>.<br />";
            } 
            else{
            	  echo "<br>Bonjour Guest, Veuillez vous connecté afin de pouvoir créer un topic.<br />";
            }
             if (isset($_GET["deco"]))
            {
            session_unset();
            session_destroy();
            header('Location:index.php');
            }
            ?>
        </section>
    </main>
<?php include("footer.php"); ?>
</body>

</html>