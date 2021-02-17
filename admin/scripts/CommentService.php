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
}

$comment_service = new CommentService($comment_dao ?? null);