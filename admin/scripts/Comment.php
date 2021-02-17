<?php


use JetBrains\PhpStorm\Pure;

/**
 * @property int id
 * @property mixed|null pid
 * @property mixed|null author
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


    public function __set(string $name, $value): void
    {
        $this->data[$name] = $value;
    }


}