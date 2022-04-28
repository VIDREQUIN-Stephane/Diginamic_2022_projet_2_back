
<header class="px-5 py-2" role="banner" id="menu-de-navigation">
    <nav class="navbar fixed-top shadow-sm py-4 navbar-expand-md navbar-light bg-white">
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
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link fs-5 text-primary" href="">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link fs-5 text-primary" href="">Lien 1</a></li>
                    <li class="nav-item"><a class="nav-link fs-5 text-primary" href="">Lien 2</a></li>
                    <li class="nav-item"><a class="nav-link fs-5 text-primary" href="">Lien 3</a></li>
                    <li class="nav-item"><a class="nav-link fs-5 text-primary" href="">Lien 4</a></li>
                </ul>


            </div>
            <div class="btn contact btn-primary">
                <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                    Inscription
                </button>
            </div>
        </div>
    </nav>

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
                        <div class="col-12" id="divraison">
                            <label for="raisonsociale" class="form-label">Raison sociale</label>
                            <input type="text" class="form-control" id="raisonsociale"
                                   placeholder="ex. Diginamic SA">
                        </div>
                        <div class="col-md-6">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" placeholder="ex. Domenech">
                        </div>
                        <div class="col-md-6">
                            <label for="prénom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prénom" placeholder="ex. Michel">
                        </div>
                        <div class="col-md-12">
                            <label for="poste" class="form-label">Poste</label>
                            <input type="text" class="form-control" id="poste"
                                   placeholder="ex. Responsable Innovation">
                        </div>
                        <div class="col-12">
                            <label for="Adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="Address"
                                   placeholder="ex. 12, rue du coquelicot">
                        </div>

                        <div class="col-md-6">
                            <label for="Ville" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="Ville" placeholder="ex. Sedan">
                        </div>
                        <div class="col-md-4">
                            <label for="Région" class="form-label">Région</label>
                            <select id="Région" class="form-select">
                                <option selected>Choisir...</option>
                                <option>Occitanie</option>
                                <option>Pays de la Loire</option>
                                <option>Hauts de France</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="Codepostal" class="form-label">Code postal</label>
                            <input type="text" class="form-control" id="Codepostal" placeholder="ex. 44140">
                        </div>
                        <div class="col-md-6">
                            <label for="ademail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="ademail"
                                   placeholder="ex. jean.domenech@diginamic.com">
                        </div>
                        <div class="col-md-6">
                            <label for="tel" class="form-label">Téléphone</label>
                            <input type="email" class="form-control" id="tel" placeholder="ex. 07 46 37 81 92">
                        </div>
                        <div class="col-md-12">
                            <label for="Raisoncontact" class="form-label">Région</label>
                            <select id="Raisoncontact" class="form-select">
                                <option selected>Choisir...</option>
                                <option>Je veux avoir des informations concernant un produit</option>
                                <option>Je souhaite rencontrer un commercial</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Description de votre projet:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="formFile" class="form-label">Télécharger un fichier</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
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

