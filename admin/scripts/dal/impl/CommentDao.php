<?php
/** @define "__ROOT__" "/opt/lampp/htdocs/GMS/admin/scripts" */
require_once(dirname(__FILE__, 3) . '/utils/config.php');

require_once __ROOT__ . '/dal/BaseDao.php';
require_once __ROOT__ . '/dal/ICommentDao.php';
require_once __ROOT__ . "/dal/pdo.php";

class CommentDao extends BaseDao implements ICommentDao
{
    /**
     * CommentDao constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo);
    }

    public function fetchAllByPid(int $id): ?array
    {
        if ($id <= 0) return null;
        return $this->fetch("select * from COMMENT where pid = $id order by id ");
    }

    public function insert(array $data): int
    {
        $this->execute("insert into COMMENT (pid, author, body) value (:pid,:author,:body)",
            $data);
        return $this->lstInsertedId();
    }

    public function deleteByPid(int $pid): int
    {
        return $this->execute('delete from COMMENT where pid = :id', ['id' => $pid]);
    }


    public function deleteById(int $id): int
    {
        return $this->execute('delete from COMMENT where id = :id', ['id' => $id]);
    }

    public function fetchAll(): array
    {
        return $this->fetch("select * from COMMENT");
    }

    public function get(int $id): array
    {
        return $this->fetch("select * from COMMENT where id = $id");
    }
}

$comment_dao = new CommentDao($pdo ?? null);
