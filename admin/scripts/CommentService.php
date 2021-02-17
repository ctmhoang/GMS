<?php
require_once 'CommentDao.php';
require_once 'ICommentService.php';

class CommentService implements ICommentService
{
    private ICommentDao $cdao;

    /**
     * CommentService constructor.
     * @param ICommentDao $cdao
     */
    public function __construct(ICommentDao $cdao)
    {
        $this->cdao = $cdao;
    }


    public function fetchAllByPid(int $id): array
    {
        $rawData = $this->cdao->fetchAllByPid($id);
        if ($rawData === null || empty($rawData)) return [];
        return array_map(fn(array $entry): Comment => new Comment($entry), $rawData);
    }

    public function insert(Comment $comment): int
    {
        return $this->cdao->insert(['pid' => $comment->pid, 'body' => $comment->body, 'author' => $comment->author]);
    }

    public function deleteRange(int $pid): bool
    {
        return $this->cdao->deleteByPid($pid) > 0;
    }

    public function isCommentWithIdExisted(int $id): bool
    {
        return $this->cdao->isExisted($id);
    }

    public function deleteById(int $id): bool
    {
        return $this->cdao->deleteById($id) == 1;
    }

    public function fetchAll(): array
    {
        return array_map(fn(array $entry): Comment => new Comment($entry), $this->cdao->fetchAll());
    }
}

$comment_service = new CommentService($comment_dao ?? null);