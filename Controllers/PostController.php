<?php
class PostController
{
    /**
     * Recupere tous les articles
     *
     * @return void
     */
    public function listPosts()
    {
        $perPage = 4; //Affiche 4 articles par pages

        $postManager = new PostManager();
        $totalPost = $postManager->paging();

        $nbPage = ceil($totalPost / $perPage);

        if (isset($_GET['p']) && !empty($_GET['p']) && ctype_digit($_GET['p']) == 1) {
            if ($_GET['p'] > $nbPage) {
                $current = $nbPage;
            } else {
                $current = $_GET['p'];
            }
        } else {
            $current = 1;
        }

        $firstOfPage = ($current - 1) * $perPage;

        $posts = $postManager->getPostsPaging($firstOfPage, $perPage);
        require('Views/Frontend/listPostView.php');
    }
    /**
     * Recupere un article grace à son idée
     *
     * @return void
     */
    public function post()
    {
        $postManager = new PostManager;
        $commentManager = new CommentManager;
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $post = $postManager->getPost($_GET['id']);
            $comments = $commentManager->getComments($_GET['id']);
            require('Views/Frontend/postView.php');
            return $comments;
        } else {
            throw new Exception("Article introuvable !");
        }
    }
    /**
     * Ajout d'un article
     *
     * @return void
     */
    public function addPost()
    {
        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        if ($_SESSION['id_user'] == $infoUser['id'] and $infoUser['rank_id'] == 1) {
            if (!empty($_POST['title']) && !empty($_POST['post'])) {
                $addPost = new PostManager;
                $addPost->addPost(htmlspecialchars($_POST['title']), ($_POST['post']));
                header('Location: administration');
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }
    /**
     * Edition d'un article
     *
     * @return void
     */
    public function updatePost()
    {
        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        if ($_SESSION['id_user'] == $infoUser['id'] and $infoUser['rank_id'] == 1) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $postManager = new PostManager;
                $updatePost = $postManager->updatePost($_GET['id'], htmlspecialchars($_POST['titleEdit']), ($_POST['postEdit']));
                header('Location: administration');
            } else {
                throw new Exception("Article introuvable !");
            }
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }
    /**
     * Acces page d'édition d'article (Recuperation article)
     *
     * @return void
     */
    public function updatePostPage()
    {
        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        if ($_SESSION['id_user'] == $infoUser['id'] and $infoUser['rank_id'] == 1) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $postManager = new PostManager;
                $post = $postManager->getPost($_GET['id']);
                require('Views/Backend/editPostView.php');
            } else {
                throw new Exception("Article introuvable !");
            }
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }
    /**
     * Supression d'un article
     *
     * @return void
     */
    public function deletePost()
    {
        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        $deletePost = new PostManager;
        $deleteCom = new CommentManager;
        if ($_SESSION['id_user'] == $infoUser['id'] and $infoUser['rank_id'] == 1) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (htmlspecialchars($_POST['deletePost']) == 'SUPPRIMER') {
                    $deleteCom->delPostCom($_GET['id']);
                    $deletePost->deletePost($_GET['id']);
                    header('Location: administration');
                } else {
                    throw new Exception('Vous ne pouvez pas supprimer l\'article');
                }
            } else {
                throw new Exception("Article introuvable !");
            }
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }
    /**
     * Redirection page ajout d'article
     *
     * @return void
     */
    public function postPage()
    {
        require('Views/Backend/addPostView.php');
    }
}