<?php


use JetBrains\PhpStorm\Pure;


/**
 * Class Comment
 * A POJO Class represent Comment Entry in Database
 * @property int id
 * @property int pid
 * @property string author
 * @property string|null body
 */
class Comment
{
    private array $data;

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