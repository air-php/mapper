<?php

namespace Air\Mapper;

use Air\Database;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\Common\Collections\Collection;

interface MapperInterface
{
    /**
     * @param Database\ConnectionInterface $databaseConnection A database connection.
     * @param Collection $collection A collection to store objects in.
     */
    public function __construct(Database\ConnectionInterface $databaseConnection, Collection $collection);


    /**
     * @return QueryBuilder A Doctrine QueryBuilder object.
     */
    public function getQueryBuilder();
}
