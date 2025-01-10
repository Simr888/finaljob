<?php
error_reporting(0);
include('connect.php');
include('topheader.php');

if (isset($_POST['submit'])) {
    // Sanitize input
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $department = mysqli_real_escape_string($con, $_POST['department']);
    $vacancy = mysqli_real_escape_string($con, $_POST['vacancy']);
    $must = mysqli_real_escape_string($con, $_POST['mustskill']);
    $have = mysqli_real_escape_string($con, $_POST['haveskill']);
    $company = mysqli_real_escape_string($con, $_POST['company']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $about = mysqli_real_escape_string($con, $_POST['about']);
    $filename = $_FILES['image']['name'];
    $filesize = $_FILES['image']['size'];
    $filetemp = $_FILES['image']['tmp_name'];
    $filetype = $_FILES['image']['type'];

    // Validate image type and size
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($filetype, $allowed_types) || $filesize > 2 * 1024 * 1024) {
        echo "Invalid file type or size. Please upload a JPG, PNG, or GIF under 2MB.";
        exit;
    }

    // Check if the upload directory exists
    $upload_dir = "upload_image/images/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    // Move the uploaded file
    if (!move_uploaded_file($filetemp, $upload_dir . $filename)) {
        echo "File upload failed.";
        exit;
    }

    // Insert into database
    $sql = "INSERT INTO newpost_tbl (location, department, vacancy, mustskill, haveskill, company, salary, type, description, about, image, date)
            VALUES ('$location', '$department', '$vacancy', '$must', '$have', '$company', '$salary', '$type', '$description', '$about', '$filename', NOW())";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Job posting submitted successfully.')</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>


<?php

session_start(); 
include('header.php');
include('navbar.php');
?>


                <!-- Begin Page Content -->
<div class="container-fluid">

                    <!-- Page Heading -->
    <div class="h3 mb-4 text-gray-800 text-center text-info-emphasis fw-semibold">POST JOBS !!</div>

        <div class="row">
                <div class="col-md-3"></div>
                        <div class="col-lg-6">

                        <form action='' method='post' enctype="multipart/form-data"> 
                <div class="row ">
                    <div class="col-md-6 mt-4">
                                <div class="mb-3">
                                    <label for="location" class="form-label fw-bold">Location</label>
                                    <select class="form-select mb-3" aria-label="Default select example" required name="location">
                                        <option value="">Select one</option>
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
                            <div class="mb-3 ">
                                <label for="department" class="form-label fw-bold">Department</label>
                                <select class="form-select form-select-lg mb-3" required name="department">
                                    <option value="">Select one</option>
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
                        <input type="text" class="form-control" required name="vacancy">
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="mb-3">
                        <label for="type" class="form-label fw-bold">Company Name</label>
                        <input type="text" class="form-control" required name="company">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-4">
                    <div class="mb-3">
                        <label for="vacancy" class="form-label fw-bold">Must have Skills </label>
                        <input type="text" class="form-control" required name="mustskill">
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="mb-3">
                        <label for="type" class="form-label fw-bold">Good to Have Skills</label>
                        <input type="text" class="form-control" required name="haveskill">
                    </div>
                </div>
            </div>
                <div class="row">
                        <div class="col-md-6 mt-4">
                            <div class="mb-3">
                                <label for="salary" class="form-label fw-bold">Salary</label>
                                <input type="number" class="form-control" required name="salary">
                            </div>
                        </div>
                        <div class="col-md-6 mt-4">
                            <div class="mb-3">
                                <label for="type" class="form-label fw-bold">Job Type</label>
                                <input type="text" class="form-control" required name="type">
                            </div>
                        </div>
                </div>
                
                    <div class="mb-3 fw-bold">
                        <label for="description">Job description</label>
                        <textarea class="form-control" placeholder="Enter JD here" name="description" required></textarea>
                    </div>
                    <div class="mb-3 fw-bold">
                        <label for="description">About Company</label>
                        <textarea class="form-control" placeholder="Enter JD here" name="about" required></textarea>
                    </div>
                </div>
            
            <div class="row">
                <div class="col-md-6">
                    <label class="fw-bold"> Upload Image</label>
                    <input type="file" name="image" required>
                </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary mb-5 mt-4" name="submit">UPLOAD</button>
                    </div>
                    </div>
                </form>

                </div>
                            <div class="col-md-2"></div>
                    </div>
            </div>

                                <div class="col-lg-6">

                                    
                                </div>

                            </div>

                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Website @designed </span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

    

            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="log_out.php" class="btn btn-outline-danger " type="submit" name="submit" value="Logout"> LOG-OUT </a>
                    </div>
            </div>
        </div>
    </div>

    
           <!-- Bootstrap core JavaScript-->
     <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <!-- jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    
    <!-- DataTables Responsive JS -->
    <!-- <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script> -->
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
        </body>

        </html>