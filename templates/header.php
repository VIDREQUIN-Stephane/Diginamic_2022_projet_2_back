
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
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 pe-5 me-5">
                    <li class="nav-item"><a class="nav-link fs-5 text-primary" href="index.php?page=home">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link fs-5 text-primary" href="">Lien 1</a></li>
                    <li class="nav-item"><a class="nav-link fs-5 text-primary" href="">Lien 2</a></li>
                    <li class="nav-item"><a class="nav-link fs-5 text-primary" href="">Lien 3</a></li>
                </ul>

                <div class="list-group me-2">
                    <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                        <a class="btn btn-primary text-white p-0" href="#">Inscription</a>
                    </button>
                </div>
                <div class="list-group">
                    <button type="button" class="btn btn-primary text-white">
                        <a class="btn btn-primary text-white p-0" href="index.php?page=register">Se connecter</a>
                    </button>
                </div>
            </div>

            </div>

    </nav>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Formulaire d'inscription</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!--ensemble des champs présents dans le formulaire modal-->

                    <form class="row g-3">
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary">Inscription</button>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel2">Formulaire d'inscription</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal2" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!--ensemble des champs présents dans le formulaire modal-->

                    <form class="row g-3">
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal2">Annuler</button>
                    <button type="button" class="btn btn-primary">Inscription</button>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="../assets/js/style_formulaire.js"></script>
</header>

