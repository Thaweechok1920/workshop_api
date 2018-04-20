<?php
class ExecSQL{
    private $conn;
     public function __construct($str_conn){

        $this->conn =$str_conn;
     }

     
     public function readAll($tablename){
         $stmt =$this->conn->prepare("SELECT * FROM ".$tablename);
         $stmt ->execute();
         return $stmt;

    }
    public function rowCount($tablename,$condition){
        $stmt = $this->conn->prepare("SELECT  COUNT(*) AS total_row FROM ".$tablename.$condition);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_row'];  
     }  

     public function readOne($tablename,$condition){
        $stmt = $this->conn->prepare(" SELECT * FROM ".$tablename .$condition);
        $stmt->execute();
        return $stmt;
     }
     public function insert(){
         
     }

}
?>