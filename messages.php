<?php
session_start();
ob_start();
$cnx = mysqli_connect("localhost", "root", "", "forum");

if ( isset($_GET["idthread"]) ) {
    $idthread = $_GET["idthread"];
    $intidthread = intval($idthread);
    $requete1 = "SELECT * FROM messages WHERE id_thread=$intidthread ORDER BY datemessage ASC";
    $query1 = mysqli_query($cnx, $requete1);
    $resultat = mysqli_fetch_all($query1, MYSQLI_ASSOC);
    $taille = sizeof($resultat) - 1;
    $requetethread = "SELECT * FROM threads WHERE id=$intidthread";
    $querythread = mysqli_query($cnx, $requetethread);
    $resultatthread = mysqli_fetch_all($querythread, MYSQLI_ASSOC);
}

if ( isset($_SESSION['login']) ) {
    $requete2 = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
    $query2 = mysqli_query($cnx, $requete2);
    $resultat2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
}
else {
    header("Location: connexion.php");
}

date_default_timezone_set('Europe/Paris');
$is2car = false;

if ( isset($_POST['envoyer']) == true && isset($_POST['message']) && strlen($_POST['message']) >= 2 ) {
    $msg = $_POST['message'];
    $remsg = addslashes($msg);
    $requete2 = "INSERT INTO messages (message, id_utilisateur, datemessage, id_thread) VALUES ('$remsg', ".$resultat2[0]['id'].", '".date("Y-m-d H:i:s")."', $intidthread)";
    $query2 = mysqli_query($cnx, $requete2);
    header("Location: messages.php?idthread=$intidthread");
    }
    elseif ( isset($_POST['envoyer']) == true && isset($_POST['message']) && strlen($_POST['message']) < 2 ) {
        $is2car = true;
    }
?>

<!DOCTYPE html>

<html>

