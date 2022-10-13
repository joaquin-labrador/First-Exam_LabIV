<?php

namespace DAO;

use Model\User as User;
use DAO\IUserDAO as IUserDAO;
class UserDAO implements IUserDAO
{
    private $userList = array();
    private $fileName = ROOT . "Data/users.json";

    private function SaveData()
    {
        $arrayToEncode = array();

        foreach ($this->userList as $value) {
            $valuesArray["userId"] = $value->getUserId();
            $valuesArray["email"] = $value->getEmail();
            $valuesArray["password"] = $value->getPassword();
            array_push($arrayToEncode, $valuesArray);
        }
        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        file_put_contents($this->fileName, $jsonContent);


    }

    private function RetrieveData()
    {
        $this->userList = array();

        if (file_exists($this->fileName)) {
            $jsonContent = file_get_contents('Data/users.json');

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach ($arrayToDecode as $value) {
                $user = new User();
                $user->setUserId($value["userId"]);
                $user->setEmail($value["email"]);
                $user->setPassword($value["password"]);
                array_push($this->userList, $user);
            }

        }
    }

    public function Add(User $user)
    {
        $this->RetrieveData();
        array_push($this->userList, $user);
        $this->SaveData();
    }

    public function GetAll()
    {
        $this->RetrieveData();
        return $this->userList;
    }

    public function GetByEmail($email)
    {
        $this->RetrieveData();
        $user = null;
        foreach ($this->userList as $value) {
            if ($value->getEmail() == $email) {
                $user = $value;
                break;
            }
        }
        return $user;
    }

    public function GetByUserId($userId)
    {
        $this->RetrieveData();
        $user = null;
        foreach ($this->userList as $value) {
            if ($value->getUserId() == $userId) {
                $user = $value;
                break;
            }
        }
        return $user;
    }
}

?>