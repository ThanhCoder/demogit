<?php
    function my__autoload($url){
        require_once("$url.php");
    }
    spl_autoload_register("my__autoload");
    $student = new ModelStudent();
    echo "<br></br>Bảng Thương Hiệu:<br>";
    $rows = $student->getAll();
    while($row = mysqli_fetch_array($rows)){
        print_r($row);
    }

    echo "<br></br>Bảng Sản Phẩm:<br>";
    $student1 = new ModelClass();
    $rows = $student1->getAll();
    while($row = mysqli_fetch_array($rows)){
        print_r($row);
    }
    
    $student1 = new ModelClass();
    $fields = ['sp_name','image','gia', 'soluong','br_id'];
    $values =['MAC Pro','image1.jpg','12333333','2','5'];

    $student1 ->insert($fields, $values);
    $rows = $student1->getAll();
    while($row = mysqli_fetch_array($rows)){
        print_r($row);
    }

    //$student1->update(13,$fields, $values);
    //$rows = $student1->getAll();
    //while($row = mysqli_fetch_array($rows)){
       // print_r($row);
    //}

?>