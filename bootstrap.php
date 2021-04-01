<?php 

    
require('vendor/autoload.php');

ini_set('display_errors', 1);
error_reporting(~0);


use Src\TableGateways\StudentGateways;

use Dotenv\Dotenv;

use Src\System\DatabaseConnector;

$dotenv = new Dotenv(__DIR__);
$dotenv->load();




$dbConnection = (new DatabaseConnector())->getConnection();


$studentGateway = new StudentGateways($dbConnection);

var_dump($studentGateway->findAll());


?>