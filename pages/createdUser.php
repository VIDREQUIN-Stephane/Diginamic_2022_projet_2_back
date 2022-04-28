<?php
if ($is_connected === false) {
    header('location: http://localhost/template/index.php');
}
?>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Formulaire de contact</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!--ensemble des champs présents dans le formulaire modal-->

                <form class="row g-3">
                    <p>Ma demande concerne :</p>
                    <div class="d-flex justify-content-around my-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                   id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Une entreprise ou une
                                collectivité</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                   id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Un syndic de copropriété</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                   id="inlineRadio3" value="option2">
                            <label class="form-check-label" for="inlineRadio3">Un projet pour
                                particulier</label>
                        </div>
                    </div>
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
                <button type="button" class="btn btn-primary">Envoyer ma demande</button>
            </div>
        </div>

    </div>
</div>