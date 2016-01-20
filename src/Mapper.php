<?php

namespace Air\Mapper;

use Air\Database;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Query\QueryBuilder;

abstract class Mapper implements MapperInterface
{
    /**
     * @var Database\ConnectionInterface $databaseConnection A database connection.
     */
    protected $databaseConnection;


    /**
     * @var Collection $collection A collection to store objects in.
     */
    protected $collection;


    /**
     * @param Database\ConnectionInterface $databaseConnection A database connection.
     * @param Collection $collection A collection to store objects in.
     */
    public function __construct(Database\ConnectionInterface $databaseConnection, Collection $collection)
    {
        $this->databaseConnection = $databaseConnection;
        $this->collection = $collection;
    }


    /**
     * @return QueryBuilder
     */
    public function getQueryBuilder()
    {
        return $this->databaseConnection->getQueryBuilder();
    }


    /**
     * Map a data to a collection of model objects.
     *
     * @param array $data An array of data.
     * @return Collection A collection of objects.
     */
    protected function mapToObjects($data)
    {
        $this->collection->clear();

        if (count($data) > 0) {
            foreach ($data as $row) {
                $this->collection->add($this->instantiateObject($row));
            }
        }

        return clone $this->collection;
    }


    /**
     * @param array $data An array of data to instantiate the object with.
     * @return mixed A collection.
     */
    abstract protected function instantiateObject(array $data);
}
