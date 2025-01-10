<?php
session_start();
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <?php
    include('header.php');
    include('connect.php');

    if (isset($_GET['name'])) {
        $name = mysqli_real_escape_string($con, $_GET['name']); 
        $sql = "SELECT * FROM register_tbl WHERE name='$name'";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>

            <div class="container mt-5">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Edit Profile</h2>
                    </div>
                    <div class="card-body">
                        <form action="profile_update.php" method="POST">
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="upname" class="form-control" value="<?= $row['name']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" id="address" name="upaddress" class="form-control" value="<?= $row['Address']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="qualification" class="form-label">Qualification</label>
                                <input type="text" id="qualification" name="upqualification" class="form-control" value="<?= $row['qualification']; ?>" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="profile.php?name=<?php echo $_SESSION['dash_name']; ?>" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
        } else {
            echo "<div class='alert alert-danger text-center'>Profile not found.</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-center'>Invalid request.</div>";
    }
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
