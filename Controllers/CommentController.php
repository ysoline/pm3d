<?php

class CommentController

{
    /**
     * Ajout de commentaire
     *
     * @param mixed $post_id
     * @return void
     */
    public function addComment()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['comment'])) {
                $commentManager = new CommentManager;
                $affectedLines = $commentManager->addComment($_GET['id'], $_SESSION['id_user'], htmlspecialchars($_POST['comment']));
                header('Location: article&id=' . $_GET['id']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        } else {
            throw new Exception('Post introuvable !');
        }
    }

    /**
     * Edition de commentaire
     *
     * @param mixed $post_id
     * @param mixed $id_user
     * @return void
     */
    public function updateComment()
    {
        $commentManager = new CommentManager;
        $checkIdUser = $commentManager->getComment($_GET['id']);

        if ($checkIdUser['id_user'] == $_SESSION['id_user']) {
            if (!empty($_POST['updateComment'])) {

                $updateComment = $commentManager->updateComment(htmlspecialchars($_POST['updateComment']), $_GET['id']);
                header('Location: ./');
            } else {
                throw new Exception('Impossible de modifier le commentaire');
            }
        } else {
            throw new Exception("Vous n'avez l'autorisation de faire ceci");
        }
    }

    /**
     * Recuperation d'un commentaire
     *
     * @param mixed $post_id
     * @param mixed $id
     * @param mixed $id_user
     * @return void
     */
    public function comment()
    {
        $commentManager = new CommentManager;
        $getAuthor = $commentManager->getAuthor($_GET['id']);
        $comment = $commentManager->getComment($_GET['id']);
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if ($comment['published'] == 1) {
                require('Views/Frontend/commentView.php');
                return $getAuthor;
            } else {
                throw new Exception('Aucun commentaire trouvé');
            }
        } else {
            throw new Exception('Commentaire introuvable !');
        }
    }

    /**
     * Redirection vers page d'un commentaire pour édition de celui ci
     *
     * @return void
     */
    public function getCommentPage()
    {
        require('Views/Frontend/commentView.php');
    }

    /**
     * Suppression d'un commentaire
     *
     * @return void
     */
    public function deleteComment()
    {
        $commentManager = new CommentManager;
        $checkIdUser = $commentManager->getComment($_GET['id']);
        if ($checkIdUser['id_user'] == $_SESSION['id_user']) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (htmlspecialchars($_POST['deleteCom']) == 'SUPPRIMER') {
                    $deleteCom = $commentManager->deleteComment($_GET['id']);
                    header('Location: ./');
                } else {
                    throw new Exception('Vous ne pouvez pas supprimer le commentaire');
                }
            } else {
                throw new Exception('Commentaire introuvable !');
            }
        } else {
            throw new Exception("Vous n'avez l'autorisation de faire ceci");
        }
    }

    /**
     * Signalement d'un commentaire
     *
     * @return void
     */
    public function reportComment()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $commentManager = new CommentManager;
            $getComment = $commentManager->getComment($_GET['id']);
            if ($getComment['report'] == 0) {
                $reportCom = $commentManager->reportComment($_GET['id']);
                header('Location: ./');
            } else {
                throw new Exception('Commentaire déjà signalé');
            }
        } else {
            throw new Exception('Aucun commentaire trouvé');
        }
    }
}