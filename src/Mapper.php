<?php

namespace Air\Mapper;

use Air\Database;

abstract class Mapper
{
    /**
     * @var Database\ConnectionInterface $databaseConnection A database connection.
     */
    protected $databaseConnection;


    /**
     * @param Database\ConnectionInterface $databaseConnection A database connection.
     */
    public function __construct(Database\ConnectionInterface $databaseConnection)
    {
        $this->databaseConnection = $databaseConnection;
    }


    /**
     * Map a PDO statement to an array of model objects.
     *
     * @param array $data An array of data.
     * @return array An array of objects.
     */
    protected function mapToObjects($data)
    {
        $output = [];

        if (count($data) > 0) {
            foreach ($data as $row) {
                $output[] = $this->instantiateObject($row);
            }
        }

        return $output;
    }


    /**
     * @param array $data An array of data to instantiate the object with.
     * @return mixed A collection.
     */
    abstract protected function instantiateObject(array $data);
}
