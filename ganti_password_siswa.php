<?php
  session_start();
    $username=$_GET['id'];
    $kdsiswa=$_SESSION['id'];
    if(isset($_SESSION['id'])&&$_SESSION['id']==$username){
         
    }else{
      header("location:home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- start: Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Raport Online</title> 
  <!-- end: Meta -->
  
  <!-- start: Mobile Specific -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- end: Mobile Specific -->
  
  <!-- start: Facebook Open Graph -->
  <meta property="og:title" content=""/>
  <meta property="og:description" content=""/>
  <meta property="og:type" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:image" content=""/>
  <!-- end: Facebook Open Graph -->

    <!-- start: CSS --> 
    <link href="css/bootstraphomesiswa.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
  <link href="css/stylehomesiswa.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
  <!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script>
        function validateForm() {
            if (document.forms["formUpdate"]["passwordlama"].value == "") {
                  alert ("Please fill your password.");
                  document.forms["formUpdate"]["passwordlama"].focus();
                  return false;
            }
            if (document.forms["formUpdate"]["password1"].value == "") {
                alert ("Please fill your password.");
                document.forms["formUpdate"]["password1"].focus();
                return false;
            }
            var passwordpattern = new RegExp("(?=.*[a-z])(?=.*[A-Z]).{8,}");
            var resultpattern = passwordpattern.test(document.forms["formUpdate"]["password1"].value);
            if(!resultpattern){
                alert("Please fill your password with must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters");
                document.forms["formUpdate"]["password1"].focus();
                return false;
            }
            if (document.forms["formUpdate"]["c_password"].value == "") {
                alert ("Please fill your confirm password.");
                document.forms["formUpdate"]["c_password"].focus();
                return false;
            }
        }
    </script>
</head>
<body>
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
        $query = "SELECT * FROM siswa WHERE nisn ='".$kdsiswa."'";
        // Execute the query
        $result = mysqli_query($con,$query);
        if (!$result){
          die ("Could not query the database: <br />". mysqli_error($con));//koneksi kueri error
        }
        $row = mysqli_fetch_array($result);
        $kdsiswa=$row['nisn'];
      ?>
    
  <!--start: Header -->
  <header>
    <!--start: Container -->
    <div class="container">
      <!--start: Row -->
      <div class="row"> 
        <!--start: Logo -->
        <div class="logo span3">  
          <a class="brand" href="homeSiswa.php?id=<?php echo $username; ?>"><img src="gambar/raport_online.png." alt="Logo"></a> 
        </div>
        <!--end: Logo -->
          
        <!--start: Navigation -->
        <div class="span8">
          <div class="navbar navbar-inverse">
              <div class="navbar-inner">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </a>
                    <div class="nav-collapse collapse">
                      <ul class="nav">
                        <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a></li>
                      </ul>
                    </div>
                </div>
              </div>
        </div>  
        <!--end: Navigation -->     
      </div>
      <!--end: Row -->
    </div>
    <!--end: Container-->           
  </header>
  <!--end: Header-->

  <!-- start: Page Title -->
  <div id="page-title">
    <div id="page-title-inner">
      <!-- start: Container -->
      <div class="container">
        <h2></i>Selamat Datang, <?php echo $row['nama_siswa']; ?></h2>
      </div>
    </div>
    <!-- end: Container  -->
  </div>
  <!-- end: Page Title -->
    
  <!--start: Wrapper-->
    <div id="wrapper">
      <div class="container">
        <h1> Ganti Password</h1>
          <form id="formUpdate" method="POST" autocomplete="on" action="" onsubmit="return validateForm()">
            <div class="col-md-4 pr-1">
              <div class="form-group">
                <label>Password Lama</label>
                <input type="password" name="passwordlama" class="form-control" placeholder="Password Lama">
              </div>
            </div>
            <div class="col-md-4 px-1">
              <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="password1" class="form-control" placeholder="Password">
              </div>
            </div>
            <div class="col-md-4 pl-1">
              <div class="form-group">
                <label for="exampleInputEmail1">Confirm Password</label>
                <input type="password" name="c_password" class="form-control" placeholder="Confirm Password">
              </div>
            </div>
          <a href="homeSiswa.php?id=<?php echo $username; ?>" class="btn-info btn" >Kembali</a> <input type="submit" name="submit" class="btn btn-info btn-fill" value="Update Password">
            <div class="clearfix"></div>
          </form>
    </div>
  </div>

  <!-- Content Row -->
          <?php
            $query1 = " SELECT * FROM siswa WHERE nisn=".$id;
            // Execute the query
            $result1 = mysqli_query($con,$query1);
            if (!$result1){
            die ("Could not query the database: <br />". mysqli_error($con));//koneksi kueri error
            }
            
            $row = mysqli_fetch_array($result1);
            $password = $row['password'];
            $kdsiswa=$row['nisn'];
            if (isset($_POST['submit'])) {
              $password1 = $_POST['password1'];

              $passwordlama=$_POST['passwordlama'];
              
              if($password!=$passwordlama)
              {
                echo "<script>alert('Password salah');</script>";
              }
              
              if ($_POST['password1']!=$_POST['c_password']){
                echo "<script>alert('Pastikan password dan konfirmasi password anda sama');</script>";
              }else{
                $query2 = "UPDATE siswa SET password='".$password1."' WHERE nisn=".$id." ";
                $result3 = $con->query($query2); 
                if ($result3 == TRUE && $result1 == TRUE) {
                  echo "<script>alert('Berhasil Update');</script>";
                }else {
                   echo "<script>alert('Gagal');</script>";
                }
              }
            }
          ?>  

  <div id="footer-menu" class="hidden-tablet hidden-phone">
    <!-- start: Container -->
    <div class="container">
      <!-- start: Row -->
      <!-- end: Row -->
    </div>
    <!-- end: Container  -->  
  </div>  
  <!-- end: Footer Menu -->
 
    <footer class="footer">
      <div id="page-title-inner">
      <!-- start: Container -->
      <div class="container" style="text-align: center">
        <ul>
          <li>
            <a class="link" href="about.php">About Us</a> | <a href="contact.php">Contact Us</a>
          </li>
        </ul>
      </div>
      </div>
      <div class="container" style="text-align: center">
        <h4 class="text-muted">Copyright &copy; 2019 Raport Online</h4></span>
      </div>
  </footer>

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

<!-- start: Java Script -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.8.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/flexslider.js"></script>
<script src="js/carousel.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/slider.js"></script>
<script defer="defer" src="js/custom.js"></script>
<!-- end: Java Script -->

</body>
</html>
