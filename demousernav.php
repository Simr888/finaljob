

<?php
include('header.php');
?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" >
                
                <div class="sidebar-brand-text mx-3"> WELCOME </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="userdash.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Get Interview Ready -->
<li class="nav-item">
    <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseOne" 
       aria-expanded="false" aria-controls="collapseOne">
        <i class="fas fa-fw fa-cog"></i>
        <span>Get Interview Ready</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="ques.php">Questions Here</a>
        </div>
    </div>
</li>

<!-- Overview -->
<li class="nav-item">
    <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo" 
       aria-expanded="false" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Overview</span>
    </a>
    <?php
    
        include('connect.php');
        $sql = "SELECT * FROM hire_tbl";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_name'] = $row['name'];
    ?>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="user_table.php?name=<?= $_SESSION['user_name']; ?>">View Post</a>
        </div>
    </div>
</li>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap 4 Bundle (contains both Bootstrap and Popper.js) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
    // Get the current page's path
    const currentPath = window.location.pathname.split("/").pop();

    // Select all collapse items
    const collapseItems = document.querySelectorAll(".collapse-item");

    collapseItems.forEach(item => {
        const itemPath = item.getAttribute("href");

        // Check if the href matches the current page
        if (currentPath === itemPath) {
            item.classList.add("active"); // Mark the link as active

            // Expand the parent collapse section
            const parentCollapse = item.closest(".collapse");
            if (parentCollapse) {
                const parentNav = parentCollapse.closest(".nav-item");
                if (parentNav) {
                    parentNav.classList.add("active");
                }
            }
        } else {
            item.classList.remove("active"); // Remove active class from other items
        }
    });
});


</script>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <script>
                document.addEventListener("DOMContentLoaded", () => {
            const currentPath = window.location.pathname.split("/").pop();
            const sidebarLinks = document.querySelectorAll(".collapse-item");

            sidebarLinks.forEach(link => {
                const itemPath = link.getAttribute("href");

                if (currentPath === itemPath) {
                    // Add active class to the sidebar link
                    link.classList.add("active");

                    // Expand the parent collapse
                    const parentCollapse = link.closest(".collapse");
                    if (parentCollapse) {
                        parentCollapse.classList.add("show");
                    }

                    // Highlight the parent nav item
                    const parentNav = link.closest(".nav-item");
                    if (parentNav) {
                        parentNav.classList.add("active");
                    }
                } else {
                    link.classList.remove("active");
                }
            });

            // Ensure dropdown-menu remains accessible
            const userDropdownToggle = document.querySelector("#userDropdown");
            if (userDropdownToggle) {
                userDropdownToggle.addEventListener("click", function () {
                    const dropdownMenu = document.querySelector(".dropdown-menu");
                    if (dropdownMenu) {
                        dropdownMenu.classList.toggle("show");
                    }
                });
            }
        });
</script>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        
                           
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            
                            
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" id="userDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                            <?php echo $_SESSION['dash_name']; ?>
                                        </span>
                                        <img class="img-profile rounded-circle" src="assets/images/register.png" width="3%" height="5%">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                        aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="profile.php?name=<?php echo $_SESSION['dash_name']; ?>">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Profile
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="log_out.php" type="submit" name="submit" value="Login" data-toggle="modal" data-target="#logoutModal">                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout

                                        </a>

                                        </div>
                                </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
           