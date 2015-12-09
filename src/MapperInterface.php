<?php

namespace Air\Mapper;

use Air\Database;
use Doctrine\DBAL\Query\QueryBuilder;

interface MapperInterface
{
    /**
     * @param Database\ConnectionInterface $databaseConnection A database connection.
     */
    public function __construct(Database\ConnectionInterface $databaseConnection);


    /**
     * @return QueryBuilder A Doctrine QueryBuilder object.
     */
    public function getQueryBuilder();
}
