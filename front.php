<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php 
    include('header1.php');
  ?>
 <style>
    .container-fluid p,h2{
      display: flex;
      align-items: center;
      
    }
  </style>
    
  <style>
    .outer{
    background-image: url('upload_image/images/top.jpg');  background-repeat:no-repeat;
    width: 100%;
    height: 450px;
    background-size: cover;
   }
  </style>
  <style>
    .no{
      margin-left: 100px;
    }
    </style>
    <section class="outer img-fluid">
     <div class="container">
       <div class="row">
        <div class="col-md-4"> </div>
        <div class="col-md-4 mt-5">
           <h2 class="mt-5 text-dark fw-bolder">Find Your Dream Job Here Easily And Quickly</h2>
             <p class="text-dark fw-semibold">Explore our extensive database of job listings across various industries, tailored job recommendations, and valuable resources to enhance your job search. Join our community today and take the next step toward a fulfilling career!</p>
             <form>
                <div class="mb-3">
                <input type="text" class="form-control" id="search_text" placeholder="Search Jobs here" autocomplete="off">
                </div>
                <div id="result" ></div>
              </form>
            </div> 
        <div class="col-md-4"></div>   
      </div>
     </div>
    </section> 
    
    <script>
        $(document).ready(function() {
        $('#search_text').keyup(function() {
    var txt = $(this).val();  //this is to access the input value which is in text type..
    $.ajax({
      url: "fetch.php",         
      method: "POST",           
      data: { search: txt },    
      success: function(response) {
        $('#result').html(response); //# is for id tracking
      },
      error: function(xhr, status, error) {
        console.error("AJAX Error:", error);
      }
    });
  });
});
</script>

<section>
      <div class="container my-4">
      <h1 class="fw-bold text-primary-emphasis text-center">HOW'S IT WORKS</h1>
      <p class="fs-6 text-center"> Our motto is to pass through our portal in order to make ur career .</p>
     </div>
    </section>
  <div class="container">
    <div class="row">
     <div class="col-md-4">
       <div class="card bg-primary mb-3">
         <div class="card-body">
           <h1 class="card-title text-light">1.</h1>
           <h5 class="text-light"> Register-Login</h5>
           <p class="card-text text-light">By clicking on Log-in u will be able to redirect to our log-in page.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
       <div class="card mb-3">
         <div class="card-body">
           <h1 class="card-title text-primary">2.</h1>
           <h5 class="text-primary-emphasis"> Submit</h5>
           <p class="card-text">On submitting ur data will be set, further actions will be taken.</p>
          </div>
        </div>
      </div>
        <div class="col-md-4">
       <div class="card mb-3">
         <div class="card-body">
           <h1 class="card-title text-primary">3.</h1>
           <h5 class="text-primary-emphasis"> Apply</h5>
           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section>
    <div class="container mt-5">
        <div class="offer">
           <h1 class="fw-bold text-primary-emphasis">Job Categories</h1>
           <p> Lorem ipsum dolor sit amet </p>
          </div>
      </div>
  </section>
  <style>
    .yes {
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%; /* Creates a circular area */
        overflow: hidden; /* Ensures the image fits within the rounded area */
        width: 96px; /* Width of the circular area */
        height: 96px; /* Height of the circular area */
        margin: 20px auto; /* Center horizontally and add vertical spacing */
        transition: transform 0.3s ease;
    }

    .image-container img {
        width: 100%; /* Makes the image fill the container */
        height: auto; /* Keeps the image aspect ratio */
        transform: scale(1.1);
    }

    .hi {
        text-align: center; /* Center-aligns text in the card */
    }

    .card-img-top {
        transition: all 0.3s;
    }

    .card-img-top:hover {
        transform: scale(1.15);
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
            <div class="card">
                <img src="assets/images/j2.png" class="card-img-top rounded-circle yes img-fluid" alt="Data Analyst">
                <div class="card-body hi">
                    <h5 class="card-title">Data Analyst</h5>
                    <p class="card-text"><small class="text-body-secondary">2708 Scenic Way, IL 62373</small></p>
                    <button class="btn btn-outline-success">
                        <a href="find.php" style="text-decoration: none; color: inherit;">View More</a>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
            <div class="card">
                <img src="assets/images/j1.png" class="card-img-top rounded-circle yes img-fluid" alt="New Product Mockup">
                <div class="card-body hi">
                    <h5 class="card-title">New Product Mockup</h5>
                    <p class="card-text"><small class="text-body-secondary">2708 Scenic Way, IL 62373</small></p>
                    <button class="btn btn-outline-success">
                        <a href="find.php" style="text-decoration: none; color: inherit;">View More</a>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
            <div class="card">
                <img src="assets/images/j3.png" class="card-img-top rounded-circle yes img-fluid" alt="Custom Php Developer">
                <div class="card-body hi">
                    <h5 class="card-title">Custom Php Developer</h5>
                    <p class="card-text"><small class="text-body-secondary">3765 C Street, Worcester</small></p>
                    <button class="btn btn-outline-success">
                        <a href="find.php" style="text-decoration: none; color: inherit;">View More</a>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
            <div class="card">
                <img src="assets/images/j4.png" class="card-img-top rounded-circle yes img-fluid" alt="HTML5 & CSS3 Coder">
                <div class="card-body hi">
                    <h5 class="card-title">HTML5 & CSS3 Coder</h5>
                    <p class="card-text"><small class="text-body-secondary">2719 Burnside Avenue, Logan</small></p>
                    <button class="btn btn-outline-success">
                        <a href="find.php" style="text-decoration: none; color: inherit;">View More</a>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
            <div class="card">
                <img src="assets/images/j5.png" class="card-img-top rounded-circle yes img-fluid" alt=".NET Developer">
                <div class="card-body hi">
                    <h5 class="card-title">.NET Developer</h5>
                    <p class="card-text"><small class="text-body-secondary">3815 Forest Drive, Alexandria</small></p>
                    <button class="btn btn-outline-success">
                        <a href="find.php" style="text-decoration: none; color: inherit;">View More</a>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
            <div class="card">
                <img src="assets/images/j6.png" class="card-img-top rounded-circle yes img-fluid" alt="Photoshop Designer">
                <div class="card-body hi">
                    <h5 class="card-title">Photoshop Designer</h5>
                    <p class="card-text"><small class="text-body-secondary">32865 Emma Street, Lubbock</small></p>
                    <button class="btn btn-outline-success">
                        <a href="find.php" style="text-decoration: none; color: inherit;">View More</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

  <section>
  <div class="container my-4">
      <h1 class="fw-bold text-primary-emphasis text-center">HOW'S IT WORKS</h1>
      <p class="fs-6 text-center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit saepe facere.</p>
     </div>
    </section>
    
<section>
      <div class="container ">
      <div class="mb-3 ">
      <?php
include('connect.php');

$sql = "SELECT * FROM newpost_tbl";
$result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="row g-0">
            <div class="col-md-3 my-3 me-3">
                <img src="uploads/<?php echo $row['image']; ?>" alt="image" height="400px" width="400px" class='img-fluid'>  
            </div>
            <div class="col-md-4">
            <h3 class="fw-bold text-primary-emphasis mt-3"><?php echo($row['vacancy']);?> </h3>
              <p class="card-text"><?php echo($row['description']);?></p>
                <button class="btn btn-light" type="submit"><a href="hire.php?id=<?php echo $row['id']; ?>">Apply Now</a></button>
              </div>
            <div class="col-md-4 mt-5"><p class="fw-bold no">&#8377;<?= $row['salary'];?>/month</p></div>
        </div>
    <?php
    
    }
