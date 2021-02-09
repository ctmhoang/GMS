<?php
require_once "pdo.php";
require_once 'BaseDao.php';
require_once 'IUserDao.php';
require_once 'User.php';

class UserDao extends BaseDao implements IUserDao
{

    /**
     * UserDao constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo);
    }

    public function fetchAll(): array
    {
        return $this->query("select * from USERS");
    }

    public function findById(int $id) :User{
        return new User($this->query("select * from USERS where id = $id"));
    }
}

$user_dao = new UserDao($pdo ?? null);

