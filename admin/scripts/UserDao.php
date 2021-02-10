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
        return $this->fetch("select * from USERS");
    }

    public function findById(int $id): ?array
    {
        if ($id <= 0) return null;
        return $this->fetch("select * from USERS where id = $id LIMIT 1")[0];
    }

    /**
     * @param string $usr
     * @param string $pwd
     * @return array or false
     */
    public function validateUser(string $usr, string $pwd): array
    {
        return $this->query("select * from USERS where usr = :usr and pwd = :pwd limit 1",
            ['usr' => $usr, 'pwd' => $pwd]);
    }

    public function insert(array $data): int
    {
        $this->execute("insert into USERS (usr, pwd, fst, lst) value (:usr,:pwd,:fst,:lst)",
            $data);
        return $this->lstInsertedId();
    }


    public function update(int $id, array $data): int
    {
        $data['id'] = $id;
        return $this->execute('update USERS set usr = :usr, pwd = :pwd, fst = :fst, lst = :lst where id = :id', $data);
    }

    public function delete(int $id): int
    {
        return $this->execute('delete from USERS where id = :id', ['id' => $id]);
    }
}

$user_dao = new UserDao($pdo ?? null);

