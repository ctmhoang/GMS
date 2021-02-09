<?php


use JetBrains\PhpStorm\Pure;

class Photo
{
    private array $data;
    private const TMP_PATH = '';
    private const UPLOAD_DIR = 'imgs';

    /**
     * Photo constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function __get(string $name)
    {
        return $this->data[$name] ?? null;
    }


    public function __isset(string $name): bool
    {
        return isset($this->data[$name]);
    }


    #[Pure] public function __toString(): string
    {
        return implode("|", $this->data);
    }


}