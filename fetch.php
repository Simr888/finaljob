<?php
include('connect.php');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$output = '';

if (isset($_POST["search"])) {
    $search = $con->real_escape_string($_POST["search"]);
    $sql = "SELECT * FROM newpost_tbl WHERE vacancy LIKE '%$search%'";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $output .= '<h4>Search Results</h4>';
        while ($row = $result->fetch_assoc()) {
            $output .= '<div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">' . htmlspecialchars($row["vacancy"]) . '</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">' . htmlspecialchars($row["company"]) . '</h6>
                            </div>
                        </div>';
        }
    } else {
        $output = '<p>No results found</p>';
    }
} else {
    $output = '<p>Invalid search request</p>';
}

echo $output;
$con->close();
?>
