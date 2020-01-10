<?php session_start() ?>

<!DOCTYPE html>

<html>

<head>
    <title>LoL Board - Inscription</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<?php include("header.php"); ?>
    <main>
        <section class="cmid formimg">
            <?php
            if (isset($_SESSION["login"])) 
            {
                echo "<section id=\"fdeco\"><p>Bonjour " . $_SESSION["login"] . ", vous êtes déjà connecté impossible de s'inscrire.<br /></p>";
                ?>
                <form action="index.php" method="post">
                    <input name="deco" value="Deconnexion" type="submit" />
                </form>
            <?php
                echo "</section>";
            } 
            else 
            {
                ?>
                    <section class="mid cpageform">
                    <article class="titleform">
                    <p>Inscription</p>
                    </article>
                    <form action="inscription.php" method="post">
                        <section class="cform">
                            <label>Nom</label>
                            <input type="text" name="nom" required>
                            <label>Prenom</label>
                            <input type="text" name="prenom" required>
                            <label>Identifiant</label>
                            <input type="text" name="login" required>
                            <label>Mot de passe</label>
                            <input type="password" name="mdp" required>
                            <label>Confirmation du mot de passe</label>
                            <input type="password" name="mdpval" required>
                            <br />
                            <input type="submit" value="S'inscrire" name="valider">
                        </section>
                    </form>
                    <?php

                    if ( isset($_POST["valider"]) )
                    {
                        $nom = $_POST["nom"];
                        $prenom = $_POST["prenom"];
                        $login = $_POST["login"];
                        $mdp = password_hash($_POST["mdp"], PASSWORD_BCRYPT, array('cost' => 12));
                        $connexion = mysqli_connect("localhost", "root", "", "forum");
                        $requete3 = "SELECT login FROM utilisateurs WHERE login = '$login'";
                        $query3 = mysqli_query($connexion, $requete3);
                        $resultat3 = mysqli_fetch_all($query3);

                        if (!empty($resultat3)) 
                        {
                        ?>
                            <p class="pincorrect">Cet identifiant est déjà prit.</p>
                        <?php
                        }
                        elseif ($_POST["mdp"] != $_POST["mdpval"]) 
                        {
                        ?>
                            <p class="pincorrect">Attention ! Mots de passe différents.</p>
                        <?php
                        }
                        else 
                        {
                            $date = date("Y-m-d H:i:s");
                            $requete = "INSERT INTO utilisateurs (login, password, nom, prenom, rank, dateinscription, avatar) VALUES ('$login','$mdp', '$nom', '$prenom', 3, '$date', 'img/default.png')";
                            $query = mysqli_query($connexion, $requete);
                        }
                    }
                    ?>
                    </section>
            <?php
                }
                ?>
        </section>
    </main>
<?php 

include("footer.php"); 
mysqli_close($connexion);

?>
</body>

</html>
