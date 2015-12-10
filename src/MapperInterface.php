<?php

namespace Air\Mapper;

use Air\Database;
use Doctrine\DBAL\Query\QueryBuilder;

interface MapperInterface
{
    /**
     * @return QueryBuilder A Doctrine QueryBuilder object.
     */
    public function getQueryBuilder();
}
