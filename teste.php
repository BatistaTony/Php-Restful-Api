<?php

require('./system/DatabaseConnector.php');
require('./TableGateways/StudentGateways.php');

use Src\TableGateways\StudentGateways;
use Src\System\DatabaseConnector;

$dbConnection1 = (new DatabaseConnector())->getConnection();

$studentGateway = new StudentGateways($dbConnection1);

var_dump($studentGateway->findAll());

?>