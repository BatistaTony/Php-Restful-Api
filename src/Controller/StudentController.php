<?php 

namespace Src\Controller;

use Src\TableGateways\StudentGateways;

class StudentController {

    private $db;
    private $requestMethod;
    private $userId;


    private $studentGateway;

    public function __construct($db, $requestMethod, $userId)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->userId = $userId;

        $this->studentGateway = new StudentGateways($db);
    }

    public function processRequest(){
        switch($this->requestMethod){
            case 'GET': {
                if($this->userId){
                    $response =  $this->studentGateway->find($this->userId);
                }else{
                    $response = $this->studentGateway->findAll();
                }
            break;
            }

            case 'POST': {
                //insert some data on database
            break;
            }

            case 'PUT': {
                //update a record on database
            break;
            }

            case 'DELETE': {
                //delete a record on database
            break;
            }
        }
        
        header($response['status-code_header']);

        if($response['body']){
            echo $response;
        }
    
    }

    public function getStudent(){

    }

    public function getAllStudent(){
        $result = $this->studentGateway->findAll();
        $response['status_code_header'] =  'HTTP://1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }

    public function getSingleStudent($id){
        $result  = $this->studentGateway->find($id);
        
        if(!$result){
            return $this->notFoundResponse();
        }

        $response['status_code_header'] = 'HTTP://1.1 200 OK';
        $response['body'] = json_encode($result);

        return $response;
    }

    public function notFoundResponse(){
        $response['status_code_header'] = 'HTTP:/1.1 404 NOT FOUND';
        $response['body'] = null;
        
        return $response;
    }

    


}


?>