
<?php
    require_once('Database.php');
    class ModelClass extends Database{
      private  $tableName ="sanpham";
        function __construct(){
            parent::__construct($this->tableName);
        }
    }

?>