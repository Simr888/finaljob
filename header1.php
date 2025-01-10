<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jobsearching</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    /* Sidebar styles for mobile */
    #sidebar {
      height: 100%;
      width: 0;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #f8f9fa;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
      z-index: 1045; /* ensures it appears above other elements */
    }

    #sidebar a {
      padding: 10px 15px;
      text-decoration: none;
      font-size: 1.1rem;
      color: #333;
      display: block;
      transition: 0.3s;
    }

    #sidebar a:hover {
      color: #007bff;
    }

    #sidebar .closebtn {
      position: absolute;
      top: 0;
      right: 15px;
      font-size: 2rem;
      color: #333;
    }
  </style>
  <style>
        .color {
            background-color: rgb(0, 51, 105); 
            
        }
    </style>
</head>

<body>
  <nav class="navbar text-light sticky-top navbar-expand-lg fixed-top color">
    <div class="container  text-light">
      <div class="col-md-3">
        <img src="assets/images/logo.jpg" class="image-fluid" height="68px">
      </div>
      <div class="col-md-7 d-none d-lg-flex"> <!-- Visible only on large screens -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="front.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="find.php">Find a job</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="getresume.php">Create Resume</a>
          </li>
        </ul>
      </div> 
      <div class="col-md-2 d-none d-lg-flex "> <!-- Visible only on large screens -->
        <a href="log_in.php" class="btn btn-light text-primary-emphasis me-2" type="submit">Log-in</a>
        <a href="register.php" class="btn btn-light text-primary-emphasis" type="submit">Register</a>
      </div>
      <!-- Sidebar Toggle Button for Mobile -->
      <button class="btn btn-outline-primary d-lg-none" onclick="toggleSidebar()">☰ Menu</button>
    </div>
  </nav>

  <!-- Sidebar -->
  <div id="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()">&times;</a>
    <a href="front.php">Home</a>
    <a href="find.php">Find a job</a>
    <a href="contact.php">Contact</a>
    <a href="log_in.php">Log-in</a>
    <a href="register.php">Register</a>
  </div>

  <script>
    function toggleSidebar() {
      var sidebar = document.getElementById("sidebar");
      if (sidebar.style.width === "100%") {
        sidebar.style.width = "0";
      } else {
        sidebar.style.width = "100%";
      }
    }
  </script>

  <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6731bd712480f5b4f59b88ec/1icd4o1do';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>
</html>
