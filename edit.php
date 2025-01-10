<?php
session_start();
include('header.php');
include('navbar.php');
?>
<style>
    input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none; 
    margin: 0; 
}
    </style>
<div class="container">
    <div class="row ">
        <div class="col-md-2 text-center">  </div>
        <div class="col-md-8"> 
        <div class=" m-4 fw-bold fs-3 text-primary-emphasis text-center">
        Update Your POST </div>
    <?php
    include('connect.php');
    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($con, $_GET['id']); // Sanitize the ID for security
        $sql = "SELECT * FROM newpost_tbl WHERE id = '$id'"; // Select only the record with the specific ID
        $result = mysqli_query($con, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Record not found.";
            exit; // Stop script if no record is found
        }
}
?> 
<!-- enctype used for image  -->
<form action='update.php' method='post' enctype="multipart/form-data"> 
    <input type="hidden" name="id" value="<?=$row['id'];?>">
    <div class="row">
        <div class="col-md-6 mt-4">
            <div class="mb-3">
                <label for="location" class="form-label fw-bold">Location</label>
                <select class="form-select form-select-lg mb-3"  required name="uplocation">
                    
                    <option value="<?=$row['location'];?>"> <?= $row['location'];?></option>
                    <option value="Bengaluru">Bengaluru</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Noida">Noida</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Ranchi">Ranchi</option>
                    <option value="Jamshedpur">Jamshedpur</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 mt-4">
            <div class="mb-3">
                <label for="department" class="form-label fw-bold">Department</label>
                <select class="form-select form-select-lg mb-3" required name="updepartment">
                <option value="<?=$row['location'];?>"> <?= $row['location'];?></option>
                    <option value="IT">IT</option>
                    <option value="Management">Management</option>
                    <option value="Accountant">Accountant</option>
                    <option value="Pharmacy">Pharmacy</option>
                    <option value="Mechanical">Mechanical</option>
                    <option value="Electrical">Electrical</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-4">
            <div class="mb-3">
                <label for="vacancy" class="form-label fw-bold">Job vacancy</label>
                <input type="text" class="form-control" required value="<?=$row['vacancy'];?>"name="upvacancy">
            </div>
        </div>
        <div class="col-md-6 mt-4">
            <div class="mb-3">
                <label for="type" class="form-label fw-bold">Company Name</label>
                <input type="text" class="form-control"  required value="<?=$row['company'];?>" name="upcompany">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-4">
            <div class="mb-3">
                <label for="vacancy" class="form-label fw-bold">Must have Skills </label>
                <input type="text" class="form-control" required value="<?=$row['mustskill'];?>" name="upmustskill">
            </div>
        </div>
        <div class="col-md-6 mt-4">
            <div class="mb-3">
                <label for="type" class="form-label fw-bold">Good to Have Skills</label>
                <input type="text" class="form-control" required value="<?=$row['haveskill'];?>" name="uphaveskill">
            </div>
        </div>
    </div>
        <div class="row">
                <div class="col-md-6 mt-4">
                    <div class="mb-3">
                        <label for="salary" class="form-label fw-bold">Salary</label>
                        <input type="number" class="form-control" required value="<?=$row['salary'];?>" name="upsalary">
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="mb-3">
                        <label for="type" class="form-label fw-bold">Job Type</label>
                        <input type="text" class="form-control" value="<?=$row['type'];?>" required name="uptype">
                    </div>
                </div>
         </div>
        
            <div class="mb-3 fw-bold">
                <label for="description">Job description</label>
                <textarea class="form-control" placeholder="Enter JD here" name="updescription" required><?=$row['description'];?></textarea>
            </div>
            <div class="mb-3 fw-bold">
                <label for="description">About Company</label>
                <textarea class="form-control" placeholder="Write about ur company" name="upabout" required > <?=$row['about'];?></textarea>
            </div>
        </div>
    
    <div class="row">
        <div class="col-md-6">
            <label>Image Preview</label>
            <input type="file" name="image" class="form-control" required>
            <input type="hidden" name="upimage" value="<?php var_dump($row['image']);?>">
            <img src="upload-image/images/<?php echo $row['image'];?>" height="30px">
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary mb-5 mt-4" name="submit">UPDATE</button>
            </div>
            </div>
        </form>

        </div>
                      <div class="col-md-2"></div>
    </div>
</div>




