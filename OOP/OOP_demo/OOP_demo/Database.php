<?php
class Database{
    private  $host; 
    private  $username; 
    private  $password; 
    private  $database; 
    private  $table;
    private $conn;
     
    function __construct($table){
        $this->host = "localhost:3306"; 
        $this->username = "root"; 
        $this->password = ""; 
        $this->database = "banhang";

        $this ->table = $table;
        $this ->conn = mysqli_connect($this->host, $this->username, $this ->password) or die("lỗi truy cập");

        mysqli_select_db($this->conn, $this->database) or die("lỗi cơ sở dữ liệu");   
    }

    function __destruct(){
        mysqli_close($this->conn);
    }

    public function getAll(){
        $sql = "select * from {$this->table}";
        $result = mysqli_query($this->conn,$sql) or die("lỗi truy vấn");
        return $result;
    }

    public function getById($id){
        $sql = "select * from {$this->table} where sp_id = $id";
        $result = mysqli_query($this->conn,$sql) or die("lỗi truy vấn");
        return $result;
    }

    public function insert($fields, $values){
        $sql = "insert into {$this ->table} (".implode(",", $fields).")";
        $sql .= "values('".implode("','",$values)."')";
        mysqli_query($this->conn,$sql) or die("lỗi truy vấn");
    }

    public function update($fields, $values, $id){
        $sql = "update {$this ->table} set";
        $out = array();
        for($i =0; $i<count($fields);$i++)
            $out[] = "{$fields[$i]} = '{$values[$i]}'";
        $sql .= implode(',',$out);
        $sql .= "where sp_id= $id";
        mysqli_query($this->conn,$sql) or die("lỗi truy vấn");
    }

    public function delete ($id){
        $sql = "delete from{$this ->table} where sp_id =$id";
        mysqli_query($this->conn,$sql) or die("lỗi truy vấn");

    }
    
}

?>