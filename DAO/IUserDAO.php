<?php

namespace DAO;
use Model\User as User;
interface IUserDAO
{
    public function Add(User $user);
    public function GetAll();
    public function GetByEmail($email);
    public function GetByUserId($userId);

}