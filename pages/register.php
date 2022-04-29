<?php
include_once "config.php";
try
{
	$bdd = new PDO("mysql:host=$host;dbname=$base", $user, $pass);
}
catch (exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
// VALIDATION DU SUBMIT
if (isset ($_POST['submit'])) {
    // ASSIGNATION DES VARIABLES
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = sha1($_POST['mdp']);
    $mdp_ = sha1($_POST['mdp_']);
    // FORMULAIRE NON VIDE
    if(!empty($_POST['prenom'])
        AND !empty ($_POST['nom'])
        AND !empty ($_POST['email'])
        AND !empty ($_POST['mdp'])
        AND !empty ($_POST['mdp_'])) {
            // EMAIL AU FORMAT VALIDE
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // MAIL NON ULTILISE
            $reqmail = $bdd->prepare('SELECT * FROM utilisateur WHERE email = ?');
            $reqmail->execute(array($email));
            $mailexist = $reqmail->rowCount();
            if ($mailexist == 0) {
                // PASSWORD ET CONFIRMATION IDENTIQUES
                if(($_POST['mdp']) == ($_POST['mdp_'])) {
                    // INSERTION DANS LA BASE DE DONNEE
                    $insertmbr = $bdd->prepare('INSERT INTO utilisateur(nom, prenom, email, password) VALUES(?, ?, ?, ?)');
                    $insertmbr->execute(array($nom, $prenom, $email, $mdp));
                    $error = 'Compte créé. <a href="login.php">Se connecter</a>';
                } else {
                    $error = 'Les mots de passe ne sont pas identiques, veuillez réessayer.';
                }
            } else {
                $error = 'L\'adresse email est déjà utilisée.';
            }
        } else {
            $error = 'L\'adresse mail utilisée n\'est pas valide.';
        }
    } else {
        $error = 'Veuillez remplir tous les champs.';
    }
}
?>
<!-- FORMULAIRE D'ENREGISTREMENT -->
<form action="" method="post">
    <!-- NOM -->
    <label for="nom">
        Nom : 
        <input type="text" name="nom" id="nom" value="<?php if(isset($nom)) { echo $nom; } ?>">
    </label> <br>
    <!-- PRENOM -->
    <label for="prenom">
        Prenom : 
        <input type="text" name="prenom" id="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>">
    </label> <br>
    <!-- EMAIL -->
    <label for="email">
        E-mail : 
        <input type="email" name="email" id="email" value="<?php if(isset($email)) { echo $email; } ?>">
    </label> <br>
    <!-- MOT DE PASSE -->
    <label for="mdp">
        Mot de passe : 
        <input type="password" name="mdp" id="mdp">
    </label> <br>
    <!-- CONFIRMATION MOT DE PASSE -->
    <label for="mdp_">
        Confirmation mot de passe : 
        <input type="password" name="mdp_" id="mdp_">
    </label> <br>
    <!-- PHOTO -->
    <label for="photo">
        Photo de profil : 
        <input type="file" name="photo" id="photo">
    </label> <br>
    <!-- SUBMIT -->
    <input type="submit" value="Je m'enregistre" name="submit" id="sumbit">
</form>
<a href="login.php">déjà inscrit ?</a><br>
<?php
    if (isset($error))
    {
        echo '<font color="red">' . $error . "</font>";
    }
?>