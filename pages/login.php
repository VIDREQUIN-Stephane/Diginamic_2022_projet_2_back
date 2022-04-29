<?php
session_start();
include 'config.php';
try
{
	$bdd = new PDO("mysql:host=$host;dbname=$base", $user, $pass);
}
catch (exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
if (isset($_SESSION['id'])) {
    $getid = intval($_SESSION['id']);
	$requser = $bdd->prepare('SELECT * FROM utilisateur WHERE id = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
    ?>
    <h2>Profil de <?php echo $userinfo['prenom']; ?> <?php echo $userinfo['nom']; ?></h2>
    Adresse mail : <?php echo $userinfo['email']; ?>
    <?php
    if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
    {
    ?>
    <a href="edit.php">Modifier mon profil</a> <br>
    <a href="unlog.php">Se déconnecter</a>
    <?php
    }
} else {
    //******************************** */
    //****** Cookies à inclure *********/
    //******************************** */
    // include_once('cookie.php');
    if(isset($_POST['emailConnect']))
    {
        $emailConnect = htmlspecialchars($_POST['emailConnect']);
        $mdpConnect = sha1($_POST['mdpConnect']);
        if(!empty($emailConnect) AND !empty($mdpConnect)) 
        {
            $requser = $bdd->prepare('SELECT * FROM utilisateur WHERE email = ? AND password = ?');
            $requser->execute(array($emailConnect, $mdpConnect));
            $userexist = $requser->rowCount();
            if($userexist == 1)
            {
                if(isset($_POST['rememberMe']))
                {
                    setcookie('email', $emailConnect, time()+365*24*3600,null,null,false,true);
                    setcookie('password', $mdpConnect, time()+365*24*3600,null,null,false,true);
                }
                $userinfo = $requser->fetch();
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['email'] = $userinfo['email'];
                $id = $_SESSION['id'];
                header("Location: profil.php");
            }
            else
            {
                $error = 'Adresse mail ou mot de passe invalide.';
            }
        }
        else
        {
            $error = 'Veuillez remplir tous les champs.';
        }
    }
    ?>
    <!-- FORMULAIRE CONNECTION -->
    <form action='login.php' method="post">
        <!-- ADRESSE MAIL -->
        <label for="emailConnect">
            Adresse mail : 
            <input type="email" name="emailConnect" id="emailConnect">
        </label><br>
        <!-- MOT DE PASSE -->
        <label for="mdpConnect">
            Mot de passe : 
            <input type="password" name="mdpConnect" id="mdpConnect">
        </label><br>
        <!-- REMEMBER ME -->
        <label for="rememberMe">
        Se souvenir de moi
            <input type="checkbox" name="rememberMe" id="rememberMe">
        </label><br>
        <!-- SUBMIT -->
        <input type="submit" value="Se connecter">
    </form>
    <?php
        if (isset($error)) {
            echo '<font color="red" class="error">' . $error . '</font>';
        }
}
?>