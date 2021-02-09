<?php
require_once 'User.php';
interface IUserDao
{
    public function fetchAll(): array;

    public function findById(int $id):User;
}