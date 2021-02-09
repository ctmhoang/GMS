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

    public function findById(int $id): ?array
    {
        if ($id <= 0) return null;
        return $this->query("select * from USERS where id = $id LIMIT 1");
    }

    /**
     * @param string $usr
     * @param string $pwd
     * @return array or false
     */
    public function validateUser(string $usr, string $pwd) : ?array
    {
        return $this->execute("select * from USERS where usr = :usr and pwd = :pwd limit 1", true,
            ['usr' => $usr, 'pwd' => $pwd]);
    }
}

$user_dao = new UserDao($pdo ?? null);

