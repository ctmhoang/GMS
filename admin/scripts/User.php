<?php


use JetBrains\PhpStorm\Pure;

/**
 * @property string fst
 * @property string lst
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


    public function __get($name)
    {
        if (method_exists($this, $method = 'get' . ucfirst($name) . 'Property')) {
            return $this->{$method}();
        }
        return $this->data[$name] ?? null;
    }

    private function getFullNameProperty(): string
    {
        return "$this->fst $this->lst";
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset(string $name) : bool
    {
        return isset($this->data[$name]);
    }

    #[Pure] public function __toString() : string
    {
        return implode("|", $this->data);
    }


}