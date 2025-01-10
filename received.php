<?php
include('topheader.php');

include('header.php');
include('navbar.php');
include('connect.php');
$sql= "SELECT * FROM hire_tbl";
$result= mysqli_query($con,$sql);
if(!$result){
    echo "no there's error";
}
$num=1;
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Overview Post</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">
    
    <!-- DataTables Responsive CSS -->
    <link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css" rel="stylesheet">
    
    <style>
      /* Custom styles for better mobile view */
      table img {
        max-width: 100%;
        height: auto;
      }
    </style>
    
  </head>
  <body class="bg-primary-subtle">
    <div class="container mt-5">
      <div class="row">
        <div class="col">
          <p class="text-center text-danger-emphasis fs-4 fw-bolder">VIEW Applicants</p>
          
          <!-- Table Responsive Wrapper -->
          <div class="table-responsive">
            <table id="#postTable" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col">S.no</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Name</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Skills</th>
                  <th scope="col">Documents</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>

              <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                  <tr>
                    <th scope="row"><?= $num; ?></th>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['phone']; ?></td>
                    <td><?= $row['skills']; ?></td>
                    <td>  <embed src="upload_image/images/<?= $row['image']; ?>"  width="80px" height="80px" >

                      <!-- <img src="upload_image/images/<?= $row['image']; ?>" alt="image" height="80px" width="80px"> -->
                    </td>
                    <td><td>
                <?php 
                    if ($row['status'] === 'not approved') { ?>
                        <!-- Red Approve button if not approved -->
                        <a href="method.php?id=<?= $row['id']; ?>" class="btn btn-danger">Pending</a>
                    <?php } else { ?>
                        <!-- Green Approved button if already approved -->
                        <button class="btn btn-success" >Approved</button>
                    <?php }
                     ?>
                </td>
                  </tr>
                <?php $num++; } ?>
              </tbody>
            </table>
          </div> <!-- End of .table-responsive -->
        </div>
      </div>
    </div>
    
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


    <!-- jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    
    <!-- DataTables Responsive JS -->
    <!-- <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script> -->
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- DataTables Initialization with Responsive -->
    <script>
      $(document).ready(function() {
          $('#postTable').DataTable({
          });
      });
    </script>
    
  </body>
</html>
