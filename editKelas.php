
<?php
        $kdkelas=$_GET['kd_kelas'];
        if(isset($_POST["submit_all"])){
              $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
        if (mysqli_connect_errno()){
          die ("Could not connect to the database: <br />". mysqli_connect_error( ));
        }
        $nama_kelas=filter_var($_POST['nama_kelas'],FILTER_SANITIZE_STRING);
         $nama_wali=filter_var($_POST['nama_wali'],FILTER_SANITIZE_STRING);
        $Kapasitas=filter_var($_POST['kapasitas'],FILTER_SANITIZE_STRING);
        //Asign a query
        // Execute the query
        $query ="UPDATE kelas SET  kd_kelas=\"$nama_kelas\", nama_walikelas=\"$nama_wali\", kapasitas_kelas=\"$Kapasitas\"WHERE kd_kelas=\"$kdkelas\" ";
        $kelas = mysqli_query($con,$query);
        if (!$kelas){
          die ("Could not query the database: <br />". mysqli_error($con));//koneksi kueri error
        }
        echo "<div class=\"alert alert-info\">Data mapel berhasil ditambahkan </div>";
        
        }
      
        
        $query = "SELECT * from kelas where kd_kelas=\"$kdkelas\" ";
        // Execute the query
        $result = mysqli_query($con,$query);
        if (!$result){
          die ("Could not query the database: <br />". mysqli_error($con));//koneksi kueri error
        }
        $row = mysqli_fetch_array($result);


        echo '



        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-4 text-gray-800">
                     Edit Mata Pelajaran
            </h1>
        </div>

        <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Input Data Kelas</h6>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
        <form id="form" method="POST" enctype="multipart/form-data" autocomplete="on" action="'; echo htmlspecialchars("dashboard.php?halaman=editkelas&id=$username&kd_kelas=$kdkelas"); echo '">
            <table id="dataTableAdd" width="auto" cellspacing="0">
                ';echo'
                <tr>
                    <td valign="top">Nama Kelas</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="nama_kelas" min="0" max="100"autofocus  value=';echo $row['kd_kelas'];echo'>
                    </td>
                    <td valign="top">
                        <span style="color:red"></span>
                    </td>  
                </tr>

                <tr>
                    <td valign="top">Nama Walikelas</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="nama_wali" min="0" max="100"autofocus  value=';echo '"'.$row['nama_walikelas'].'"';echo'>
                    </td>
                    <td valign="top">
                        <span style="color:red"></span>
                    </td>  
                </tr>

                <tr>
                    <td valign="top">Kapasitas</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="number" name="kapasitas" min="0" max="100"autofocus  value=';echo $row['kapasitas_kelas'];echo'>
                    </td>
                    <td valign="top">
                        <span style="color:red"></span>
                    </td>  
                </tr>



                ';
                

                echo'
                <tr>   
                 


                    <td valign="top"><br>
                    <a class="btn btn-primary" href="dashboard.php?halaman=detailkelas&id='; echo $_GET['id'];echo'" role="button">Kembali</a>
                    <input class="btn btn-primary" type="submit" name="submit_all" value="Submit">  
                    </td>
                </tr>
            </table>
         </form>
          </div>
        </div>
    </div>
        ';

?>
             
