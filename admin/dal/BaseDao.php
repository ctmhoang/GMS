<?php

abstract class BaseDao
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        if($pdo === null) die("PDO Object is not set");
        $this->pdo = $pdo;
    }

    protected final function query(string $sql): array
    {
        $res = [];
        $stm = $this->pdo->query($sql);
        if ($stm)
            while ($row = $stm->fetch(PDO::FETCH_ASSOC))
                $res[] = $row;

        return $res;
    }

    protected final function lstInsertedId(string $name = null): string
    {
        return $this->pdo->lastInsertId($name);
    }
}
