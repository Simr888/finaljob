<?php
 session_start();
 if(!isset($_SESSION['dash_name'])){ 
    header('location: front.php');
  }
?>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
window.onload = function () {
    // First Chart - GDP Growth Rate
    var chart1 = new CanvasJS.Chart("chartContainer1", {
        animationEnabled: true,
        theme: "light2",
        title: {
            text: "Graph representation "
        },
        axisY: {
            title: "No. of fields appear",
            suffix: "%"
        },
        axisX: {
            title: "Fields appear"
        },
        data: [{
            type: "column",
            yValueFormatString: "#,##0.0#"%"",
            dataPoints: [
                <?php 
                    include('connect.php');
                    $countSql="SELECT COUNT(*) as count FROM newpost_tbl";
                     $countResult= mysqli_query($con,$countSql);
                     $countRow = mysqli_fetch_assoc($countResult);
                     $count = $countRow['count'];
                 ?>
                { label: "Jobs", y: <?php echo $count; ?> },    
                <?php 
                $countSql="SELECT COUNT(*) as count FROM hire_tbl";
                     $countResult= mysqli_query($con,$countSql);
                     $countRow = mysqli_fetch_assoc($countResult);
                     $count = $countRow['count'];
                 ?>
                { label: "Application recived", y: <?php echo $count; ?> },    
                <?php 
                    include('connect.php');
                    $countSql="SELECT COUNT(*) as count FROM register_tbl";
                     $countResult= mysqli_query($con,$countSql);
                     $countRow = mysqli_fetch_assoc($countResult);
                     $count = $countRow['count'];
                 ?>
                { label: "Register", y: <?php echo $count; ?> },  
                 { label: "Hiring", y: 2.50 },    
            ]
        }]
    });
    chart1.render();

    // Second Chart - Desktop Browser Market Share
    var chart2 = new CanvasJS.Chart("chartContainer2", {
        theme: "light2",
        exportEnabled: true,
        animationEnabled: true,
        title: {
            text: "Appox data of portal "
        },
        data: [{
            type: "pie",
            startAngle: 25,
            toolTipContent: "<b>{label}</b>: {y}%",
            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - {y}%",
            dataPoints: [
                <?php 
                    include('connect.php');
                    $countSql="SELECT COUNT(*) as count FROM newpost_tbl";
                     $countResult= mysqli_query($con,$countSql);
                     $countRow = mysqli_fetch_assoc($countResult);
                     $count = $countRow['count'];
                 ?>
                { label: "Jobs", y: <?php echo $count; ?> },    
                
                <?php 
                    include('connect.php');
                    $countSql="SELECT COUNT(*) as count FROM register_tbl";
                     $countResult= mysqli_query($con,$countSql);
                     $countRow = mysqli_fetch_assoc($countResult);
                     $count = $countRow['count'];
                 ?>
                { label: "Register", y: <?php echo $count; ?> },  
                <?php 
                    include('connect.php');
                    $countSql="SELECT COUNT(*) as count FROM newpost_tbl";
                     $countResult= mysqli_query($con,$countSql);
                     $countRow = mysqli_fetch_assoc($countResult);
                     $count = $countRow['count'];
                 ?>
                { label: "Newpost", y: <?php echo $count; ?> },               
                <?php 
                    include('connect.php');
                    $countSql="SELECT COUNT(*) as count FROM hire_tbl";
                     $countResult= mysqli_query($con,$countSql);
                     $countRow = mysqli_fetch_assoc($countResult);
                     $count = $countRow['count'];
                 ?>
                { label: "Hiring", y: <?php echo $count; ?> },                  
            ]
        }]
    });
    chart2.render();
}
</script>



<?php 
include_once('header.php');
include_once('navbar.php');
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jobs Posted</div>
                                                <?php 
                                                    include('connect.php');
                                                    $countSql="SELECT COUNT(*) as count FROM newpost_tbl";
                                                    $countResult= mysqli_query($con,$countSql);
                                                    $countRow = mysqli_fetch_assoc($countResult);
                                                    $count = $countRow['count'];
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Application received</div>
                                                <?php 
                                                    include('connect.php');
                                                    $countSql="SELECT COUNT(*) as count FROM hire_tbl";
                                                    $countResult= mysqli_query($con,$countSql);
                                                    $countRow = mysqli_fetch_assoc($countResult);
                                                    $count = $countRow['count'];
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                                <?php 
                                                    include('connect.php');
                                                    $countSql="SELECT COUNT(*) as count FROM hire_tbl";
                                                    $countResult= mysqli_query($con,$countSql);
                                                    $countRow = mysqli_fetch_assoc($countResult);
                                                    $count = $countRow['count'];
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                    <div class="row">
                    <div class="col-md-7 ms-2">
                    <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
                   
                    </div>
                    <div class="col-md-4 m-4">
                        <div class="card">
                        <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
                        </div>
                    </div>

                    </div>
                </div>
                    
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Website generated @designed</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="log_out.php" class="btn btn-outline-danger " type="submit" name="submit" value="Logout"> LOG-OUT </a>
                    </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>