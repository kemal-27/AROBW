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
    <style>
        #dataTableAdd td:first-child, #dataTableEdit td:first-child
        {
            width: 17%;
        }

        #dataTableAdd td:nth-child(2), #dataTableEdit td:nth-child(2)
        {
            width: 0%;
        }
        
        #dataTableAdd td:nth-child(3), #dataTableEdit td:nth-child(3)
        {
            width: 60%;
        }

        #dataTableAdd td:nth-child(4), #dataTableEdit td:nth-child(4)
        {
            width: 60%;
        }

        input:not([type=button]):not([type=submit]):not(.form-control), textarea, select
        {
            width: 100%;
            -moz-box-sizing:border-box;
            -webkit-box-sizing:border-box;
            box-sizing:border-box;
        }
    </style>

</head>

<body id="page-top">

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
      <?php
        $search_kata = "";
        if(isset($_POST['submit_search']))
        {
            $search_kata = $_POST['search'];
            header("location: dashboard.php?halaman=search_page&id=".$_GET['id']."&search_word=".$search_kata);
        }
        $id=$_GET['id'];
        $db_host='localhost';
        $db_database='raport';
        $db_username='root';
        $db_password='';
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
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
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
      <li class="nav-item">
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
          <?php
              if(isset($_GET['halaman']))
              {
                  if($_GET['halaman'] == "data_pegawai")
                  {
                    require_once 'data_pegawai.php';
                  }
                  else if($_GET['halaman'] == "add_database")
                  {
                    require_once 'addDatabase.php';
                  }
                  else if($_GET['halaman'] == "edit_database")
                  {
                    require_once 'editDatabase.php';
                  }
                   else if($_GET['halaman'] == "deleteMapel")
                  {
                    require_once 'deleteMapel.php';
                  }
                   else if($_GET['halaman'] == "editMapel")
                  {
                    require_once 'editMapel.php';
                  }
                   else if($_GET['halaman'] == "detailMatkul")
                  {
                    require_once 'detailmatkul.php';
                  }
                  else if($_GET['halaman'] == "tambahMapel")
                  {
                    require_once 'tambahMapel.php';
                  }
                  else if($_GET['halaman'] == "addNilai")
                  {
                    require_once 'addNilai.php';
                  }
                   else if($_GET['halaman'] == "tambahNilai")
                  {
                    require_once 'tambahNilai.php';
                  }
                   else if($_GET['halaman'] == "tambahkelas")
                  {
                    require_once 'tambahKelas.php';
                  }
                  else if($_GET['halaman'] == "editkelas")
                  {
                    require_once 'editKelas.php';
                  }
                  else if($_GET['halaman'] == "detailNilai")
                  {
                    require_once 'detailNilai.php';
                  }
                  else if($_GET['halaman'] == "detailkelas")
                  {
                    require_once 'detailKelas.php';
                  }
                  else if($_GET['halaman'] == "delete_database")
                  {
                    require_once 'deleteDatabase.php';
                  }
                  else if($_GET['halaman'] == "deletekelas")
                  {
                    require_once 'deletekelas.php';
                  }
                  else if($_GET['halaman'] == "data_siswa")
                  {
                    require_once 'data_siswa.php';
                  }
                  else if($_GET['halaman'] == "edit_databaseSiswa")
                  {
                    require_once 'editDatabaseSiswa.php';
                  }
                  else if($_GET['halaman'] == "data_nilai_siswa")
                  {
                    require_once 'data_nilai_siswa.php';
                  }
                  else if($_GET['halaman'] == "search_page")
                  {
                    require_once 'search_admin.php';
                  }
              }
          ?> 
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
   <script src="js/ajax.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
