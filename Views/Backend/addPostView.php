<?php ob_start(); ?>

<form action="publierArticle" method="POST">
    <legend>Ajout de billet :</legend>
    <input type="text" id="title" name="title" placeholder="Titre de l'article" required> <br />
    <br />
    <textarea id="post" name="post"></textarea>
    <br />
    <input type="submit" class="btn btn-primary" value="Publier" onclick="check_addPost()">
</form>

<?php $content = ob_get_clean(); ?>

<?php require('Views/Frontend/template.php'); ?>