<?php
require_once 'UserDao.php';
require_once 'IUserService.php';

class UserService implements IUserService
{
    private IUserDao $udao;

    /**
     * UserService constructor.
     * @param IUserDao $udao
     */
    public function __construct(IUserDao $udao)
    {
        if ($udao === null) die("Invalid Argument in " . get_class($this));
        $this->udao = $udao;
    }


    public function fetchAll(): array
    {
        return array_map(fn(array $entry): User => new User($entry), $this->udao->fetchAll());
    }

    public function findById(int $id): User
    {
        return new User($this->udao->findById($id));
    }


    public function GetInfo(string $usr, string $pwd): ?User
    {
        $tmp = $this->udao->validateUser($usr, $pwd);
        return $tmp === null ? null : new User($tmp);
    }
}

$user_dao = $user_dao ?? null;
$user_service = new UserService($user_dao);
