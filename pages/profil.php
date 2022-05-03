<?php
include_once 'config_sever.php';
try
{
	$bdd = new PDO("mysql:host=$host;dbname=$base", $user, $pass);
}
catch (exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

//******************************** */
//****** Cookies à inclure *********/
//******************************** */
// include_once('cookie.php');
if(isset($_SESSION['id']))
{
	$getid = intval($_SESSION['id']);
	$requser = $bdd->prepare('SELECT * FROM utilisateur WHERE id = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
?>
    <h2>Profil de <?php echo $userinfo['prenom'] . ' ' .  $userinfo['nom']; ?></h2>
    Adresse mail : <?php echo $userinfo['email']; ?>
        <?php echo $userinfo['photo'] ?>
    <a href="index.php?page=monprofil">Modifier mon profil</a> <br>
    <a href="index.php?page=deconnection">Se déconnecter</a><br><br><br>
<?php
    
}
?>