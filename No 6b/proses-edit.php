<?php  
  
    include_once ("koneksi.php");

        $id= $_GET['id'];
        $name=$_POST['name'];
        $work=$_POST['work'];
        $salary=$_POST['salary'];

        mysqli_query($koneksi, "UPDATE name SET name='$name',
                                              id_work='$work',
                                              id_salary='$salary'
                                              WHERE id='$id'");
       
        header("location: index.php");
      
?>