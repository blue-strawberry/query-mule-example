<?php

include __DIR__ . '/../../setup.php';

use Redstraw\Hooch\Query\Repository\Table\Table;
use Redstraw\Hooch\Query\Sql\Sql;

$query = $driver->select()
    ->cols()
    ->from(Table::make($driver)->setName("customer"))
    ->orderBy('id', Sql::DESC)
    ->build();

header('Content-Type: application/json');

echo json_encode([
    "query"         =>  $query->string(),
    "parameters"    =>  $query->parameters(),
    "result"        =>  $driver->fetchAll($query)
]);
