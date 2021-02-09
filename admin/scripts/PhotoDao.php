<?php
require_once 'BaseDao.php';
require_once 'IPhotoDao.php';
require_once "pdo.php";
require_once 'Photo.php';

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
        return $this->fetch("select * from PHOTOS where id = $id LIMIT 1");
    }

    public function insert(Photo $photo): int
    {
        $this->execute("insert into PHOTOS (title, description, name, type, size) value (:title,:desc,:name,:type,:size)",
            [
                'title' => $photo->title ?? null,
                'desc' => $photo->desc ?? null,
                'name' => $photo->name ?? null,
                'type' => $photo->type ?? null,
                'size' => $photo->size ?? null
            ]);
        return $this->lstInsertedId();
    }


    public function update(int $id, array $data): int
    {
        return $this->execute('update PHOTOS set title = :title, description = :desc, name = :name, type = :type, size = :size where id = :id', $data);
    }

    public function delete(string $sql, int $id): int
    {
        return $this->execute('delete from PHOTOS where id = :id', ['id' => $id]);
    }
}

$photo_dao = new PhotoDao($pdo ?? null);
