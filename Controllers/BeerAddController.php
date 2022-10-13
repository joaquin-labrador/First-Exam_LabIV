<?php

namespace Controllers;
use DAO\BeerTypeDAO as BeerTypeDAO;
class BeerAddController
{
    private $beerTypeDAO;
    private $beerTypeList;

    public function __construct()
    {
        $this->beerTypeDAO = new BeerTypeDAO();
        $this->beerTypeList = $this->beerTypeDAO->GetAll();
    }

    public function Index()
    {
        require_once(VIEWS_PATH."beer-add.php");
    }

}