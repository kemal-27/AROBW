
<?php
        if(isset($_POST["submit_all"])){
              $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
        if (mysqli_connect_errno()){
          die ("Could not connect to the database: <br />". mysqli_connect_error( ));
        }
        $nama_kelas=filter_var($_POST['nama_kelas'],FILTER_SANITIZE_STRING);
        $nama_wali=filter_var($_POST['nama_wali'],FILTER_SANITIZE_STRING);
        $Kapasitas=filter_var($_POST['kapasitas'],FILTER_SANITIZE_STRING);
        $error_nama_kelas = NULL;
        $error_nama_wali = NULL;
        $error_kapasitas = NULL;
        if($nama_kelas == '')
        {
            $error_nama_kelas = "Nama Kelas diperlukan";
        }
        if($nama_wali == '')
        {
            $error_nama_wali = "Nama Wali diperlukan";
        }
        if($Kapasitas == '')
        {
            $error_kapasitas = "Kapasitas diperlukan";
        }
        if($error_nama_kelas || $error_nama_wali || $error_kapasitas)
        {
        }
        else
        {
            //Asign a query
            $query = " INSERT INTO kelas(kd_kelas,nama_walikelas,kapasitas_kelas) VALUES('$nama_kelas','$nama_wali',$Kapasitas) ";
            // Execute the query
            $kelas = mysqli_query($con,$query);
            if (!$kelas){
              die ("Could not query the database: <br />". mysqli_error($con));//koneksi kueri error
            }
            echo "<div class=\"alert alert-info\">Data mapel berhasil ditambahkan </div>";
        }
        
        }
      


        echo '



        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-4 text-gray-800">
                     Tambah Kelas 
            </h1>
        </div>

        <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Input Data Kelas</h6>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
        <form id="form" method="POST" enctype="multipart/form-data" autocomplete="on" action="'; echo htmlspecialchars("dashboard.php?halaman=tambahkelas&id=$username"); echo '">
            <table id="dataTableAdd" width="auto" cellspacing="0">
                ';echo'

                <tr>
                    <td valign="top">Nama Kelas</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="nama_kelas" min="0" max="100"autofocus>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_nama_kelas)) ? $error_nama_kelas : ""; echo '</span>
                    </td>  
                </tr>

                <tr>
                    <td valign="top">Nama Walikelas</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="nama_wali" min="0" max="100"autofocus>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_nama_wali)) ? $error_nama_wali : ""; echo '</span>
                    </td>  
                </tr>

                <tr>
                    <td valign="top">Kapasitas</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="number" name="kapasitas" min="0" max="100"autofocus>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_kapasitas)) ? $error_kapasitas : ""; echo '</span>
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
             
