<style>
/* Background container styling */
.background-container {
    background-image: url('assets/images/pro1.jpg');
    background-size: cover;
    background-position: center;
    height: 55vh; /* Half of the viewport height */
    width: 100%;
    position: relative;
}

/* Overlay content styling */
.overlay-content {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-align: center;
    padding: 0 20px;
}
.m{
    margin-top:18%;
}

/* Responsive adjustments for tablets */
@media (max-width: 768px) {
    .background-container {
        height: 40vh; /* Adjust to a slightly smaller height */
    }
    .overlay-content h1 {
        font-size: 1.5rem;
    }
}

/* Responsive adjustments for mobile devices */
@media (max-width: 480px) {
    .background-container {
        height: 30vh; /* Further reduce the height for smaller screens */
    }
    .overlay-content h1 {
        font-size: 1.2rem;
    }
}
</style>
<?php
include('header.php');
include('connect.php');
if (isset($_GET['name'])) {
    $name = mysqli_real_escape_string($con, $_GET['name']); 
    $sql= "SELECT * FROM register_tbl WHERE name='$name'";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        $row=mysqli_fetch_assoc($result);?>
                
            <!-- <img src="assets/images/pro1.jpg" class="image-fluid" height="60%"> -->
                <div class="background-container">
                        <div class="overlay-content">
                                    <div class="card mb-4 container m">
                            <div class="card-header text-center">
                                <img src="assets/images/ye.jpg" class="img-fluid" height="70px" width="64px">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title fs-3"> <?=$row['name'];?></h5>
                                <p class="card-text"><?php echo $row['Address'];?></p>
                            </div>
                            <div class=" text-center mt-2">
                                <p class="fw-lighter"><?=$row['qualification'];?> <br>
                                California University,Antartica</p>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <h2>63k</h2>
                                    <p class="fw-normal">Followers</p>
                                </div>
                                <div class="col-md-4">
                                <h2>780</h2>
                                <p class="fw-normal mb-5 ">Profile View</p></div>
                                <div class="col-md-4">
                                <h2>3k</h2>
                                <p class="fw-normal">Comments</p> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4 pb-3"><a href="userdash.php" role="button" class="pb-3 rounded pills btn btn-primary "> Go Back</a>
                                </div>
                                <div class="col-md-4"><a href="profile_edit.php" role="button" class="pb-3 rounded pills btn btn-secondary "> Update Profile</a></div>
                                

                            </div>
                        </div>
                        
                    </div>
                </div>
                    
                
                    <?php
        }

}?>
        
        


