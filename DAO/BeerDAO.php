<?php

namespace DAO;
use DAO\IBeerDAO as IBeerDAO;
use Model\Beer as Beer;
class BeerDAO implements IBeerDAO
{
    private $beerList = array();
    private $fileName = ROOT . "Data/beers.json";

    private function SaveData()
    {
        $arrayToEncode = array();

        foreach ($this->beerList as $value) {
            $valuesArray["beerId"] = $value->getBeerId();
            $valuesArray["beerTypeId"] = $value->getBeerTypeId();
            $valuesArray["name"] = $value->getName();
            $valuesArray["IBU"] = $value->getIBU();
            $valuesArray["price"] = $value->getPrice();
            array_push($arrayToEncode, $valuesArray);
        }
        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        file_put_contents($this->fileName, $jsonContent);


    }

    private function RetrieveData()
    {
        $this->beerList = array();

        if (file_exists($this->fileName)) {
            $jsonContent = file_get_contents($this->fileName);

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach ($arrayToDecode as $value) {
                $beer = new Beer();
                $beer->setBeerId($value["beerId"]);
                $beer->setBeerTypeId($value["beerTypeId"]);
                $beer->setName($value["name"]);
                $beer->setIBU($value["IBU"]);
                $beer->setPrice($value["price"]);
                array_push($this->beerList, $beer);
            }

        }
    }

    public function Add(Beer $beer)
    {
        $this->RetrieveData();
        //Id autoincremental
        $lastBeerId = end($this->beerList)->getBeerId();
        $beer->setBeerId($lastBeerId + 1);
        array_push($this->beerList, $beer);
        $this->SaveData();
    }

    public function GetAll()
    {
        $this->RetrieveData();
        return $this->beerList;
    }

    public function GetByBeerId($beerId)
    {
        $this->RetrieveData();
        $beer = null;
        foreach ($this->beerList as $value) {
            if ($value->getBeerId() == $beerId) {
                $beer = $value;
                break;
            }
        }
        return $beer;
    }

    public function GetByBeerTypeId($beerTypeId)
    {
        $this->RetrieveData();
        $beersByCategory = array();
        foreach ($this->beerList as $value) {
            if ($value->getBeerTypeId() == $beerTypeId) {
                array_push($beersByCategory, $value);
            }
        }
        return $beersByCategory;
    }

}