?>

  </div>
</div>
</section>
  <section>
    <div class="container bg-primary mt-5">
      <div class="row">
       <div class="col-md-3 bg-danger-subtle">
           <img src="assets/images/gl.avif" width="250px" class="img-fluid rounded-start" alt="...">
        </div>
          <div class="col-md-7  mt-5">
           <p class="text-white"> A job portal is an essential platform connecting job seekers and employers. It streamlines the hiring process by offering tools to post jobs, search for candidates, and manage applications. Effective job portals provide a user-friendly interface, advanced search filters, and seamless communication features.

           </p>
             <p class="fw-bold text-white fs-5">Simran</p>
             <small class="text-white">Product Manager</small>
          </div>
          <div class="col-md-2"></div>
      </div>
    </div>
    <div class="container bg-primary">
      <div class="row">
       <div class="col-md-6 mt-5">  
        <p class="text-white">A job portal is an essential platform connecting job seekers and employers. It streamlines the hiring process by offering tools to post jobs, search for candidates, and manage applications. Effective job portals provide a user-friendly interface, advanced search filters, and seamless communication features.</p>
          <p class="fw-bold text-white fs-5">Adam Smith</p>
          <small class="text-white">Product Manager</small>

        </div>
        <div class="col-md-2"></div>
          <div class="col-md-4 mt-5 bg-light">
             <img src="assets/images/by.webp" width="250px" class=" img-fluid rounded float-end" alt="...">
           </div>
        </div>
    </div>
  </section>
  <section>
      <div class="container">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8 text-center mt-5"> 
            <h1 class="fw-bold text-primary-emphasis">Subscribe Newsletter</h1>
            <p class="fs-6"> We’re here to support your job search journey and keep you in the loop on exciting new opportunities. </p>
          </div>
          <div class="col-md-2"></div>
       </div>
     </div>
    </section>
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-5">
    <form class="d-flex mt-3" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-warning" id="search" type="submit">Search</button>
    </form>
    </div>
    <div class="col-md-4"></div>
    </div>
    </div>
    <?php
    include('footer.php');
    ?>
      <p style="text-align: center;">  © Copyright Jobget Rights Reserved</p>
      <p style="text-align: center;">Designed by simran</p>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>