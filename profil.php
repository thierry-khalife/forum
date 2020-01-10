<?php
session_start();
?>

<!DOCTYPE html>

<html>

<head>
    <title>LoL Board - My Profile</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php include("header.php"); ?>
    <main>
        <section class="cmid">
            <?php
            if (isset($_SESSION['login']))
            {
                $connexion = mysqli_connect("localhost", "root", "", "forum");
                $requete = "SELECT * FROM utilisateurs WHERE login='" . $_SESSION['login'] . "'";
                $query = mysqli_query($connexion, $requete);
                $resultat = mysqli_fetch_assoc($query);

                ?>
                <section class="mid">
                    <article class="titleform">
                        <p>Mon compte</p>
                    </article>
                    <div id="imgprofil">
                        <img id="profilimg" src="<?php echo $resultat['avatar'] ?>" alt="logo">
                    </div>
                        <form action="profil.php" method="post" enctype="multipart/form-data">
                            <section class="cform">
                                <label>Nom</label>
                                <input type="text" name="nom" value=<?php echo $resultat['nom']; ?> />
                                <label>Prénom</label>
                                <input type="text" name="prenom" value=<?php echo $resultat['prenom']; ?> />
                                <label>Identifiant</label>
                                <input type="text" name="login" value=<?php echo $resultat['login']; ?> />
                                <label>Mot de passe</label>
                                <input type="password" name="passwordx" />
                                <label>Confirmation du mot de passe</label>
                                <input type="password" name="passwordconf" />
                                <input name="ID" type="hidden" value=<?php echo $resultat['id']; ?> />
                                <label>Image de profil</label>
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <input type="submit" name="modifier" value="Modifier" />
                            </section>
                        </form>

                        <?php 
                            if (isset($_POST['modifier']) ) {

                                //UPDATE PASSWORD
                                if ($_POST["passwordx"] != $_POST["passwordconf"]) {
                                    ?>
                                    <p class="pincorrect">Attention ! Mot de passe différents</p>
                                    <?php
                                } 
                                elseif( isset($_POST['passwordx']) && !empty($_POST['passwordx']) ) {
                                    $pwdx = password_hash($_POST['passwordx'], PASSWORD_BCRYPT, array('cost' => 12));
                                    $updatepwd = "UPDATE utilisateurs SET password = '$pwdx' WHERE id = '" . $resultat['id'] . "'";
                                    $query2 = mysqli_query($connexion, $updatepwd);
                                    header('Location:profil.php');
                                }

                                // UPDATE LOGIN
                                $login = $_POST["login"];
                                $req = "SELECT login FROM utilisateurs WHERE login = '$login'";
                                $req3 = mysqli_query($connexion, $req);
                                $veriflog = mysqli_fetch_all($req3);
                                var_dump($veriflog);
                                if( !empty($veriflog) && $veriflog[0][0] == $_POST['login'] ) { // à vérif
                                    ?>
                                    <p class="pincorrect">Login deja utilisé, requete refusé.<br /></p>
                                    <?php
                                }
                                if ( empty($veriflog) && !empty($_POST['login']) ) {
                                    $updatelog = "UPDATE utilisateurs SET login ='" . $_POST['login'] . "' WHERE id = '" . $resultat['id'] . "'";
                                    $querylog = mysqli_query($connexion, $updatelog);
                                    $_SESSION['login']=$_POST['login'];
                                    header("Location:profil.php");
                                }

                                // UPDATE NOM
                                if ( !empty($_POST['nom']) ) {
                                    echo "d";
                                    $updatelog1 = "UPDATE utilisateurs SET nom ='" . $_POST['nom'] . "' WHERE id = '" . $resultat['id'] . "'";
                                    $querylog1 = mysqli_query($connexion, $updatelog1);
                                    header("Location:profil.php");
                                }

                                // UPDATE PRENOM
                                if ( !empty($_POST['prenom']) ) {
                                    echo "d";
                                    $updatelog2 = "UPDATE utilisateurs SET prenom ='" . $_POST['prenom'] . "' WHERE id = '" . $resultat['id'] . "'";
                                    $querylog2 = mysqli_query($connexion, $updatelog2);
                                    header("Location:profil.php");
                                }

                                // UPDATE IMAGE DE PROFIL
                                if ( !empty($_FILES["fileToUpload"]["name"]) ) {
                                    $target_dir = "img/";
                                    $name = $_FILES["fileToUpload"]["name"];
                                    $yo = explode(".", $name);
                                    $ext = end($yo);
                                    $sessionid = $_SESSION['id'];
                                    $target_file = "img/profile".$sessionid.".".$ext;
                                    $uploadOk = 1;
                                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                                    if( $check !== false ) {
                                        $uploadOk = 1;
                                    } 
                                    else {
                                        $uploadOk = 0;
                                    }

                                    // Vérifie la taille de l'image
                                    if ( $_FILES["fileToUpload"]["size"] > 500000 ) {
                                        $uploadOk = 0;
                                    }

                                    // Autorise que certains format d'images
                                    if( $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                    && $imageFileType != "gif" ) {
                                        $uploadOk = 0;
                                    }
                                    else {
                                        if ($uploadOk == 1 && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                            $requeteavatar = "UPDATE utilisateurs SET avatar = \"$target_file\" WHERE id = '" . $resultat['id'] . "'";
                                            $queryavatar = mysqli_query($connexion, $requeteavatar);
                                            header("Location: profil.php");
                                        }
                                    }
                                }
                            }
                            ?>
                </section>
        </section>
    <?php

    } 
    else 
    {
        ?>
            <p>Veuillez vous connecter pour accéder à votre page !</p>
        <?php
    }
    ?>

    </main>
<?php 

include("footer.php"); 
mysqli_close($connexion);

?>
</body>

</html>