<?php $title ?>

<?php ob_start(); ?>

<div class="blog-post  bg-light my-3 rounded p-3">
    <h2 class="blog-post-title text-center"><?= $post['title'] ?></h2>
    <p class="blog-post-meta text-muted"><?= $post['date_creation_fr'] ?></p>
    <p><?= $post['post'] ?></p>
</div>

<div class="bg-light my-4 p-3 rounded">
    <h3>Commentaires :</h3>

    <?php if (isset($_SESSION['id_user'])) { ?>
    <hr class="my-4">
    <h5 class="text-muted">Ajouter un commentaire</h5>

    <form action="ajouterCommentaire&amp;id=<?= $post['id'] ?>" method="post">
        <div class='d-flex justify-content-center flex-column'>
            <h6 for="author"><?= strtoupper($_SESSION['pseudo']); ?></h6>
        </div>

        <div class='d-flex justify-content-center flex-column mt-2'>
            <label for="comment">Commentaire :</label><br />
            <textarea id="comment" name="comment" required></textarea>
        </div>

        <div class="row justify-content-md-center mt-3 mb-2">
            <input class="btn btn-sm btn-outline-primary" type="submit" onclick='postCom()'>
        </div>
    </form>
    <?php } else { ?>
    <div class="alert alert-danger col-sm-8 col-lg-3" id='comment'>
        <small> Vous devez être connecté pour ajouter un commentaire. <a href="connexion" class="alert-link"> Se
                connecter</a></small>
    </div>

    <?php } ?>
</div>


<?php foreach ($comments as $comment) { ?>
<div class="p-3 m-4 rounded bg-light">
    <div class="d-flex justify-content-between">
        <h6> par <?= strtoupper($comment['pseudo']) ?></h6>
        <small class="text-muted text-danger"><?= $comment['comment_date_fr'] ?></small>
    </div>

    <p class="lead pl-4"><?= $comment['comment'] ?></p>
    <div class="d-flex justify-content-between">
        <a class="btn btn-outline-danger" href='reporterCommentaire&amp;id=<?= $comment['id']; ?>'>Signaler</a>
        <?php if (isset($_SESSION['id_user'])) {
                    if ($_SESSION['id_user'] == $comment['id_user']) { ?>
        <a class="btn btn-outline-success" href="commentaire&amp;id=<?= $comment['id']; ?>">Modifier</a>
        <?php }
                }  ?>

    </div>
</div>

<?php
} ?>
<?php $content = ob_get_clean();
require('Views/Frontend/template.php');
?>