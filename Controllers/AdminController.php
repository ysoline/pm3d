<?php
class AdminController
{
    /**
     * Recupere les billets pour affichage partie administration
     *
     * @return void
     */
    public function adminPanel()
    {
        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        if ($_SESSION['id_user'] == $infoUser['id'] and $infoUser['rank_id'] == 1) {
            $postManager = new PostManager;
            $commentManager = new CommentManager;
            $findPost = $postManager->getPosts();
            $commentReport = $commentManager->getReport();
            $unpublished = $commentManager->getUnpublished();
            require('Views/Backend/panelAdminView.php');
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }
    /**
     * N'affiche plus un commentaire qui a ete signale
     *
     * @return void
     */
    public function published()
    {
        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        if ($_SESSION['id_user'] == $infoUser['id'] and $infoUser['rank_id'] == 1) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {

                $commentManager = new CommentManager;
                $unpublished = $commentManager->published($_GET['id']);
                $resetReport = $commentManager->resetReport($_GET['id']);
                header('Location: administration');
            } else {
                throw new Exception('Impossible de trouvé le commentaire');
            }
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }
    /**
     * Reset le signalement d'un commentaire
     *
     * @return void
     */
    public function resetReport()
    {
        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        if ($_SESSION['id_user'] == $infoUser['id'] and $infoUser['rank_id'] == 1) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $commentManager = new CommentManager;
                $resetReport = $commentManager->resetReport($_GET['id']);
                header('Location: administration');
            } else {
                throw new Exception('Impossible de trouvé le commentaire');
            }
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }
    /**
     * Archive un commentaire prealablement signale
     *
     * @return void
     */
    public function getUnpublished()
    {
        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        if ($_SESSION['id_user'] == $infoUser['id'] and $infoUser['rank_id'] == 1) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $commentManager = new CommentManager;
                $unpublished = $commentManager->unpublished($_GET['id']);
                header('Location: administration');
            } else {
                throw new Exception('Impossible de trouvé le commentaire');
            }
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }
}
