<?php

namespace Model;

class BeerType
{
    private $beerTypeId;
    private $description;

    public function getBeerTypeId()
    {
        return $this->beerTypeId;
    }

    public function setBeerTypeId($beerTypeId)
    {
        $this->beerTypeId = $beerTypeId;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
}