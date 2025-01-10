

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
      background-image: url('assets/images/in.jpg');
    background-repeat:no-repeat;
    background-size:cover;
    }
      }

    </style>
   <body>
       
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-3"></div>
          <div class="col-md-6">
                <div class="card mt-5 ">
                  <div class="card-body">
                  <div class="text-center fs-3">Enter LOG-IN Details:
                  </div>
                  <?php
                  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                      $email = $_POST['email'];
                      $password = $_POST['password'];
                      $con = new mysqli("localhost", "root", "", "job_db");
                      $sql = "SELECT * FROM register_tbl WHERE email='$email'";
                      $res = mysqli_query($con, $sql);
                      if ($res && mysqli_num_rows($res) > 0) {
                          $row = mysqli_fetch_assoc($res);
                          session_start();
                          $_SESSION['id'] = $row['id']; 
                          $_SESSION['email'] = $row['email']; 

                          $_SESSION['dash_name'] = $row['name']; 
                          $_SESSION['user_image'] = $row['image'];
                          $pass = $row['password'];
                          $role = $row['role'];

                          if ($password==$pass) {
                    
                            if (isset($_SESSION['dash_name'])) {
                              if ($role === 'admin'  ) {
                                  header("Location: index.php");  // Admin dashboard
                              } else {
                                  header("Location: userdash.php");  // User dashboard
                              }
                              exit();
                          } 
                        } else {
                              echo "Incorrect password.";
                          }
                      } else {
                          echo "No user found with that email.";
                      }
                  }
                  ?>
                <form method='POST' action=''>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label fw-bold">Email id</label>
                      <i class="fa-solid fa-envelope fa-xl" style="color: #74C0FC;"></i>
                      <input type="email" name="email" class="form-control" placeholder="Enter e-mail" id="exampleInputEmail1" required aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label fw-bold">Password</label>
                      <i class="fa-solid fa-lock fa-xl" style="color: #B197FC;"></i>
                      <input type="password" name="password" class="form-control" placeholder="Enter password" required id="exampleInputPassword1">
                  </div> 
                  
                  <input type="hidden" name="usertype" value="admin">
                  <button type="submit" name="submit" class="btn btn-dark">Submit</button>
              </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3"></div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script type="text/javascript">
        // Check if session is destroyed and prevent browser cache
        if (performance.navigation.type === 2) {
            window.location.reload(true); // Reload if navigating from cache
        }
    </script>

  
<?php
include('footer.php');

?>
</body>
</html>