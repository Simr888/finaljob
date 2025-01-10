
<?php
include('header.php');
include('header1.php');
?>
   <style>
    
    body{
    background-image: url('assets/images/in.jpg');
    background-repeat:no-repeat;
    background-size:cover;
    }
    @media (max-width: 600px) {
    body {
    }
      }
    </style>
   <body>
    <div class="container mt-2">
      <div class="row">
        <div class="col-md-2"></div>
          <div class="col-md-8">
             <div class="card">
               <div class="card-body">
               <h2 class="text-secondary">New User ??</h2> 
               <div class="text-center fs-3">Register here
               </div>
                    <form action="" method="post" enctype="multipart/form-data">
                    <?php
                    include("connect.php");
                  if (isset($_POST['submit'])) {
                    $e = mysqli_real_escape_string($con, $_POST['email']);
                    $n = mysqli_real_escape_string($con, $_POST['name']);
                    $p = mysqli_real_escape_string($con, $_POST['password']);
                    $q = mysqli_real_escape_string($con, $_POST['qualification']);
                    $l = mysqli_real_escape_string($con, $_POST['address']);
                    $g = mysqli_real_escape_string($con, $_POST['gender']);
                    $filename = $_FILES['image']['name'];
                    $filesize = $_FILES['image']['size'];
                    $filetemp = $_FILES['image']['tmp_name'];
                    $filetype = $_FILES['image']['type'];

                    // Validate image type and size
                    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
                    
                      $upload_dir = "uploads/";

                      if (!is_dir($upload_dir)) {
                          mkdir($upload_dir, 0755, true);
                      }

                        // Move the uploaded file
                        if (!move_uploaded_file($filetemp, $upload_dir . $filename)) {
                            echo "File upload failed.";
                            exit();
                        }
                            $sql = "INSERT INTO register_tbl (email, name, password, qualification, address, gender, image, date) 
                                    VALUES ('$e', '$n', '$p', '$q', '$l', '$g', '$filename', NOW())";
                            
                            $result = mysqli_query($con, $sql);
                            if ($result) {
                              echo '<div class="alert alert-success fw-light" role="alert">Inserted Successfully</div>';
                                header('location:log_in.php');
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Not Inserted</div>';
                            }
                        } 
                  
                ?>
              <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label fw-bold">Email id</label>
                 <i class="fa-solid fa-envelope fa-xl" style="color: #74C0FC;"></i>
                 <input type="email" name="email" class="form-control" placeholder="Enter e-mail" required id="exampleInputEmail1" aria-describedby="emailHelp" >
             </div>
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label fw-bold">Name</label>
                 <i class="fa-solid fa-user fa-xl" style="color: #e2a31d;"></i>
                <input type="name" name="name" class="form-control" placeholder="Enter name" required id="exampleInputEmail1" aria-describedby="emailHelp" >
             </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">Password</label>
                <i class="fa-solid fa-lock fa-xl" style="color: #B197FC;"></i>
                <input type="password" name="password" class="form-control" required placeholder="Enter password" id="exampleInputPassword1">
              </div>
              <div class="m">
              <label for="exampleInputPassword1" class="form-label fw-bold">Select Qualification</label>
              <select class="form-select" name="qualification" required aria-label="Default select example">
                 <option selected>select degree </option>
                    <option value="bba">BBA</option>
                    <option value="bba">BCA</option>
                    <option value="mca">MCA</option>
                    <option value="mba">MBA</option>
                    <option value="ma">MA</option>
                </select>
                <div class="mb-3">
                      <label class="form-label fw-bold">Location</label>
                      <input type="text" class="form-control" name="address" required placeholder="Enter your address"> 
                    </div>

                    <div class="mb-3">
                      <label class="form-label fw-bold">Gender</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="Male" id="flexRadioMale">
                        <label class="form-check-label" for="flexRadioMale">Male</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="Female" id="flexRadioFemale">
                        <label class="form-check-label" for="flexRadioFemale">Female</label>
                      </div>
                    </div>
                 </div>
                 <div class="mb-3">
                    <label class="form-label fw-bold">Set up ur Profile picture</label> <br>
                      <input type="file" name="image" required>
                  </div>    
                  <button type="submit" class="btn btn-primary mt-3" name="submit">Submit</button>
                <hr>
                <h5 class="fw-light mb-1"> Already Registered <a href="log_in.php" class="text-success fw-light"> Goto Log_in </a></h5>
            </form>

                </div>

              </div>
            </div>
          </div>
          <div class="col-md-2"></div>

      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<?php
include('footer.php');

?>