<?php

/**
 * Class BaseDao
 * Base class of all the DAL related class
 */
abstract class BaseDao
{
    /**
     * @var PDO $pdo Help to access database
     */
    private PDO $pdo;

    /**
     * BaseDao constructor.
     * @param PDO $pdo
     * if $pdo is not provided. This method is dead instantly
     */
    public function __construct(PDO $pdo)
    {
        if ($pdo === null) die("Invalid PDO Argument");
        $this->pdo = $pdo;
    }


    /**
     * Fetch all the record of the database into an array (Do not handle SQL INJECTION)
     * @param string $sql Query string
     * @return array result of the query if any error occurs, return empty array
     */
    protected final function fetch(string $sql): array
    {
        $res = [];
        $stm = $this->pdo->query($sql);
        if ($stm)
            while ($row = $stm->fetch(PDO::FETCH_ASSOC))
                $res[] = $row;

        return $res;
    }

    /**
     * More secure version of fetch method in BaseDAO
     * @param string $sql Query string
     * @param array $args arguments need to provide inorder to perform the query
     * @return array result of the query if any error occurs, return empty array
     */
    protected final function query(string $sql, array $args): array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($args);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($res === false) return [];
        return $res;
    }

    /**
     * Used for update or delete entry in the table
     * @param string $sql query string
     * @param array $args arguments need to provide inorder to perform the query
     * @return int number of the row affected
     */
    protected final function execute(string $sql, array $args): int
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($args);
        return $stmt->rowCount();
    }

    /**
     * Return the last inserted ID
     * @param string|null $name some DBMS need to specify the name of the sequence object in order to get the last inserted string
     * @return int the id of the last inserted row
     */
    protected final function lstInsertedId(string $name = null): int
    {
        return $this->pdo->lastInsertId($name);
    }

}
