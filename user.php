<?php
session_start();
$userid = $_GET['userid'];
$user = intval($userid);
?>

<!DOCTYPE html>

<html>

<head>
    <title>LoL Board - User Profile</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php include("header.php"); ?>
    <main>
        <section class="cmid">
            <section class="mid">
            <?php
            if (isset($_GET["userid"]) ) {
                $connexion = mysqli_connect("localhost", "root", "", "forum");
                $requete = "SELECT * FROM utilisateurs WHERE id='$user'";
                $query = mysqli_query($connexion, $requete);
                $resultat = mysqli_fetch_assoc($query);
                $datesql = $resultat['dateinscription'];
                $newdate = date('d-m-Y à H:i:s', strtotime($datesql));
                if(!empty($resultat)){
                ?>
                <article id="imgprofil">
                        <img id="profilimg" src="<?php echo $resultat['avatar'] ?>" alt="logo">
                </article>
                <p>Nom : <?php echo $resultat['nom'] ?></p>
                <p>Prenom : <?php echo $resultat['prenom'] ?></p>
                <p>Pseudo : <?php echo $resultat['login'] ?></p>
                <p>Inscrit depuis le : <?php echo $newdate ?></p>
                <?php
                if ($resultat['rank'] == 1)
                {
                  $currentrank = "Administrateur";
                  echo "User rank: ".$currentrank;
                }
                 if ($resultat['rank'] == 2)
                {
                   $currentrank = "Moderateur";
                   echo "User rank: ".$currentrank;

                }
                 if ($resultat['rank'] == 3)
                {
                   $currentrank = "Utilisateur";
                   echo "User rank: ".$currentrank;
                }
                $verifadmin = "SELECT * FROM utilisateurs WHERE login='" . $_SESSION['login'] . "'";
                $queryadmin = mysqli_query($connexion, $verifadmin);
                $resultat2 = mysqli_fetch_assoc($queryadmin);
                if($resultat2['rank'] == 1){
                ?>
                <form action="user.php?userid=<?php echo $user ?>" method="post">
                <section class="cform">
                <label>Change user rank</label>
                <select name="newrank">
                <option value="<?php echo $resultat['rank'] ?>"><?php echo "Current rank: ".$currentrank ?></option>
                <option value="1">Administrateur</option>
                <option value="2">Moderateur</option>
                <option value="3">Membre</option>
                </select>
                <input type="submit" name="modifrank" value="Modifier" />
                </section>
                </form>
                <?php
                if (isset($_POST['modifrank']) ) {
                    $changerank = "UPDATE utilisateurs SET rank ='" . $_POST['newrank'] . "' WHERE id = '" . $_GET['userid'] . "'";
                    $queryrank = mysqli_query($connexion, $changerank);
                    $_SESSION['rank'] = $_POST['newrank'];
                    header("Location:user.php?userid=".$user."");
                }
                }
                }
                else{
                        echo "USER ID INVALIDE";
                 }
                ?>   
        </section>
    </section>
    <?php
    } 
    else 
    {
        ?>
            <p>NO USER ID</p>
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