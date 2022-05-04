<?php
include_once 'pages/connection.php';
include_once 'pages/avatar.php';
?>

<header class="px-5 py-2" role="banner" id="menu-de-navigation">
    <nav class="navbar fixed-top shadow-sm py-2 navbar-expand-md navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?page=home">
                <img src="./assets/images/logo.webp" alt="logo trekker" width="" height="30">
                Trekker
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                        <?php
                        $is_connected = is_connected();
                        if ($is_connected === false) :
                        ?>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 pe-5 me-5">
                    <li class="nav-item"><a class="nav-link fs-5 text-primary" href="index.php?page=home">Accueil</a></li>
                </ul>
                            <div class="list-group me-2">
                                <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                    <a class="btn btn-primary text-white p-0" href="index.php?page=register">Inscription</a>
                                </button>
                            </div>
                <div class="list-group">
                         <button type="button" class="btn btn-primary text-white"><a class="btn btn-primary text-white p-0" href="index.php?page=login">Se connecter</a></button>
                </div>
                        <?php
                        elseif ($is_connected === true) :
                        ?>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 pe-5 me-5">
                        <li class="nav-item"><a class="nav-link fs-5 text-primary" href="index.php?page=home">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link fs-5 text-primary" href="index.php?page=kanban">Kanban</a></li>
                        <li class="nav-item"><a class="nav-link fs-5 text-primary" href="index.php?page=monprofil">Mon profil</a></li>
                    </ul>
                    <div class="list-group">
                            <button type="button" class="btn btn-danger text-white"><a class="btn btn-danger p-0" href="index.php?page=deconnection">Se déconnecter</a></button>
                    </div>
                    <?php
                    $profil = $_SESSION['email'];
                    $initavatar = new Avatar("$profil");
                    echo '<div class="text-center ps-5">
                        <img alt="Photo de profil" src="' . $initavatar->base64() . '" />
                    </div>';
                    $initavatar->save("upload/$profil.png");
                    ?>
                        <?php
                        endif;
                        ?>
            </div>
            </div>
    </nav>
</header>


