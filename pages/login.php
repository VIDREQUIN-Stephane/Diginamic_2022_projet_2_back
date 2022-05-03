<?php
session_start();
include 'config_sever.php';
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
    <a href="index.php?page=monprofil">Modifier mon profil</a> <br>
    <a href="index.php?page=deconnection">Se déconnecter</a>
    <?php
    }
} else {
 include_once('cookie.php');
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
                header("Location: index.php?page=monprofil");
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
    <form class="container-fluid py-5 row g-3" action='index.php?page=login' method="post">
        <!-- ADRESSE MAIL -->
        <div class="form-floating mb-3 col-md-4">
            <input type="email" name="emailConnect" id="emailConnect" class="form-control" placeholder="name@example.com">
            <label for="emailConnect">Adresse mail</label>
        </div>
        <!-- MOT DE PASSE -->
        <div class="form-floating col-md-4">
            <input type="password" name="mdpConnect" id="mdpConnect" class="form-control" placeholder="Password">
            <label for="mdpConnect" >Mot de passe</label>
        </div>
        <!-- REMEMBER ME -->
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="rememberMe" id="rememberMe" role="switch" checked>
            <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
        </div>
        <!-- SUBMIT -->
        <div class="col-12">
            <button type="submit" value="Se connecter" class="btn btn-primary mb-3 text-white" name="submit" id="sumbit">Se connecter</button>
        </div>
    </form>
    <?php
        if (isset($error)) {
            echo '<div class="alert alert-danger">'.$error.'</div>';
        }
}
?>