<?php

namespace Controllers;

use DAO\BeerDAO as BeerDAO;
use DAO\BeerTypeDAO as BeerTypeDAO;
use Model\Beer as Beer;

class BeerListController
{
    private $beerDAO;
    private $beerTypeDAO;

    public function __construct()
    {
        $this->beerDAO = new BeerDAO();
        $this->beerTypeDAO = new BeerTypeDAO();
    }

    public function BeerList()
    {
        if(isset($_SESSION["loggedUser"])){
            $beerList = $this->beerDAO->GetAll();
            require_once(VIEWS_PATH."beer-list.php");
        }else{
            $_SESSION["error"] = "Debe iniciar sesion para acceder a esta seccion";
            header("location: " . FRONT_ROOT . "Home/Index");
        }

    }
}