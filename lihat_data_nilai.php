<?php
    session_start();
    $username=$_GET['id'];
    $kdsiswa=$_SESSION['id'];
    $_SESSION['kdsiswa']=$kdsiswa;
    $tapel = "";
    $smt = "";
    $_SESSION['tapel']=$tapel;
    $_SESSION['smt']=$smt;
    if(isset($_SESSION['id'])&&$_SESSION['id']==$username){
         
    }else{
      header("location:home.php");
    }
    if(isset($_POST['submit']))
    {
        $tapel = $_POST['tapel'];
        $smt = $_POST['smt'];
        $_SESSION['tapel']=$tapel;
        $_SESSION['smt']=$smt;
        
    }
?>
<?php
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
    <script
        src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
        crossorigin="anonymous">
    </script>
    <script>
    /*function getXMLHTTPRequest() 
    {
      var req = false;
      try {
        // for Firefox
        req = new XMLHttpRequest();
      } catch (err) {
      try {
        // for some versions of IE
        req = new ActiveXObject("Msxml2.XMLHTTP");
      } catch (err) {
      try {
    // for some other versions of IE
        req = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (err) {
        req = false;
      }
      }
      }
    return req;
    }

    function Filter()
    {
      var xmlhttp = getXMLHTTPRequest();
      //get input value
      var tahun = encodeURI(document.getElementById('tapel').value);
      var semester = encodeURI(document.getElementById('smt').value);
      //set url and innerssss
      var inner = "nilaisis";
      var url = "process_nilai_siswa.php";
      var params = "tapel=" + tahun + "&smt="+ semester;
      xmlhttp.open("POST", url, true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.onreadystatechange = function() {
      document.getElementById(inner).innerHTML = '<imgsrc="images/ajax_loader.png"/>';
      if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
      document.getElementById(inner).innerHTML = xmlhttp.responseText;
      }
      return false;
      }
      xmlhttp.send(params);
    }
     */
    
        $(document).ready(function()
        {
            $("#submit").click(function ()
            {
                var gtapel = $("#tapel").val();
                var gsmt = $("#smt").val();
                $.post("process_nilai_siswa.php",
                {
                    tapel: gtapel,
                    smt: gsmt,
                    kdsiswa: <?php echo $kdsiswa; ?>
                },
                function(data, status)
                {
                    //alert(status);
                    if(status === "error")
                    {
                        $("#nilaisis").html("The page can't be loaded");
                    }
                    else
                    {
                        $("#nilaisis").html(data);
                    }
                });
            });
        });
    

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
        <h2>Selamat Datang, <?php echo $row['nama_siswa']; ?></h2>
      </div>
    </div>
    <!-- end: Container  -->
  </div>
  <!-- end: Page Title -->
    
  <!--start: Wrapper-->
  <div id="wrapper">
    <div class="container">
      <h2>Data Nilai</h2>
         <?php
          $query = "SELECT * FROM nilai GROUP BY tahun_ajaran";
          $result = mysqli_query($con, $query);
         ?>
        <!--form class="" action="lihat_data_nilai.php?id=<?php echo $kdsiswa; ?>" method="post"-->
          <table>
          <tr>
          <td><label for="">Tahun Ajaran : </label></td>
          <tr><td><select name="tapel" id="tapel">
           <?php while($data = mysqli_fetch_assoc($result) ){?>
            <option value="<?php echo $data['tahun_ajaran']; ?>"><?php echo $data['tahun_ajaran']; ?></option>
           <?php } ?>
          </select></td></tr>
          </tr>
         <?php
          $query = "SELECT * FROM nilai GROUP BY semester";
          $result = mysqli_query($con, $query);
         ?>
          <tr>
          <td><label for="">Semester : </label></td>
          <tr><td><select name="smt" id="smt">
           <?php while($data = mysqli_fetch_assoc($result) ){?>
            <option value="<?php echo $data['semester']; ?>"><?php echo $data['semester']; ?></option>
           <?php } ?>
          </select></td></tr>
          </tr>
          <tr>
            <td>
              <button onclick="Filter()" type="submit" name="submit" id="submit" value="simpan">TAMPILKAN</button>
            </td>
          </tr>
          </table>
        <!--/form -->
         <br>
         <br>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        </thead>
        <tbody id="nilaisis">

        </tbody>
      </table>
      <?php
        $tapel=$_SESSION['tapel'];
        $smt=$_SESSION['smt'];
      ?>
      <a href="homeSiswa.php?id=<?php echo $username; ?>" class="btn-info btn" >Kembali</a>
      
      </div>
      <br>   

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
