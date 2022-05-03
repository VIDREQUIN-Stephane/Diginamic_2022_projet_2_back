<?php
include_once 'config_sever.php';
include_once 'fileregister.php';
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
    $file = $_POST['photo'];
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
                    $insertmbr = $bdd->prepare('INSERT INTO utilisateur(nom, prenom, email, password, photo) VALUES(?, ?, ?, ?, ?)');
                    $insertmbr->execute(array($nom, $prenom, $email, $mdp, $file));
                    $error = '<div class="alert alert-success" role="alert">Compte crée !</div> <a href="index.php?page=monprofil">Se connecter</a>';
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

    <form class="row g-3 needs-validation container-fluid py-5" action="index.php?page=register" method="post">
        <!-- NOM -->
            <div class="col-md-4">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" id="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" class="form-control" required>
                <div class="valid-feedback">
                    Cela semble bon!
                </div>
            </div>

        <!-- PRENOM -->
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Prenom</label>
            <input type="text" name="prenom" id="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" class="form-control" required>
            <div class="valid-feedback">
                Cela semble bon!
            </div>
        </div>
        <!-- EMAIL -->
            <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input  type="email" name="email" id="email" value="<?php if(isset($email)) { echo $email; } ?>" placeholder="name@example.com" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Choisir un utilisateur
                    </div>
                </div>
            </div>
        <!-- MOT DE PASSE -->
        <div class="col-md-4">
            <label for="mdp" class="form-label">Mot de passe</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="mdp" id="mdp">
            </div>
        </div>
        <!-- CONFIRMATION MOT DE PASSE -->
        <div class="col-md-4">
            <label for="mdp_" class="form-label">Mot de passe</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="mdp_" id="mdp_">
            </div>
        </div>
        <!-- PHOTO -->
        <div class="mb-3 col-md-4">
            <label for="photo" class="form-label">Photo de profil :</label>
            <input class="form-control" type="file" name="photo" id="photo" <?php keppData('fichier') ?>>
        </div>
        <!-- SUBMIT -->
        <div class="col-12">
            <button type="submit" value="Je m'enregistre" class="btn btn-primary mb-3 text-white" name="submit" id="sumbit">Je m'enregistre</button>
        </div>
        <a href="index.php?page=login" class="link-info">Déjà inscrit ?</a>
    </form>

<?php
if (isset($error))
{
    echo '<div class="alert alert-danger">'.$error.'</div>';
}
?>

