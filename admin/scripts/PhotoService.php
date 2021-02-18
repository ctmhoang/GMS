<?php
require_once 'PhotoDao.php';
require_once 'Photo.php';
require_once 'IPhotoService.php';
require_once 'CommentService.php';


class PhotoService implements IPhotoService
{

    private IPhotoDao $pdao;
    private ICommentService $cserv;

    /**
     * PhotoService constructor.
     * @param IPhotoDao $pdao
     * @param ICommentService $commentService
     */
    public function __construct(IPhotoDao $pdao, ICommentService $commentService)
    {
        if ($pdao === null || $commentService === null) die("Invalid Argument in " . get_class($this));
        $this->pdao = $pdao;
        $this->cserv = $commentService;
    }


    public function fetchAll(): array
    {
        return array_map(fn(array $entry): Photo => new Photo($entry), $this->pdao->fetchAll());
    }

    public function findById(int $id): Photo
    {
        return new Photo($this->pdao->findById($id));
    }

    public function save(array $data, int $id = -1): int
    {
        if ($id != -1) return $this->pdao->update($id,
            ['title' => $data['title'],
                'desc' => $data['description'],
                'name' => $data['name'],
                'type' => $data['type'],
                'size' => $data['size'],
                'author' => $data['author'],
                'caption' => $data['caption']]);
        else {
            $filename = basename($data['name']);
            $tmpPath = $data['tmp_name'];

            $targetPath = Photo::UPLOAD_DIR . $filename;

            if (empty($filename) || empty($tmpPath) || file_exists($targetPath)) return -1;

            if (move_uploaded_file($tmpPath, $targetPath))
                return $this->pdao->insert([
                    'title' => $data['title'] ?? null,
                    'desc' => null,
                    'author' => $data['author'],
                    'caption' => null,
                    'name' => $data['name'],
                    'type' => $data['type'],
                    'size' => $data['size']
                ]);

            return -1;
        }
    }

    public function del(Photo $photo): bool
    {
        $this->cserv->deleteRange($photo->id); #delete all comments
        if (unlink($photo->dir)) return $this->pdao->delete($photo->id) == 1;
        return false;
    }

    public function getRange(int $offset, int $perPage): array
    {
        return array_map(fn(array $entry): Photo => new Photo($entry), $this->pdao->getRange($offset, $perPage));
    }
}

$photo_service = new PhotoService($photo_dao ?? null, $comment_service ?? null);