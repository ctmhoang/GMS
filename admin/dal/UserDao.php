<?php
require_once "pdo.php";
require_once 'BaseDao.php';
require_once 'IUserDao.php';

class UserDao extends BaseDao implements IUserDao
{

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo);
    }

    public function fetchAll(): array
    {
        return $this->query("select * from USERS");
    }
}

$user_dao = new UserDao($pdo ?? null);

