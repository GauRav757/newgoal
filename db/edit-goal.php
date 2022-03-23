<?php
if(!isset($_POST['title'])){
    die("can not edit the recored");
}
{
    $g =$_POST['title'];
    $d =$_POST['descriptions'];
    $id=$_POST['id'];
    include('connect.php');
    $query ="UPDATE goal SET title ='$g', descriptions ='$d' WHERE id='$id'";
    if(mysqli_query($conn,$query)){
        header('location:../home.php?msg=successfully updated');
    }else{
        
        header('location:../home.php?msg=' .mysqli_error($conn));
    }
}



?>