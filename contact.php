<?php
include('header.php');
include('connect.php');
include('header1.php');


?>
<style>
.outer{
    background-image: url('assets/images/co.avif');  
    background-repeat:no-repeat;
    width: 100%;
    height: 220px;
    background-size: cover;
   }
    </style>
<section class="outer">
    <div class="container">
        <div class="row">
        <div class="col-md-4"></div>
          <div class="col-md-4 mt-5">
               <h1 class="fw-bold"> Get Started </h1> 
               <a href="log_in.php" class="ms-5 fw-bold">Log-in</a> /Contact
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</section>

<?php
if (isset($_POST['submit'])) {
    
    // Retrieve form data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

$sql = "INSERT INTO contact_tbl (name, email, subject, message) 
            VALUES ('$name', '$email', '$subject', '$message')";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Your message is sent, we'll contact you soon');</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
    
}
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <form action="" method="post">
                        <div class="row mt-5">
                            <div class="col-md-6">
                            <div class="mb-3 ">
                                    <label for="exampleInputEmail1" class="form-label">Name:</label>
                                    <input type="name" name="name" class="form-control" placeholder="Name" id="exampleInputEmail1" aria-describedby="emailHelp"required >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">E-mail:</label>
                                    <input type="email" name="email" autocomplete="off" class="form-control" placeholder="E-mail" id="exampleInputPassword1" required>
                                </div>
                            </div>
                        </div>
                <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Subject:</label>
                        <input type="text" name="subject" class="form-control" placeholder="Enter subject here" id="exampleInputPassword1" required>
                    </div>
                        <div class=" form-label mb-3">
                        <label >Message:</label>
                <textarea class="form-control" name="message" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        </div>
                    
                <button type="submit" class="btn btn-success" name="submit" onclick="sendMessage()">Send Message</button>
            </form>
            </div>
            <div class="col-md-6 mt-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224345.89796514777!2d77.04416849523396!3d28.52755441146828!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd5b347eb62d%3A0x52c2b7494e204dce!2sNew%20Delhi%2C%20Delhi!5e0!3m2!1sen!2sin!4v1727782909192!5m2!1sen!2sin" width="600" height="450" style="border:0;" 
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>
<!--  -->
    <?php 
    include('footer.php');
    ?>
    