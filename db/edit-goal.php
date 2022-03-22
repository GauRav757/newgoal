<?php
if(!isset($_POST['title'])){
    die("can not edit the recored");
}
{
    $goal =$_POST['title'];
    $descriptions =$_POST['descriptions'];
    $id=$_POST['id'];
    include('connect.php');
    $query ="UPDATE goal SET title ='$goal', descriptions ='$descriptions' WHERE id='$id'";
    if(mysqli_query($conn,$query)){
        header('location:../home.php?msg=successfully updated');
    }else{
        
        header('location:../home.php?msg=' .mysqli_error($conn));
    }
}



?>