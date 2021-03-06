<?php
  session_start();
    $username=$_GET['id'];
    if(isset( $_SESSION['id'])&&$_SESSION['id']==$username){
         
    }else{
      header("location:home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script>
        function validateForm() {
            if (document.forms["formUpdate"]["name"].value == "") {
                alert ("Please fill your name.");
                document.forms["formUpdate"]["name"].focus();
                return false;
            }
            var namepattern = new RegExp("[a-zA-Z ]{3,50}");
            var resultpattern = namepattern.test(document.forms["formUpdate"]["name"].value);
            if(!resultpattern){
                alert("Please fill your first name with alphabet and space only. Minimum length allowed is 3 and maximum length allowed is 50");
                document.forms["formUpdate"]["name"].focus();
                return false;
            }
            if (document.forms["formUpdate"]["username"].value == "") {
                alert ("Please fill your username.");
                document.forms["formUpdate"]["username"].focus();
                return false;
            }
            var usernamepattern = new RegExp("^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$");
            var resultpattern = usernamepattern.test(document.forms["formUpdate"]["username"].value);
            if(!resultpattern){
                alert("Please fill your address with the right format(string+string|number)");
                document.forms["formUpdate"]["username"].focus();
                return false;
            }
            if (document.forms["formUpdate"]["email"].value == "") {
                alert ("Please fill your email.");
                document.forms["formUpdate"]["email"].focus();
                return false;
            }
            var emailpattern = new RegExp("[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}");
            var resultpattern = emailpattern.test(document.forms["formUpdate"]["email"].value);
            if(!resultpattern){
                alert("Please fill your email with the right format");
                document.forms["formUpdate"]["email"].focus();
                return false;
            }
            var addresspattern = new RegExp("[a-zA-Z0-9_.,:-]{3,200}");
            var resultpattern = addresspattern.test(document.forms["formUpdate"]["address"].value);
            if(!resultpattern){
                alert("Please fill your address with the right format");
                document.forms["formUpdate"]["address"].focus();
                return false;
            }
            if (document.forms["formUpdate"]["city"].value == "") {
                alert ("Please select your city.");
                document.forms["formUpdate"]["city"].focus();
                return false;
            }
            var citypattern = new RegExp("[a-zA-Z]{3,50}");
            var resultpattern = citypattern.test(document.forms["formUpdate"]["city"].value);
            if(!resultpattern){
                alert("Please fill your city with the right format");
                document.forms["formUpdate"]["city"].focus();
                return false;
            }
            if (document.forms["formUpdate"]["country"].value == "") {
                alert ("Please select your country.");
                document.forms["formUpdate"]["country"].focus();
                return false;
            }
            var countrypattern = new RegExp("[a-zA-Z]{3,50}");
            var resultpattern = countrypattern.test(document.forms["formUpdate"]["country"].value);
            if(!resultpattern){
                alert("Please fill your country with the right format");
                document.forms["formUpdate"]["country"].focus();
                return false;
            }
            if (document.forms["formUpdate"]["postalcode"].value == "") {
                alert ("Please select your postalcode.");
                document.forms["formUpdate"]["postalcode"].focus();
                return false;
            }
            var postalcodepattern = new RegExp("[0-9]{5}");
            var resultpattern = postalcodepattern.test(document.forms["formUpdate"]["postalcode"].value);
            if(!resultpattern){
                alert("Please fill your postalcode with the right format");
                document.forms["formUpdate"]["postalcode"].focus();
                return false;
            }
            if (document.forms["formUpdate"]["about"].value == "") {
                alert ("Please select your about.");
                document.forms["formUpdate"]["about"].focus();
                return false;
            }
            var aboutpattern = new RegExp("[a-zA-Z ]{3,50}"); 
            var resultpattern = aboutpattern.test(document.forms["formUpdate"]["about"].value);
            if(!resultpattern){
                alert("Please fill your about with the right format");
                document.forms["formUpdate"]["about"].focus();
                return false;
            }
        }
    </script>
</head>

<body id="page-top">
  <?php
    $id=$_GET['id'];
    $db_host='localhost';
    $db_database='raport';
    $db_username='root';
    $db_password='palembang27';
    // Connect //==> ini juga diganti
    $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
    if (mysqli_connect_errno()){
      die ("Could not connect to the database: <br />". mysqli_connect_error( ));
    }
    //Asign a query
    $query = " SELECT * FROM profile pro INNER JOIN admin a  ON a.id_admin=pro.id_admin where a.id_admin='".$id."'";
    // Execute the query
    $result = mysqli_query($con,$query);
    if (!$result){
      die ("Could not query the database: <br />". mysqli_error($con));//koneksi kueri error
    }
    $row = mysqli_fetch_array($result);
    $idadmin=$row['id_admin'];
  ?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <?php
        $username=$_GET['id'];
        echo '<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php?id='.$username.'">';
      ?>
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="sidebar-brand-text mx-6">Raport Online</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <?php
          $username=$_GET['id'];
          echo '<a class="nav-link" href="dashboard.php?id='.$username.'">';
        ?>
        <i class="fas fa-database"></i>
        <span>Dashboard</span>
        </a>
        <div class="sidebar-heading">
          Menu
        </div>
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php?halaman=data_nilai_siswa&id=<?php echo $username; ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Nilai Siswa</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php?halaman=data_siswa&id=<?php echo $username; ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Siswa</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php?halaman=detailMatkul&id=<?php echo $username; ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Kelola Mata Pelajaran</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php?halaman=detailkelas&id=<?php echo $username; ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Kelola Kelas</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php?halaman=data_pegawai&id=<?php echo $username; ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Pegawai</span></a>
        </li>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <div class="sidebar-heading">
          User
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <?php
          $user=$_GET['id'];
          echo '<a class="nav-link" href="detailprofileadmin.php?id='.$user.'">';
        ?> 
        <i class="fas fa-user-alt"></i>
        <span>User Profile</span>
        </a>
      </li>

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

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row['nama_admin'];?></span>
                <img class="img-profile rounded-circle" src="img/<?php echo $row['gambar'];?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="detailprofileadmin.php?id=<?php echo $username;?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="profileuseradmin.php?id=<?php echo $username;?>">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Setting Profile
                </a>
                <a class="dropdown-item" href="settingpassword.php?id=<?php echo $username;?>">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Setting Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User Profile</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-11">
                  <div class="card">
                    <div class="card-body">
                      <form id="formUpdate" method="POST" autocomplete="on" action="" onsubmit="return validateForm()">
                        <div class="row">
                          <div class="col-md-5 pr-1">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="name" class="form-control" placeholder="Full Name (maximum 50 characters)" size="50">
                            </div>
                          </div>
                          <div class="col-md-3 px-1">
                            <div class="form-group">
                              <label>Username</label>
                              <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                          </div>
                          <div class="col-md-4 pl-1">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-5 pr-1">
                          </div>
                            <!-- <div class="col-md-3 px-1">
                              <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                          </div>
                          <div class="col-md-4 pl-1">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Confirm Password</label>
                              <input type="password" name="c_password" class="form-control" placeholder="Confirm Password">
                            </div>
                          </div> -->
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Address</label>
                              <textarea type="text" name="address" class="form-control" placeholder="Address" rows="4" cols="80"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4 pr-1">
                            <div class="form-group">
                              <label>City</label>
                              <input type="text" name="city" class="form-control" placeholder="City">
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                          <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="country" class="form-control" placeholder="Country">
                          </div>
                        </div>
                        <div class="col-md-4 pl-1">
                          <div class="form-group">
                            <label>Postal Code</label>
                            <input type="number" name="postalcode" class="form-control" placeholder="ZIP Code">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>About Me</label>
                            <textarea rows="4" cols="80" name="about" class="form-control" placeholder="Here can be your description"></textarea>
                          </div>
                        </div>
                      </div>
                      <input type="submit" name="submit" class="btn btn-info btn-fill pull-right" value="Update Profile">
                      <div class="clearfix"></div>
                    </form>
                  </div>
                </div>
              </div>
            </div>   
          </div>

          <!-- Content Row -->
          <?php 
            if (isset($_POST['submit'])) {
              $nama = $_POST['name'];
              $username = $_POST['username'];
              $email = $_POST['email'];
              $address = htmlspecialchars($_POST['address']);
              $city = $_POST['city'];
              $country = $_POST['country'];
              $postalcode = $_POST['postalcode'];
              $about = htmlspecialchars($_POST['about']);

              if ($_POST['password']!=$_POST['password']){
                echo "<script>alert('Pastikan password dan konformasi password anda sama');</script>";
              }else{
              $query2 = "UPDATE admin SET nama_admin='".$nama."',username='".$username."',email='".$email."',address='".$address."' WHERE id_admin=".$idadmin." ";
              $query3 = "UPDATE profile SET address='".$address."', city='".$city."',country='".$country."',postalcode='".$postalcode."', about='".$about."' WHERE id_admin=".$idadmin." ";
              // // Execute the query
              // $result2 = mysqli_query($con,$query2);
              $result3 = $con->query($query2); 
              $result4 = $con->query($query3); 
              if ($result3 == TRUE && $result4 == TRUE  ) {
                echo "<script>alert('Berhasil Update');</script>";
              }else {
                echo "<script>alert('Gagal');</script>";
              }
              }
            }
          ?>
          <div class="row">

          </div>

          <!-- Content Row -->
          <div class="row">
            
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Raport Online Website 2019</span>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a class="btn btn-primary" href="home.php">Logout</a>
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

</body>

</html>
