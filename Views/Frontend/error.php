<?php $title ?>

<?php ob_start(); ?>
<div class="d-flex flex-column align-items-center">
    <p class="text-center d-flex flex-column"><?= $errorMessage ?></p>

    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ?>
    <?php $errorMessage = 'Il s\'est produit une erreur' ?>
    <a href="./" class="btn btn-outline-secondary">Accueil</a>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>