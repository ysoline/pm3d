<?php


require('Autoloader.php');
Autoloader::register();

session_start();


$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

try {

    switch ($action) {
            /////////////////////////////////////// Accueil ///////////////////////////////////////

        case '':
            $posts = new PostController;
            $posts->listPosts();
            break;

            /////////////////////////////////////// Articles ///////////////////////////////////////

        case 'article': //Liste tous les articles
            $post = new PostController;
            $post->post();
            break;

        case "publierArticle": //Action ajouter article
            $addPost = new PostController;
            $addPost->addPost($_POST['title'], $_POST['post']);
            break;

        case "ajouterArticle": //Page ajout article
            $addPost = new PostController;
            $addPost->postPage();
            break;

        case 'supprimerArticle': //Supprime l'article selectionner
            $deletePost = new PostController;
            $deletePost->deletePost($_GET['id']);
            break;

        case 'editionArticle': //Page d'edition d'article
            $editPPage = new PostController;
            $editPPage->updatePostPage($_GET['id']);
            break;

        case 'editerArticle': //action editer un article
            $updatePost = new PostController;
            $updatePost->updatePost($_GET['id'], $_POST['title'], $_POST['post']);
            break;

            /////////////////////////////////////// Commentaires ///////////////////////////////////////
        case 'ajouterCommentaire': //Action ajouter un commentaire
            $affectedLines = new CommentController;
            $affectedLines->addComment($_GET['id'], $_SESSION['id_user'], $_POST['comment']);
            break;

        case 'commentaire': //Recupere un commentaire
            $comment = new CommentController;
            $comment->comment($_GET['id']);
            break;

        case 'editionCommentaire': //Edition d'un commentaire
            $updateComment = new CommentController;
            $updateComment->updateComment($_POST['updateComment'], $_GET['id']);
            break;


        case 'supprimerCommentaire': //Suppression d'un commentaire
            $deleteComment = new CommentController;
            $deleteComment->deleteComment($_GET['id']);
            break;

        case 'reporterCommentaire': //Signalement d'un commentaire

            $reportCom = new CommentController;
            $reportCom->reportComment($_GET['id']);
            break;

            /////////////////////////////////////// Administrations ///////////////////////////////////////
        case 'administration': //Acces au panel d'administration
            $adminPanel = new AdminController;
            $adminPanel->adminPanel();
            break;

        case 'validerCommentaire': //Supprimer le signalement d'un commentaire
            $resetReport = new AdminController;
            $resetReport->resetReport($_GET['id']);
            break;

        case 'publierCommentaire': //Re publie un commentaire qui a ete archiver
            $published = new AdminController;
            $published->published($_GET['id']);
            break;

        case 'archiverCommentaire': // Artchive un commentaire remonter par signalement
            $unpublished = new AdminController;
            $unpublished->getUnpublished($_GET['id']);
            break;

            /////////////////////////////////////// Authentification ///////////////////////////////////////
        case 'connexion': //Acces page de connection
            $authUser = new AuthController;
            $authUser->connectPage();
            break;

        case 'connecter': //Action de se connecter
            $coUser = new AuthController;
            $coUser->login($_POST['pseudo'], $_POST['pass']);
            break;

        case 'deconnexion': //Action de se déconnecter
            $disconnect = new AuthController;
            $disconnect->disconnect();
            break;

        case 'inscription': //Acces a la page d'inscription
            $suscribeUser = new AuthController;
            $suscribeUser->suscribePage();
            break;

        case 'inscrit': //Action de s'inscrire
            $newUser = new AuthController;
            $newUser->newUser($_POST['pseudo'], $_POST['pass'], $_POST['pass2'], $_POST['email'], $_POST['email2']);
            break;

        case 'profil': //Acces a la page de profil utilisateur
            $profil = new UserController;
            $profil->profilPage($_SESSION['id_user']);
            break;
            /////////////////////////////////////// Profil ///////////////////////////////////////

        case 'editionPseudo': //Action d'edition du pseudo
            $updatePseudo = new UserController;
            $updatePseudo->updatePseudo($_SESSION['id_user'], $_POST['pseudo']);
            break;

        case 'editionMail': //Action d'edition de l'adresse email
            $updateMail = new UserController;
            $updateMail->updateMail($_SESSION['id_user'], $_POST['email']);
            break;

        case 'editionMdp': //Action d'edition du mot de passe
            $updatePass = new UserController;
            $updatePass->updatePass($_SESSION['id_user'], $_POST['pass']);
            break;

        case 'suppressionCompte': //Action de supprimer definitivement un compte utilisateur, deconnecte en meme temps
            $deleteUser = new UserController;
            $deleteUser->deleteUser($_SESSION['id_user']);

            $disconnect = new AuthController;
            $disconnect->disconnect();
            break;
        case 'mentionslegales':
            require 'Views/Frontend/mentionslegales.php';
            break;

        default:
            require 'Views/Frontend/404.php';
            break;
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('Views/Frontend/error.php');
}
