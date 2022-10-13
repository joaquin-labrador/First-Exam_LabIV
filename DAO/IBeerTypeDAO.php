<?php

namespace DAO;
use Model\BeerType as BeerType;
interface IBeerTypeDAO
{
    public function Add(BeerType $beerType);
    public function GetAll();
    public function GetByBeerTypeId($beerTypeId);
}