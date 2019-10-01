<?php ob_start(); ?>



<div class="d-flex flex-column text-center">
    <h4>Mes informations :</h4>
    <p>Pseudo : <?= strtoupper($getUser['pseudo']) ?></p>
    <p>Email : <?= $getUser['email'] ?></p>
</div>

<div class="my-3">
    <h4 class="text-center">Modifier mes informations :</h4>
    <div class='d-flex justify-content-center'>

        <form class="form-signin" action="editionPseudo" method='POST'>

            <div class="d-flex justify-content-end mb-2 align-items-center">
                <label>Nouveau Pseudo :</label>
                <input class="form-control" type="text" id="pseudo" name="pseudo" required>
                <input type="submit" class='btn btn-primary ml-2' value="Modifier">
            </div>
        </form>
    </div>
    <div class='d-flex justify-content-center'>
        <form class="form-signin" action="editionMail" method='POST'>

            <div class=" d-flex justify-content-end mb-2 align-items-center">
                <label>Nouvel email :</label>
                <input class="form-control" type="email" id="email" name="email" required>
                <input type="submit" class='btn btn-primary ml-2' value="Modifier">
            </div>
        </form>
    </div>
</div>
<div class="my-3">

    <h4 class="text-center">Modifier mon mot de passe :</h4>
    <div class='d-flex justify-content-center'>

        <form class="form-signin" action="editionMdp" method='POST'>

            <div class="flex-nowrap justify-content-center">

                <div class=" d-flex justify-content-end mb-2">
                    <label class="sr-only">Nouveau mot de passe :</label>
                    <input class="mt-2 form-control" type="password" id="pass" name="pass" placeholder="Mot de passe"
                        required>
                </div>

                <div class=" d-flex justify-content-end mb-2">
                    <label class="sr-only">Confirmation mot de passe :</label>
                    <input class="mt-2 form-control" type="password" id="pass2" name="pass2"
                        placeholder="Confirmer mot de passe" required>
                </div>

                <div class="d-flex justify-content-center mt-2">
                    <input type="submit" class='btn btn-primary' value="Modifier">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="my-3 d-flex flex-column align-items-center">
    <h4 class="text-center">Supprimer mon compte :</h4>


    <div class="card border-danger mb-3" style="max-width: 20rem;">
        <div class="card-header">Suppression du commentaire</div>
        <div class="card-body text-center">
            <form action="suppressionCompte" method="post">
                <label>Veuillez confirmer la suppression en écrivant "SUPPRIMER"</label>
                <input id="deleteUser" name="deleteUser" required><br />
                <small class='text-danger'>Attention, cette action est irréverssible </small><br />
                <input class='btn btn-outline-danger' type="submit" value="Supprimer" onclick="check_formUser()">
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>