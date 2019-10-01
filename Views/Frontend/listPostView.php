<?php ob_start(); ?>

<div class="row mb-2">
    <div class="col-lg-10 m-auto">
        <?php foreach ($posts as $post) { ?>
            <div class='border rounded overflow-hidden mb-4 shadow-sm h-md-250 justify-content-center p-3  bg-light'>
                <div class="flex-nowrap text-center">
                    <h2 class='d-inline-block mb-2 text-secondary'><?= $post['title'] ?></h2>
                </div>
                <div class="mb-1 text-muted"><small><?= $post['date_creation_fr'] ?></small></div>
                <p class="card-text mb-auto"><?= substr($post['post'], 0, 400); ?>...</p>
                <hr class="my-3">
                <div class="lead d-flex justify-content-center">
                    <a class="btn btn-sm btn-outline-primary mb-1" href="article&amp;id=<?= $post['id']; ?>" role="button">Lire la suite</a>
                </div>

            </div>
        <?php }
        ?>
        <div class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="<?php if ($current == '1') {
                                echo "disabled";
                            } ?> page-item">
                    <a href="?p=<?php if ($current != '1') {
                                    echo $current - 1;
                                } else {
                                    echo $current;
                                } ?>" class="page-link">&laquo;</a></li>

                <?php
                for ($i = 1; $i <= $nbPage; $i++) {
                    if ($i == $current) {
                        ?><li class="active page-item"><a href="?p=<?= $i ?>" class="page-link"><?= $i ?></a></li>


                    <?php } else {
                            ?>
                        <li class="page-item"><a href="?p=<?= $i ?>" class="page-link"><?= $i ?></a></li>
                <?php }
                } ?>


                <li class="<?php if ($current == $nbPage) {
                                echo "disabled";
                            } ?> page-item">
                    <a href="?p=<?php if ($current != $nbPage) {
                                    echo $current + 1;
                                } else {
                                    echo $current;
                                } ?>" class="page-link">&raquo;</a>
                </li>

            </ul>
        </div>
    </div>
</div>
<?php

$content = ob_get_clean();
require('Views/Frontend/template.php');
?>