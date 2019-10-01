<?php ob_start(); ?>
<h2 class='text-center my-3'>Inscription</h2>

<div class='d-flex justify-content-center'>
    <form class="form-signin" action='inscrit' method="post">

        <div class="flex-nowrap justify-content-center">
            <div class=" d-flex justify-content-end mb-2">
                <label for="pseudo" class="sr-only">Pseudo : </label>
                <input type="text" id="pseudo" class="form-control" name="pseudo" placeholder="Pseudo" required autofocus>
            </div>

            <div class=" d-flex justify-content-end mb-2">
                <label for="password" class="sr-only">Mot de passe : </label>
                <input type="password" id="pass" class="form-control" name="pass" placeholder="Mot de passe" required>
            </div>
            <div class=" d-flex justify-content-end mb-2">
                <label for="password" class="sr-only">Confirmation mot de passe : </label>
                <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Confirmer mot de passe" required>
            </div>

            <div class=" d-flex justify-content-end mb-2">
                <label for="email" class="sr-only">Mail : </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>

            <div class=" d-flex justify-content-end mb-2">
                <label for="email" class="sr-only">Confirmation mail : </label>
                <input type="email" class="form-control" id="email2" name="email2" placeholder="Confirmer email" required>
            </div>

            <div class="d-flex justify-content-center mt-2">

                <input type="submit" value="S'incrire" class='btn btn-primary btn'>
            </div>
        </div>
    </form>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>