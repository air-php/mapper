<?php

namespace Air\Mapper;

use PDOStatement;
use PDO;

abstract class Mapper
{
    /**
     * @var PDO $databaseConnection A database connection.
     */
    protected $databaseConnection;


    /**
     * @param PDO $databaseConnection A database connection.
     */
    public function __construct(PDO $databaseConnection)
    {
        $this->databaseConnection = $databaseConnection;
    }


    /**
     * Map a PDO statement to an array of model objects.
     *
     * @param PDOStatement $smt A PDO statement.
     * @return array An array of objects.
     */
    protected function mapToObjects(PDOStatement $smt)
    {
        $data = [];

        $smt->execute();

        if ($smt->rowCount() > 0) {
            foreach ($smt->fetchAll() as $row) {
                $data[] = $this->instantiateObject($row);
            }
        }

        return $data;
    }


    /**
     * @param array $data An array of data to instantiate the object with.
     * @return mixed A collection.
     */
    abstract protected function instantiateObject(array $data);
}
