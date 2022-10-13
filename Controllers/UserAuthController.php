<?php

namespace Controllers;

use DAO\UserDAO as UserDAO;

class UserAuthController
{
    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    public function Login($email, $password)
    {
        $user = $this->userDAO->GetByEmail($email);
        if ($_POST) {
            $_SESSION["loggedUser"] = null;
            if (isset($user)) {
                if ($user->getPassword() == $password) {
                    $_SESSION["loggedUser"] = $user;
                    header("location:" . FRONT_ROOT . "BeerAdd/Index");
                } else {
                    $_SESSION["error"] = "Email o contraseña incorrectos";
                    header("location: " . FRONT_ROOT . "Home/Index");
                }
            } else {
                $_SESSION["error"] = "Email o contraseña incorrectos";
                header("location: " . FRONT_ROOT . "Home/Index");
            }
        }else {
            header("location: " . FRONT_ROOT . "Home/Index");
        }
    }

    public function Logout()
    {
        require_once(VIEWS_PATH . "logout.php");
    }

}