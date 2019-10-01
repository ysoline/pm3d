<?php

class Manager
{
    protected function dbConnect()
    {
        //INSTANCIE LA CONNEXION
        $_bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        $_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        return $_bdd;
    }
}
