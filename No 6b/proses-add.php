<?php

    include_once ("koneksi.php");

        $name=$_POST['name'];
        $work=$_POST['work'];
        $salary=$_POST['salary'];

        mysqli_query($koneksi, "INSERT INTO name (name,id_work,id_salary)
                                           VALUES ('$name','$work','$salary')");
           
        header("location: index.php");
    
?>
