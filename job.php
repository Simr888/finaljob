<?php
error_reporting(0);
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Load Composer's autoloader (if you're using Composer)
require 'vendor/autoload.php';
$con = mysqli_connect('localhost', 'root', '', 'job_db'); // Update with your database credentials
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['submit'])) {
    // Sanitize form inputs
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $skills = htmlspecialchars($_POST['skills']);
    $applied_for = htmlspecialchars($_POST['applied_for']);

    // File upload
    $filename = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    // Allowed file types
    $allowedExtensions = ['pdf'];

    // Directory for uploads
    $upload_dir = "uploads/";

    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "Only PDF files are allowed.";
        exit;
    } else {
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $upload_path = $upload_dir . basename($filename);

        if (!move_uploaded_file($fileTmpName, $upload_path)) {
            echo "Failed to upload the file.";
            exit;
        }
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // SMTP server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'simran.jsr06@gmail.com'; // Your email
        $mail->Password = 'tyeg oesb kmvf kped'; // Your app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Admin email
        $adminEmail = 'admin@example.com';
        $mail->setFrom('your-email@gmail.com', 'Job Portal');
        $mail->addAddress($adminEmail);
        $mail->addReplyTo($email, $name);

        // Attachments
        $mail->addAttachment($upload_path);

        // Email content to admin
        $mail->isHTML(true);
        $mail->Subject = "New Job Application from $name";
        $mail->Body = "
            <html>
            <body>
                <p>A new job application has been submitted:</p>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Skills:</strong> $skills</p>
                <p><strong>Resume:</strong> Attached</p>
            </body>
            </html>
        ";

        // Send email to admin
        $mail->send();
        echo "<script>alert('Email sent successfully to admin.')</script>";
        header("Location:hire.php");

        // Insert into database
        $sql = "INSERT INTO hire_tbl (email, name, phone, skills, applied_for, image, date) 
                VALUES ('$email', '$name', '$phone', '$skills', '$applied_for', '$filename', NOW())";
        $result = mysqli_query($con, $sql);

        if (!$result) {
            echo "Database error: " . mysqli_error($con);
            exit;
        }

        // Send confirmation email to applicant
        $mail->clearAddresses();
        $mail->addAddress($email);
        $mail->Subject = "Thank you for applying!";
        $mail->Body = "
            <html>
            <body>
                <div>
                    <h1>Application Confirmation</h1>
                    <p>Dear $name,</p>
                    <p>Thank you for applying for the job position. We have received your application and will review it shortly.</p>
                    <p>We appreciate your interest in joining our team!</p>
                </div>
            </body>
            </html>
        ";
        $mail->send();
        echo "Confirmation email sent to applicant.";

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Close the database connection
mysqli_close($con);
?>


