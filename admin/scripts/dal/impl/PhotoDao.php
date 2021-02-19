<?php
require_once 'admin/scripts/dal/BaseDao.php';
require_once 'admin/scripts/dal/IPhotoDao.php';
require_once "admin/scripts/dal/pdo.php";
require_once 'admin/scripts/bean/Photo.php';

class PhotoDao extends BaseDao implements IPhotoDao
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
        return $this->fetch("select * from PHOTOS");
    }

    public function findById(int $id): ?array
    {
        if ($id <= 0) return null;
        return $this->fetch("select * from PHOTOS where id = $id LIMIT 1")[0];
    }

    public function insert(array $data): int
    {
        $this->execute("insert into PHOTOS (title, description, name, type, size, author ,caption) value (:title,:desc,:name,:type,:size, :author, :caption)", $data);
        return $this->lstInsertedId();
    }


    public function update(int $id, array $data): int
    {
        $data['id'] = $id;
        return $this->execute('update PHOTOS set title = :title, description = :desc, name = :name, type = :type, size = :size, author= :author, caption = :caption where id = :id', $data);
    }

    public function delete(int $id): int
    {
        return $this->execute('delete from PHOTOS where id = :id', ['id' => $id]);
    }

    public function getRange(int $offset, int $perPage): array
    {
        return $this->fetch("Select * from PHOTOS limit $perPage offset $offset");
    }
}

$photo_dao = new PhotoDao($pdo ?? null);
