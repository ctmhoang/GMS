<?php


use JetBrains\PhpStorm\Pure;

/**
 * Class Photo
 * A POJO Class represent Photo Entry in Database
 * @property int id
 * @property string name
 * @property array rawData
 * @property string dir
 * @property string title
 * @property string|null description
 * @property string author
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

    /**
     * @param string $name of the property wanna get
     * @return mixed the value of the data otherwise return null
     */
    public function __get(string $name): mixed
    {
        if (method_exists($this, $method = 'get' . ucfirst($name) . 'Property')) {
            return $this->{$method}();
        }
        return $this->data[$name] ?? null;
    }


    /**
     * @param string $name of the property wanna check if it set
     * @return bool true if it set otherwise false
     */
    public function __isset(string $name): bool
    {
        return isset($this->data[$name]);
    }


    /**
     * Represent all the data of the object
     * @return string the repr of the instance
     */
    #[Pure] public function __toString(): string
    {
        return implode("|", $this->data);
    }

    /** get the location of the data when saved
     * @return string location of the image
     */
    private function getDirProperty(): string
    {
        return self::UPLOAD_DIR . $this->name;
    }

    /** Return the copy of the data in the Photo
     * @return array the data of the instance
     */
    private function getRawDataProperty(): array
    {
        return $this->data;
    }

    /**
     * Set the $name property of the instance to new $value
     * @param string $name of the property
     * @param mixed $value wanna set to the property
     */
    public function __set(string $name, mixed $value): void
    {
        $this->data[$name] = $value;
    }


}