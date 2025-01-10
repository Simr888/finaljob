<?php
include('header.php');
include('connect.php');
include('header1.php');

if (isset($_GET['id'])) {  
    $id = ($_GET['id']); 
    $sql ="SELECT * FROM newpost_tbl WHERE id = '$id'";
    $result=mysqli_query($con,$sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) 
        { ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="assets/images/hire1.webp" height="400px" alt="Job Image">
                    </div>
                    <div class="col-md-6 bg-light mt-5">
                        <div class="row g-0">
                            <div class="col-md-3 my-3 me-3 ms-4">
                                <img src="upload_image/images/<?php echo htmlspecialchars($row['image']); ?>" alt="image" height="90px" width="90px" class='img-fluid'>  
                            </div>
                        </div>

                        <h3 class="text-warning-emphasis mt-3 ">
                        <?php echo htmlspecialchars($row['vacancy']); ?></h3>
                        <p><?php echo htmlspecialchars($row['company']); ?></p>
                        <span class="fw-light"><i class="fa-solid fa-location-dot fa-lg"></i></span>
                        <?= htmlspecialchars($row['location']); ?> <br>
                        <span class="fw-light"><i class="fa-solid fa-wallet fa-lg"></i></span>
                        <?= htmlspecialchars($row['salary']); ?> <br><br>
                        <span class="fw-bold">Skills Must have:</span>
                        <?php echo htmlspecialchars($row['mustskill']); ?> <br>
                        <span class="fw-bold">Good if have Skills:</span>
                        <?php echo htmlspecialchars($row['haveskill']); ?>
                    </div>
                </div>
            </div>

            <div class="container card bg-light ">
                <h3 class="bold">Job description</h3>
                <span class="fw-medium">What you'll do?</span> 
                <?php echo htmlspecialchars($row['vacancy']); ?> <br> <br>
                <span class="fw-medium">Sal:</span> 
                <?php echo htmlspecialchars($row['salary']); ?> <br> <br>
                <span class="fw-medium">Qualification</span> 
                <?php echo htmlspecialchars($row['department']); ?> <br>
                <p>Interested candidates are requested to get your interview schedule</p> <br>
                <p class="fw-bold">Required Candidate profile</p>
                <span class="fw-medium">Skill: <?php echo htmlspecialchars($row['mustskill']); ?></span>
                <br>
                <p>2018-2028 candidates are only eligible</p>
            </div>

            <div class="container card bg-light my-4">
                <span class="fw-semibold">Department Specialization</span>
                <?php echo htmlspecialchars($row['department']); ?> <br> <br>
                <span class="fw-semibold">Role</span> 
                <?php echo htmlspecialchars($row['vacancy']); ?> <br> <br>
                <span class="fw-semibold">Employment Type</span> 
                <?php echo htmlspecialchars($row['type']); ?> <br>
                <span class="fw-medium">Skill: <?php echo htmlspecialchars($row['mustskill']); ?></span>
            </div>

            <p class="fw-light my-4 ms-5">This website does not promise a job or an interview in exchange for money. 
                Fraudsters may ask you to pay in the pretext of registration fees, refundable fees, etc. 
            </p>
            <hr>
            <div class="container card bg-light ">
                <span class="fw-medium">Company Name:</span> 
                <?php echo htmlspecialchars($row['company']); ?>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 my-3">
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Apply Now
                        </button>
                    </div>
                </div>
            </div>

            <form action="job.php" method="post" enctype="multipart/form-data">
            <div class="modal fade mt-3" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-4 text-center" id="exampleModalLabel">Job Application Form</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <span class="fw-semibold ms-4">Fill for <?php echo htmlspecialchars($row['vacancy']); ?></span>
                            <input type="hidden" name="applied_for" value="<?php echo $row['vacancy'];?>">

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label fw-bold">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email Address" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label fw-bold">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter name" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="exampleInputPhone" class="form-label fw-bold">Phone number</label>
                                    <input type="tel" id="phone" name="phone" pattern="\d{10}" maxlength="10" required><br><br>
                                    </div>
                                <div class="mb-3">
                                    <label for="exampleInputCover" class="form-label fw-bold">Skills</label>
                                    <textarea class="form-control" name="skills" id="floatingTextarea2" placeholder="Leave a comment here" style="height: 100px" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="resume" class="form-label fw-bold">Upload Resume</label>
                                    <p class="fw-light">Employer can download and view this resume</p>
                                    <input type="file" name="image" accept="application/pdf" id="resume" required>
                                </div>
                                <script>
                                    document.getElementById('resume').addEventListener('change', function(event) {
                                        const file = event.target.files[0];
                                        if (file) {
                                            if (file.type === 'application/pdf') {
                                                alert(`You selected: ${file.name}`);
                                            } else {
                                                alert('Please select a valid PDF file.');
                                                event.target.value = ''; // Clear the invalid input
                                            }
                                        }
                                    });
                                </script>
                                <button type="submit" class="btn btn-success m-3" name="submit">Apply Here</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        <?php
        }
    } else {
        echo "No records found.";
    }
}
?>
<?php 
include('footer.php');
?>
