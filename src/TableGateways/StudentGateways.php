<?php 

namespace Src\TableGateways;


class StudentGateways {

        private $db = null;

        public function __construct($db)
        {
            $this->db = $db;
        }

        public function findAll(){

                $stmt = "
                    Select * from students
                ";

                try{

                    $stmt = $this->db->query($stmt);
                    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    return $result;
                }catch(\PDOException $e){
                    exit($e->getMessage());
                }

        }

        public function find($id){
            $stmt = ' Select * from students where id=?';

            $stmt = $this->db->prepare($stmt);
            $stmt->execute(array($id));

            $result  = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $result;
        }

    }

?>