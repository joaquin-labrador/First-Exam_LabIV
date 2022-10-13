<?php

namespace Controllers;

use Model\Beer as Beer;
use DAO\BeerDAO as BeerDAO;
use DAO\BeerTypeDAO as BeerTypeDAO;

class BeerController
{
    private $beerDAO;
    private $beerTypeDAO;

    public function __construct()
    {
        $this->beerDAO = new BeerDAO();
        $this->beerTypeDAO = new BeerTypeDAO();
    }

    public function AddForm($idType, $name, $IBU, $price)
    {

        if ($_POST && isset($_SESSION["loggedUser"])) {
            $beer = new Beer();
            $beer->setBeerTypeId($idType);
            $beer->setName($name);
            $beer->setIBU($IBU);
            $beer->setPrice($price);
            if ($this->verifyBeer($beer) == true) {
                $this->beerDAO->Add($beer);
                $_SESSION["success"] = "Cerveza agregada con exito";
            } else {
                $_SESSION["error"] = "Todos los campos son obligatorios";
            }
            header("location:" . FRONT_ROOT . "BeerAdd/Index");

        } else {
            $_SESSION["error"] = "Debe iniciar sesion para acceder a esta seccion";
            header("location: " . FRONT_ROOT . "Home/Index");
        }

    }

    private function verifyBeer($beer)
    {
        if ($beer->getBeerTypeId() == null || $beer->getName() == null || $beer->getIBU() == null || $beer->getPrice() == null) {
            return false;
        }
        return true;
    }

}