<head>
    <title>Message</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<?php include("header.php"); ?>
    <main>
         <section class="cmid">
            <h1 class="h1topic"><?php echo $resultatthread[0]['nomthread']; ?></h1>
            <?php
            $a = 0;
            if( !empty($resultat) && isset($_GET["idthread"]) ) {
            while ($a <= $taille) {
                $datesql = $resultat[$a]['datemessage'];
                $newdate = date('d-m-Y à H:i:s', strtotime($datesql));
                $iduser = $resultat[$a]['id_utilisateur'];
                $idcom = $resultat[$a]['id'];
                $intidcom = intval($idcom);
                $requetelogin = "SELECT login, avatar, rank, dateinscription FROM utilisateurs WHERE id=$iduser";
                $querylogin = mysqli_query($cnx, $requetelogin);
                $resultatlogin = mysqli_fetch_all($querylogin, MYSQLI_ASSOC);
                $newdate2 = date('d-m-Y à H:i:s', strtotime($resultatlogin[0]["dateinscription"]));

                include("like.php"); // SYSTEME DE LIKE/DISLIKE
                ?>
                <section class="cmessages">
                    <article class="messageleft">
                        <a href="user.php?userid=<?php echo $iduser; ?>"><img class="avatarmsg" src="<?php echo $resultatlogin[0]["avatar"]; ?>"></a>
                        <h2><?php echo $resultatlogin[0]["login"]; ?></h2>
                        <?php
                        if ( $resultatlogin[0]["rank"] == "1" ) {
                            ?>
                            <img class="rank" src="img/Administrator.png" alt="admin">
                            <?php
                        }
                        if ( $resultatlogin[0]["rank"] == "2" ) {
                            ?>
                            <img class="rank" src="img/Moderator.png" alt="modo">
                            <?php
                        }
                        if ( $resultatlogin[0]["rank"] == "3" ) {
                            ?>
                            <img class="rank" src="img/Member.png" alt="membre">
                            <?php
                        }
                        ?>
                        <p> Inscrit depuis le <?php echo $newdate2; ?> </p>
                    </article>
                    <article class="message">
                        <article>
                        <?php
                        echo "le <i><u>".$newdate."</u></i><br /><br />";
                        echo $resultat[$a]['message']."<br />";
                        ?>
                        </article>
                        <section>
                            <article class="likebtn">
                                <form method="post" action="messages.php?idthread=<?php echo $intidthread; ?>">
                                    <div id="formvote">
                                    <?php
                                    if ( isset($_SESSION['login']) && $resultat3[0]['COUNT(*)'] != "0" ) {
                                        echo "<input type=\"submit\" name=\"likebutton".$a."\" id=\"likev\" value=\"like\"><div class=\"resultatvotes\">".$resultat5[0]['COUNT(*)']."</div>";
                                        echo "<input type=\"submit\" name=\"dislikebutton".$a."\" id=\"dislike\" value=\"dislike\"><div class=\"resultatvotes\">".$resultat6[0]['COUNT(*)']."</div>";
                                    }
                                    elseif ( isset($_SESSION['login']) && $resultat4[0]['COUNT(*)'] != "0" ) {
                                        echo "<input type=\"submit\" name=\"likebutton".$a."\" id=\"like\" value=\"like\"><div class=\"resultatvotes\">".$resultat5[0]['COUNT(*)']."</div>";
                                        echo "<input type=\"submit\" name=\"dislikebutton".$a."\" id=\"dislikev\" value=\"dislike\"><div class=\"resultatvotes\">".$resultat6[0]['COUNT(*)']."</div>";
                                    }
                                    else {
                                        echo "<input type=\"submit\" name=\"likebutton".$a."\" id=\"like\" value=\"like\"><div class=\"resultatvotes\">".$resultat5[0]['COUNT(*)']."</div>";
                                        echo "<input type=\"submit\" name=\"dislikebutton".$a."\" id=\"dislike\" value=\"dislike\"><div class=\"resultatvotes\">".$resultat6[0]['COUNT(*)']."</div>";
                                    }
                                    ?>
                                    </div>
                                </form>
                            </article>
                            <article class="deletebtn">
                                <?php
                                if(isset($_SESSION['login']) && ($_SESSION['rank'] == 1 || $_SESSION['rank'] == 2))
                                {
                                    echo "<form method=\"post\" action=\"messages.php?idthread=$intidthread\">
                                    <br><input type=\"submit\" class=\"submitdel\"  name=\"delete".$a."\" value=\"$idcom\" />
                                    </form>";
                                }
                                ?>
                            </article>
                        </section>
                    </article>
                </section>
                <?php // SYSTEME DELETE WHEN ADMIN
                if (isset($_POST["delete".$a])) {
                    $todel = $_POST["delete".$a];
                    $requetedel = "DELETE FROM messages WHERE id=$todel";
                    $querydel = mysqli_query($cnx, $requetedel);
                    $requetedellike = "DELETE FROM votes WHERE id_message=$todel";
                    $querydellike = mysqli_query($cnx, $requetedellike);
                    header("Location: messages.php?idthread=$intidthread");
                }
                $a++;
            }
        }
        elseif ( isset($_GET["idthread"]) && empty($resultatthread) || isset($_SESSION['login']) && !isset($_GET["idthread"]) ) {
            echo "Ce topic n'existe pas !";
        }
        elseif ( isset($_GET["idthread"]) && !empty($resultatthread) && empty($resultat) ) {
            echo "Ce topic est vide, envoyez votre premier message !";
        }
            ?>
            <?php
           
            if ( isset($_SESSION['login']) && isset($_GET["idthread"]) && !empty($resultatthread) ) {
            ?>
                <form class="form_site" method="post" action="messages.php?idthread=<?php echo $intidthread; ?>">
                    <label>VOTRE MESSAGE</label>
                    <textarea name="message" ></textarea><br />
                    <input type="submit" value="Envoyer" name="envoyer" >
                </form>
                <?php
                if ( $is2car == true ) {
                ?>
                    <p>Votre message doit comporter au moins 2 caractères.</p>
                <?php
                }
            }

            elseif ( !isset($_SESSION['login']) ) {
            ?>
                <center><p><b>ERREUR</b><br />
                Vous devez être connecté pour accéder à cette page.</p></center>
            <?php
            }
            ?>
           </section>
        <section>
     </section>
    </main>
<?php include("footer.php"); 
mysqli_close($cnx);
ob_end_flush();
?>
</body>

</html>