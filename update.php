<?php
include('connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id=$_POST['id'];
    $ul= $_POST['uplocation'];
    $udept= $_POST['updepartment'];
    $uv= $_POST['upvacancy'];
    $um= $_POST['upmustskill'];
    $uh= $_POST['uphaveskill'];
    $uc= $_POST['upcompany'];
    $us= $_POST['upsalary'];
    $ut= $_POST['uptype'];
    $ud= $_POST['updescription'];
    $ua= $_POST['upabout'];
    $image = $_FILES['image']; // Correctly referencing the image input
    $targetDir = "upload_image/ images"; // Ensure this directory exists
    $filename = basename($image["name"]); // Correctly get the filename
    $targetFilePath = $targetDir . $filename; // Correct file path
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); // Get file type
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
     // Check if file type is allowed
    if (in_array($fileType, $allowTypes)) 
    {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($image["tmp_name"], $targetFilePath)) 
        {
    
    $sql= "UPDATE newpost_tbl 
    SET location= '$ul', department ='$udept', vacancy ='$uv', mustskill ='$um', 
                                haveskill ='$uh', company ='$uc', salary ='$us', type ='$ut' ,
                                description ='$ud', about='$ua', image='$filename' WHERE id ='$id'";
        
        $result=mysqli_query($con,$sql);
        
        if($result){
            header('location: view.php');
        }
        else{
            echo"no";
        }
        
    } else {
        echo "Error uploading your file.";
    }
} else {
    echo "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed.";
}
}

mysqli_close($con);
?>
