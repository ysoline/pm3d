<?php ob_start(); ?>

<div class="container-fluid">
    <div class="row">
        <div class='col-lg-6 bg-light rounded p-3 mx-2'>

            <div class="mb-3 text-center">
                <h3> Gestion des billets </h3>
            </div>
            <div class="d-flex justify-content-center mb-3">

                <a class="btn btn-outline-primary" href="ajouterArticle"><i class="fas fa-plus"></i> Ajouter
                    un billet</a>
            </div>
            <hr class="my-4">
            <div class="m-3">
                <h4 class="text-primary">Billets :</h4>
                <?php foreach ($findPost as $post) { ?>
                <h5><?= $post['title'] ?></h5>
                <p class="lead"><?= substr($post['post'], 0, 70); ?>...</p>
                <div class="lead d-flex justify-content-around">
                    <a class="btn btn-outline-primary btn" href="article&amp;id=<?= $post['id']; ?>" role="button">Lire
                        la suite</a>
                    <a class="btn btn-success" href="editionArticle&amp;id=<?= $post['id']; ?>"
                        role="button">Modifier</a>
                </div>
                <hr class="my-4">
                <?php } ?>
            </div>

        </div>
        <div class='col lg-6 '>
            <div class='border rounded'>
                <div class="bg-light rounded p-3">
                    <div class="mb-3 text-center">
                        <h3>Gestion des commentaires</h3>
                    </div>
                    <h5 class="text-danger m-3">Commentaires signalés :</h5>

                    <?php foreach ($commentReport as $comment) { ?>
                    <div class="m-3">
                        <h6> par <?= strtoupper($comment['pseudo']) ?></h6>
                        <p class="lead"><?= $comment['comment'] ?></p>
                        <p><?= $comment['comment_date_fr']; ?></p>

                        <a href="archiverCommentaire&amp;id=<?= $comment['c_id']; ?>"
                            class="btn btn-outline-danger btn-sm" onclick='unpublished()'>Désapprouver</a>
                        <a href="validerCommentaire&amp;id=<?= $comment['c_id']; ?>"
                            class="btn btn-outline-success btn-sm" onclick="commentOk()">Approuver</a>
                        <hr class="my-4 bg-danger">
                    </div>

                    <?php } ?>
                </div>
                <div class="bg-light rounded p-3 mt-2">
                    <hr class="my-4">
                    <h5 class="text-warning m-3">Commentaires désapprouvés :</h5>

                    <?php foreach ($unpublished as $Uncomment) { ?>
                    <div class="m-3">
                        <h6> par <?= strtoupper($Uncomment['pseudo']) ?></h6>
                        <p class="lead"><?= $Uncomment['comment'] ?></p>
                        <p><?= $Uncomment['comment_date_fr']; ?></p>
                        <a href="publierCommentaire&amp;id=<?= $Uncomment['c_id']; ?>"
                            class="btn btn-outline-success btn-sm" onclick="published()">Re-Publier</a>
                        <hr class="my-4 bg-warning">
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require('Views/Frontend/template.php');
?>