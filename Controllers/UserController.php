<?php

class UserController
{
    /**
     * Redirection vers la page profil
     *
     * @return void
     */
    public function profilPage()
    {
        $user = new UserManager;
        $getUser = $user->getInfo($_SESSION['id_user']);
        require('Views/Frontend/profilVIew.php');
        return $getUser;
    }

    /**
     * Edition du Pseudo
     *
     * @return void
     */
    public function updatePseudo()
    {
        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        $userCheck = $userManager->getPseudo(($_POST['pseudo']));

        if ($_SESSION['id_user'] == $infoUser['id']) {
            if (!empty($_POST['pseudo'])) {
                if ($userCheck == 0) {
                    $changePseudo = $userManager->updatePseudo($_SESSION['id_user'], $_POST['pseudo']);
                    header('Location: profil');
                } else {
                    throw new Exception('Pseudo déjà utilisé <a href="profil">Réessayer</a>');
                }
            } else {
                throw new Exception('Veuillir remplir tout les champs <a href="profil">Réessayer</a>');
            }
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }
    /**
     * Edition du Pseudo
     *
     * @return void
     */
    public function updateMail()
    {
        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        $userMail = $userManager->getMail(($_POST['email']));

        if ($_SESSION['id_user'] == $infoUser['id']) {
            if (!empty($_POST['email'])) {
                if ($userMail == 0) {
                    $changeMail = $userManager->updateMail($_SESSION['id_user'], $_POST['email']);
                    header('Location: profil');
                } else {
                    throw new Exception('Email déjà utilisé <a href="profil">Réessayer</a>');
                }
            } else {
                throw new Exception('Veuillir remplir tout les champs <a href="profil">Réessayer</a>');
            }
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }
    /**
     * Edition du mot de passe
     *
     * @return void
     */
    public function updatePass()
    {
        $userManager = new UserManager;

        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        if ($_SESSION['id_user'] == $infoUser['id']) {
            if (!empty($_POST['pass']) && !empty($_POST['pass2'])) {
                if ($_POST['pass'] == $_POST['pass2']) {
                    $_POST['pass'] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                    $changePseudo = $userManager->updatePass($_GET['id'], $_POST['pass']);
                    header('Location: profil');
                } else {
                    throw new Exception('Les mots de passe ne sont pas identiques <br/><a href="profil">Retour</a>');
                }
            } else {
                throw new Exception('Veuillir remplir tout les champs <a href="profil">Réessayer</a>');
            }
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }
    /**
     * Suppression d'un compte utilisateur
     *
     * @return void
     */
    public function deleteUser()
    {
        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        if ($_SESSION['id_user'] == $infoUser['id']) {
            if ($_POST['deleteUser'] == "SUPPRIMER") {
                $deleteUser = $userManager->deleteUser($_SESSION['id_user']);
                header('Location: profil');
            } else {
                throw new Exception('Impossible de supprimer le compte');
            }
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }
}