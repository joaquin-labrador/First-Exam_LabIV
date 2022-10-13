<?php

namespace Model;

class Beer
{
    private $beerId;
    private $beerTypeId;
    private $name;
    private $IBU;
    private $price;


    public function getBeerId()
    {
        return $this->beerId;
    }


    public function setBeerId($beerId)
    {
        $this->beerId = $beerId;
    }


    public function getBeerTypeId()
    {
        return $this->beerTypeId;
    }

    public function setBeerTypeId($beerTypeId)
    {
        $this->beerTypeId = $beerTypeId;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }


    public function getIBU()
    {
        return $this->IBU;
    }


    public function setIBU($IBU)
    {
        $this->IBU = $IBU;
    }


    public function getPrice()
    {
        return $this->price;
    }


    public function setPrice($price)
    {
        $this->price = $price;
    }


}
?>