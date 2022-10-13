<?php

namespace DAO;
use Model\BeerType as BeerType;
use DAO\IBeerTypeDAO as IBeerTypeDAO;
class BeerTypeDAO implements IBeerTypeDAO
{
    private $beerTypeList = array();
    private $fileName = ROOT."Data/beerTypes.json";

    private function SaveData()
    {
        $arrayToEncode = array();

        foreach($this->beerTypeList as $value)
        {
            $valuesArray["beerTypeId"] = $value->getBeerTypeId();
            $valuesArray["description"] = $value->getDescription();
            array_push($arrayToEncode, $valuesArray);
        }
        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        file_put_contents($this->fileName, $jsonContent);
    }

    private function RetrieveData()
    {
        $this->beerTypeList = array();

        if(file_exists($this->fileName))
        {
            $jsonContent = file_get_contents($this->fileName);

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach($arrayToDecode as $value)
            {
                $beerType = new BeerType();
                $beerType->setBeerTypeId($value["beerTypeId"]);
                $beerType->setDescription($value["description"]);
                array_push($this->beerTypeList, $beerType);
            }
        }
    }

    public function Add(BeerType $beerType)
    {
        $this->RetrieveData();
        array_push($this->beerTypeList, $beerType);
        $this->SaveData();
    }

    public function GetAll()
    {
        $this->RetrieveData();
        return $this->beerTypeList;
    }

    public function GetByBeerTypeId($beerTypeId)
    {
        $this->RetrieveData();
        $beerType = null;
        foreach($this->beerTypeList as $value)
        {
            if($value->getBeerTypeId() == $beerTypeId)
            {
                $beerType = $value;
                break;
            }
        }
        return $beerType;
    }
}