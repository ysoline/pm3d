<?php ob_start(); ?>

<form action="editerArticle&amp;id=<?= $post['id']; ?>" method="POST">
    <legend>Edition de billet :</legend>
    <input type="text" id="titleEdit" name="titleEdit" required value="<?= $post['title'] ?>">
    <br />
    <br />
    <textarea id="postEdit" name="postEdit"><?= $post['post'] ?></textarea>
    <br />
    <input type="submit" class="btn btn-primary" value="Publier" onclick="check_editPost()">
</form>

<div class="card border-danger m-3" style="max-width: 20rem;">
    <div class="card-header">Suppression du post</div>
    <div class="card-body">
        <form action="supprimerArticle&amp;id=<?= $post['id']; ?>" method="post">
            <label>Veuillez confirmer la suppression en écrivant "SUPPRIMER"</label>
            <input id="deletePost" name="deletePost" required><br />
            <small class='text-danger'>Attention, cette action est irréverssible </small><br />
            <input class='btn btn-outline-danger' type="submit" value="Supprimer" onclick="check_formPost()">
        </form>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('Views/Frontend/template.php'); ?>