<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
    	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		
    	<!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="http://htmlskuy.000webhostapp.com/css/bootstrap.min.css">
		<link href="http://htmlskuy.000webhostapp.com/css/google-api.css" rel="stylesheet" type="text/css"> 
        <link rel="stylesheet" href="http://htmlskuy.000webhostapp.com/css/demo.css">
        <link rel="stylesheet" href="http://htmlskuy.000webhostapp.com/css/normalize.min.css">
        <link rel="stylesheet" href="http://htmlskuy.000webhostapp.com/css/canvas.css">
        <link href="css/admin-log.css" rel="stylesheet">
		<link rel="stylesheet" href="./style.css">


        <!-- Bootstrap core JavaScript-->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="js/admin-log.min.js"></script>
		<script>
		function validateForm(){
			var x = document.forms["formLogin"]["fusername"].value;
			var y = document.forms["formLogin"]["fpassword"].value;
			if(x == "" && y == ""){
				alert("Username And Password Not Allow empty");
				return false;
			}if(x == ""){
				alert("Username Not Allow empty");
				return false;
			}if(y == ""){
				alert("Password Not Allow empty");
				return false;
			}if(validlogin(x,y)){
				alert("Password dan username salah");
				return false;
			}
		}
		</script>
		<?php
			session_start();
			session_destroy();
			session_start();
			// Include our login information
			$db_host='localhost';
			$db_database='raport';
			$db_username='root';
			$db_password='palembang27';
			// Connect //==> ini juga diganti
			$con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
			if (mysqli_connect_errno()){
				die ("Could not connect to the database: <br />". mysqli_connect_error( ));
			}

			if (isset($_POST['submit'])){
				// mysql_connect("localhost", "root", "") or die(mysql_error());
				$fusername=$_POST['fusername'];
				$fpassword=$_POST['fpassword'];
                //Asign a query
                $query = " SELECT * FROM admin WHERE username='$fusername'";
                // Execute the query
                $result = mysqli_query($con,$query);
                if (!$result){
                die ("Could not query the database: <br />". mysqli_error($con));//koneksi kueri error
                }
                
                $row = mysqli_fetch_array($result);
                $username = $row['username'];
                $password = $row['password'];
                $idadmin=$row['id_admin'];
				
				if($username==$fusername && $password==$fpassword)
				{
					$_SESSION['id']=$idadmin;
					header("location: dashboard.php?id=".$idadmin."");
				}
				else if($username!=$fusername)
				{
					echo "<script>alert('Username salah');</script>";
				}
				else if($password!=$fpassword)
				{
					echo "<script>alert('Password salah');</script>";
				}
			}

			if (isset($_POST['submit'])){
				// mysql_connect("localhost", "root", "") or die(mysql_error());
				$fusername=$_POST['fusername'];
				$fpassword=$_POST['fpassword'];
                //Asign a query
                $query2 = " SELECT * FROM siswa WHERE username='$fusername'";
                // Execute the query
                $result2 = mysqli_query($con,$query2);
                if (!$result){
                die ("Could not query the database: <br />". mysqli_error($con));//koneksi kueri error
                }
                
                $row = mysqli_fetch_array($result2);
                $username = $row['username'];
                $password = $row['password'];
                $kdsiswa=$row['nisn'];

				if($username==$fusername && $password==$fpassword)
				{
					$_SESSION['id']=$kdsiswa;
					header("location: homeSiswa.php?id=".$kdsiswa."");
				}
				else if($username!=$fusername)
				{
					echo "<script>alert('Username salah');</script>";
				}
				else if($password!=$fpassword)
				{
					echo "<script>alert('Password salah');</script>";
				}
			}
		?>
	    <title>Raport Online</title>

        <style>
        	-webkit-transition: all 0.3 ease;
            a.myCustomClass
            {
                position: absolute;
                margin: 0;
                padding: 0;
                color: orange;
                text-align: center;
                top: 50%;
                left: 50%;
                -webkit-transform: translate3d(-50%,-50%,0);
                transform: translate3d(-50%,-50%,0);
                font-size: 40px;
            }

            /*.form .login-form {
 					display: block;
			}*/
				
			
            p.myCustomClass
            {
                position: absolute;
                margin: 0;
                padding: 0;
                color: #f9f1e9;
                text-align: center;
                top: 50%;
                left: 50%;
                -webkit-transform: translate3d(-50%,-50%,0);
                transform: translate3d(-50%,-50%,0);
                font-size: 27px;
			}

            .forMainTitle
            {
                font-size: 82px;
			}

            @media only screen and (max-width: 900px)
            {
                h1.forMainTitle
                {
                    font-size: 28px;
                }

                p.myCustomClass
                {
                    font-size: 14px;
                }

                a.myCustomClass
                {
                    font-size: 40px;
                }
            }
        </style>

	</head>

	<body>
		<header>
			
		</header>
		<div id="large-header" class="large-header" style="height: 181%">
					<div id="tutorial" class="container pb-3" style="width: 30%;height: 10%">
						<div class="row pt-9 login-page">
							<div class="col text-center">
								<br><br><br><br><br>
								
								<div class="form">
									<form  id="login" class="login-form" name="formLogin"  onsubmit="return validateForm()" method="post" >
										<h1 class="myCustomClass mb-4" style="color: white;">Login</h1>
										<div class="form-group">
											<input type="text" name="fusername" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" />
										</div>
										<div class="form-group">
											<input type="password" name="fpassword" id="password" class="form-control form-control-user" placeholder="Password">
										</div>
										<input type="submit" name="submit" value="Submit" class="btn btn-primary btn-user btn-block">
									</form>
								</div>
							</div>
						</div>
					</div>
					<canvas id="demo-canvas" style="height: 100%;"></canvas>
		</div>
	</body>
		<footer>
		<nav class="bottom navbar-expand-lg navbar-dark bg-dark">
			<nav class="container-fluid">
		  		<span class="navbar-brand mb-0 h1">Copyright &copy; <script> document.write(new Date().getFullYear()) </script> Raport Online</span>
			</nav>
		</nav>
		</footer>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="http://htmlskuy.000webhostapp.com/js/jquery-3.3.1.slim.min.js"></script>
		<script src="http://htmlskuy.000webhostapp.com/js/popper.min.js"></script>
		<script src="http://htmlskuy.000webhostapp.com/js/bootstrap.min.js"></script>
		<script src="http://htmlskuy.000webhostapp.com/js/TweenLite.min.js"></script>
        <script src="http://htmlskuy.000webhostapp.com/js/EasePack.min.js"></script>
        <script src="http://htmlskuy.000webhostapp.com/js/rAF.js"></script>
        <script src="http://htmlskuy.000webhostapp.com/js/canvas.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<!-- Custom scripts for all pages-->
		<script src="js/admin-log.min.js"></script>
		<!-- Bootstrap core JavaScript-->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script  src="./script.js"></script>
		<!-- Core plugin JavaScript-->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script>
			$(document).ready(function(){
			  $("a").on('click', function(event) {
				if (this.hash !== "") {
				  event.preventDefault();

				  var hash = this.hash;

				  $('html, body').animate({
					scrollTop: $(hash).offset().top
				  }, 800, function(){
			   
					window.location.hash = hash;
				  });
				}
			  });
			});
		</script>
		<script>
			$('.message a').click(function(){
			$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
		});
		</script>
  	</body>
</html>
