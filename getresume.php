<?php
session_start(); 

error_reporting(0);
include('connect.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

    ob_start();
require 'dompdf/autoload.inc.php';  // Make sure this path is correct
use Dompdf\Dompdf;
use Dompdf\Options;

if (isset($_POST['submit'])) {
    // Step 2: Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $linkedin = $_POST['linkedin'];
    $objective = $_POST['objective'];
    $degree = $_POST['degree'];
    $university = $_POST['university'];
    $grad_year = $_POST['grad_year'];
    $job_title = $_POST['job_title'];
    $company = $_POST['company'];
    $duration = $_POST['duration'];
    $responsibilities = $_POST['responsibilities'];
    $skills = $_POST['skills'];
    $certifications = $_POST['certifications'];

    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['linkedin'] = $linkedin;
    $_SESSION['objective'] = $objective;
    $_SESSION['degree'] = $degree;
    $_SESSION['university'] = $university;
    $_SESSION['grad_year'] = $grad_year;
    $_SESSION['job_title'] = $job_title;
    $_SESSION['company'] = $company;
    $_SESSION['duration'] = $duration;
    $_SESSION['responsibilities'] = $responsibilities;
    $_SESSION['skills'] = $skills;
    $_SESSION['certifications'] = $certifications;

    // Insert data into the database
    $sql = "INSERT INTO resume_tbl (name, email, phone, linkedin, objective, degree, university, grad_year, job_title, company, duration, responsibilities, skills, certifications)
            VALUES ('$name', '$email', '$phone', '$linkedin', '$objective', '$degree', '$university', '$grad_year', '$job_title', '$company', '$duration', '$responsibilities', '$skills', '$certifications')";

    if ($con->query($sql) === TRUE) {
        // Generate the HTML for the resume
        $html = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; margin: 40px; }
                h1, h2 { color: #333; }
                .container { width: 100%; max-width: 800px; margin: 0 auto; }
                .section { margin-bottom: 20px; }
                .section h3 { margin-bottom: 5px; }
                .section p { margin: 0; }
                .resume-header { text-align: center; }
                .resume-header h1 { margin: 0; font-size: 24px; }
                .contact-info { text-align: center; }
                .contact-info p { margin: 5px 0; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='resume-header'>
                    <h1>Resume of $name</h1>
                </div>
                <div class='contact-info'>
                    <p><strong>Email:</strong> $email</p>
                    <p><strong>Phone:</strong> $phone</p>
                    <p><strong>LinkedIn:</strong> $linkedin</p>
                </div>

                <div class='section'>
                    <h3>Objective</h3>
                    <p>$objective</p>
                </div>

                <div class='section'>
                    <h3>Education</h3>
                    <p><strong>$degree</strong> from $university, Graduated: $grad_year</p>
                </div>

                <div class='section'>
                    <h3>Work Experience</h3>
                    <p><strong>$job_title</strong> at $company ($duration)</p>
                    <p><strong>Responsibilities:</strong><br/>$responsibilities</p>
                </div>

                <div class='section'>
                    <h3>Skills</h3>
                    <p>$skills</p>
                </div>

                <div class='section'>
                    <h3>Certifications</h3>
                    <p>$certifications</p>
                </div>
            </div>
        </body>
        </html>
        ";

        // Initialize DOMPDF options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);

        // Load the HTML content
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF (first pass to compute the file)
        $dompdf->render();

        // Stream the PDF to the browser (forces download)
        $dompdf->stream("resume_$name.pdf", array("Attachment" => 1));
        session_destroy();
        // Exit to ensure no further output is sent
        exit;
    } else {
        // Output database error if insert fails
        echo "Error: " . $con->error;
    }
}

// End output buffering to clean any unwanted output before rendering the PDF
ob_end_clean();  // Clean up any output that was generated before the PDF rendering
?>
<?php
include('header1.php');
include('header.php');
?>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Create Your Resume</h2>
<form action="" method="POST">
      <div class="card mb-4">
        <div class="card-header">
          <h5>Personal Information</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="tel" id="phone" name="phone" class="form-control" required>            
            </div>
            <div class="col-md-6 mb-3">
              <label for="linkedin" class="form-label">LinkedIn</label>
              <input type="text" id="linkedin" name="linkedin" class="form-control">
            </div>
          </div>
        </div>
      </div>

      <!-- Career Objective Section -->
      <div class="card mb-4">
        <div class="card-header">
          <h5>Objective</h5>
        </div>
        <div class="card-body">
          <textarea name="objective" class="form-control" rows="4" placeholder="Write your career objective or summary here..."></textarea>
        </div>
      </div>

      <!-- Education Section -->
      <div class="card mb-4">
        <div class="card-header">
          <h5>Education</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="degree" class="form-label">Degree</label>
              <input type="text" id="degree" name="degree" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
              <label for="university" class="form-label">University</label>
              <input type="text" id="university" name="university" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
              <label for="grad_year" class="form-label">Graduation Year</label>
              <input type="text" id="grad_year" name="grad_year" class="form-control">
            </div>
          </div>
        </div>
      </div>

      <!-- Work Experience Section -->
      <div class="card mb-4">
        <div class="card-header">
          <h5>Work Experience</h5> (if any)
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="job_title" class="form-label">Job Title</label>
              <input type="text" id="job_title" name="job_title" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
              <label for="company" class="form-label">Company</label>
              <input type="text" id="company" name="company" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
              <label for="duration" class="form-label">Duration</label>
              <input type="text" id="duration" name="duration" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
              <label for="responsibilities" class="form-label">Responsibilities</label>
              <textarea id="responsibilities" name="responsibilities" class="form-control" rows="4"></textarea>
            </div>
          </div>
        </div>
      </div>

      <!-- Skills Section -->
      <div class="card mb-4">
        <div class="card-header">
          <h5>Skills</h5>
        </div>
        <div class="card-body">
          <textarea name="skills" class="form-control" rows="3" placeholder="List your skills, e.g., JavaScript, Python, Communication, etc."></textarea>
        </div>
      </div>

      <!-- Certifications Section -->
      <div class="card mb-4">
        <div class="card-header">
          <h5>Certifications</h5>
        </div>
        <div class="card-body">
          <textarea name="certifications" class="form-control" rows="3" placeholder="List certifications you have obtained."></textarea>
        </div>
      </div>

      <!-- Submit Button -->
      <div class="d-flex justify-content-center mt-4">
        <button type="submit" class="btn btn-primary" name="submit">Generate Resume</button>
      </div>
      
    </form>
  </div>


<?php
include('footer.php');
?>