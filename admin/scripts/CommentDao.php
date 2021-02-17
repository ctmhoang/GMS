<?php
require_once 'BaseDao.php';
require_once 'ICommentDao.php';
require_once "pdo.php";
require_once 'Comment.php';

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
        return $this->fetch("select * from COMMENT where pid = $id order by pid ");
    }
}

$comment_dao = new CommentDao($pdo ?? null);
