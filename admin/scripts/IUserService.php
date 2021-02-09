<?php
require_once 'User.php';

interface IUserService
{
    public function fetchAll(): array;

    public function findById(int $id):User;

    public function GetInfo(string $usr, string $pwd) : ?User;
}