<?php
include('connect.php');
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $sql="DELETE FROM newpost_tbl where id= $id";
    $result= mysqli_query($con,$sql);
    if($result)
    {
        echo "<script>alert('Successfully Deleted')</script>";
        header('location: view.php');
    }
    else{
        echo" no !";
    }
}
?>