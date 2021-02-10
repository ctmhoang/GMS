<?php
require_once 'PhotoDao.php';
require_once 'Photo.php';
require_once 'IPhotoService.php';

class PhotoService implements IPhotoService
{

    private IPhotoDao $pdao;

    /**
     * PhotoService constructor.
     * @param IPhotoDao $pdao
     */
    public function __construct(IPhotoDao $pdao)
    {
        if ($pdao === null) die("Invalid Argument in " . get_class($this));
        $this->pdao = $pdao;
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
                'altertext' => $data['altertext'],
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
                    'altertext' => null,
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
        // TODO :Change to dyna link
        if (unlink('/opt/lampp/htdocs/GMS/admin/imgs/' . $photo->name)) return $this->pdao->delete($photo->id) == 1;
        return false;
    }
}

$photo_dao = $photo_dao ?? null;
$photo_service = new PhotoService($photo_dao);