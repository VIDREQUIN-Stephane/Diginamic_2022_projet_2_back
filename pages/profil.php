<?php
session_start();
include 'config.php';
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=trekker', $user, $pass);
}
catch (exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
echo $_SESSION['id'];
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
    <a href="edit.php">Modifier mon profil</a> <br>
    <a href="unlog.php">Se déconnecter</a><br><br><br>
<?php
    
}
?>