<?php
class AuthController
{
    /**
     * Inscription d'un utilisateur
     * @return void
     */
    public function newUser()
    {
        $userManager = new UserManager;
        $userCheck = $userManager->getPseudo(($_POST['pseudo']));
        $userMail = $userManager->getMail(($_POST['email']));
        $passHach = ($_POST['pass']);
        if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['pass2']) && !empty($_POST['email']) && !empty($_POST['email2'])) {
            if ($userCheck == 0) {
                if ($_POST['pass'] == $_POST['pass2']) {
                    if ($userMail == 0) {
                        if ($_POST['email'] == $_POST['email2']) {
                            $passHach = password_hash($passHach, PASSWORD_DEFAULT);
                            $newUser = $userManager->addUser(htmlspecialchars($_POST['pseudo']), $passHach, htmlspecialchars($_POST['email']));
                            header('Location: ./');
                        } else {
                            throw new Exception("Les adresses emails ne sont pas identiques <a href='inscription' class='btn btn-outline-secondary btn-sm'>Réessayer ?</a>");
                        }
                    } else {
                        throw new Exception("l'adresse email est déjà utilisée  <a href='inscription' class='btn btn-outline-secondary btn-sm'>Réessayer ?</a>");
                    }
                } else {
                    throw new Exception("Les mots de passes ne sont pas identiques  <a href='inscription' class='btn btn-outline-secondary btn-sm'>Réessayer ?</a>");
                }
            } else {
                throw new Exception("Le pseudo est déjà utilisé  <a href='inscription' class='btn btn-outline-secondary btn-sm'>Réessayer ?</a>");
            }
        } else {
            throw new Exception('Veuillez remplir tout les champs !');
        }
    }
    /**
     * Connexion utilisateur
     * @return void
     */
    public function login()
    {
        $userManager = new UserManager;
        if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
            $user = $userManager->getPseudo(htmlspecialchars($_POST['pseudo']));
            $passOk = password_verify(htmlspecialchars($_POST['pass']), htmlspecialchars($user['pass']));
            if ($passOk) {
                $_SESSION['id_user'] = $user['id'];
                $_SESSION['rank_id'] = $user['rank_id'];
                $_SESSION['pseudo'] = $user['pseudo'];
                header('Location: ./');
            } else {
                throw new Exception("Mauvais identifiant ou mot de passe <a href='connexion' class='btn btn-outline-secondary btn-sm'>Réessayer ?</a>");
            }
        } else {
            throw new Exception("Veuillez remplir tout les champs");
        }
    }
    /**
     * Renvoie la page de connexion
     *
     * @return void
     */
    public function connectPage() //Redirection page connexion
    {
        require('Views/Frontend/authView.php');
    }
    /**
     * Renvoi la page d'inscription
     *
     * @return void
     */
    public function suscribePage() //Redirection page inscription
    {
        require('Views/Frontend/suscribeView.php');
    }
    /**
     * Déconnection
     *
     * @return void
     */
    public function disconnect()
    {
        session_unset();
        session_destroy();
        header('Location: ./');
    }
}