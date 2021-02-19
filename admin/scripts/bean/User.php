<?php


use JetBrains\PhpStorm\Pure;

/**
 * Class User
 * A POJO Class represent User Entry in Database
 * @property string fst
 * @property string lst
 * @property mixed|null id
 * @property mixed|null usr
 * @property mixed|null pwd
 * @property mixed|null fullName
 */
class User
{
    private array $data;

    /**
     * User constructor.
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
    public function __get($name): mixed
    {
        if (method_exists($this, $method = 'get' . ucfirst($name) . 'Property')) {
            return $this->{$method}();
        }
        return $this->data[$name] ?? null;
    }

    /** Return the string represent full name of the user
     * @return string full name of the user
     */
    private function getFullNameProperty(): string
    {
        return "$this->fst $this->lst";
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


}