<?php


use JetBrains\PhpStorm\Pure;

/**
 * @property int id
 * @property mixed|null name
 * @property mixed|null rawData
 * @property string dir
 * @property mixed|null title
 * @property mixed|null caption
 * @property mixed|null description
 */
class Photo
{
    private array $data;
    public const UPLOAD_DIR = 'imgs/';

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
        if (method_exists($this, $method = 'get' . ucfirst($name) . 'Property')) {
            return $this->{$method}();
        }
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

    private function getDirProperty(): string
    {
        return self::UPLOAD_DIR .$this->name;
    }

    private function getRawDataProperty(): array
    {
        return $this->data;
    }

    public function __set(string $name, $value): void
    {
        $this->data[$name] = $value;
    }


}