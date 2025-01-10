<?php
include('connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $un = mysqli_real_escape_string($con, $_POST['upname']);
    $uadd = mysqli_real_escape_string($con, $_POST['upaddress']);
    $uq = mysqli_real_escape_string($con, $_POST['upqualification']);

    $sql = "UPDATE register_tbl SET 
            name='$un', 
            Address='$uadd', 
            qualification='$uq' 
            WHERE id='$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Fixing the comparison to use '==' instead of '='
        if ($un == 'admin') { // Comparison operator '=='
            header('Location: index.php');
        } else {
            header('Location: userdash.php');
        }
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
