<?php
    require_once('Database.php');
    class ModelStudent extends Database{
       private $tableName ="thuonghieu";
        function __construct(){
            parent::__construct($this->tableName);
        }
    }

?>