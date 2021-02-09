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
        if ($id != -1) return $this->pdao->update($id, $data);
        else {
            $filename = basename($data['name']);
            $tmpPath = $data['tmp_name'];

            $targetPath = Photo::UPLOAD_DIR . $filename;

            if (empty($filename) || empty($tmpPath) || file_exists($targetPath)) return -1;

            if (move_uploaded_file($tmpPath, $targetPath))
                return $this->pdao->insert(new Photo($data));

            return -1;
        }
    }
}

$photo_dao = $photo_dao ?? null;
$photo_service = new PhotoService($photo_dao);