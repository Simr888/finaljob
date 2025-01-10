<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include('connect.php');

if (isset($_GET['id'])) {
    // Get the applicant's ID from the URL
    $id = $_GET['id'];

    // Fetch applicant details
    $sql = "SELECT * FROM hire_tbl WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    $applicant = mysqli_fetch_assoc($result);

if ($applicant && $applicant['status'] === 'not approved') {
        // Update the applicant's status to 'approved'
        $updateSql = "UPDATE hire_tbl SET status='approved' WHERE id='$id'";
        if (mysqli_query($con, $updateSql)) {
            // Initialize PHPMailer
            $mail = new PHPMailer(true);

            try {
                // Configure SMTP
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'simran.jsr06@gmail.com';
                $mail->Password   = 'tyeg oesb kmvf kped';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                // Set up email
                $mail->setFrom('your-email@example.com', 'Job Portal');
                $mail->addAddress($applicant['email']); // Applicant's email

                // Email content
                $mail->isHTML(true);
                $mail->Subject = "Your Job Application Has Been Approved";
                $mail->Body    = "
                    <html>
                        <body>
                            <p>Dear {$applicant['name']},</p>
                            <p>We are pleased to inform you that your job application has been approved.</p>
                            <p>Best Regards,<br>The Job Portal Team</p>
                            <p> Your interview will be scheduled soon !! </p>
                            <h1>HAPPY APPLYING</h1>
                        </body>
                    </html>
                ";

                $mail->send();
                echo "<script>alert('Approval email sent to the applicant');</script>";
            } catch (Exception $e) {
                echo "<script>alert('Error sending email: {$mail->ErrorInfo}');</script>";
            }

            // Redirect back to the main page
            header("Location: received.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    } else {
        echo "Applicant not found or already approved.";
        exit();
    }
} 

?>
