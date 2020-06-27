
<?php
        $kdmapel=$_GET['kd_mapel'];
        if(isset($_POST["submit_all"])){
              $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
        if (mysqli_connect_errno()){
          die ("Could not connect to the database: <br />". mysqli_connect_error( ));
        }
        $nama_mapel=filter_var($_POST['nama_mapel'],FILTER_SANITIZE_STRING);
        $kkm=filter_var($_POST['kkm'],FILTER_SANITIZE_STRING);
        //Asign a query
        // Execute the query
        $query ="UPDATE mata_pelajaran SET  nama_mapel=\"$nama_mapel\", kkm=\"$kkm\"WHERE kd_mapel=".$kdmapel;
        $kelas = mysqli_query($con,$query);
        if (!$kelas){
          die ("Could not query the database: <br />". mysqli_error($con));//koneksi kueri error
        }
        echo "<div class=\"alert alert-info\">Data mapel berhasil ditambahkan </div>";
        
        }
      
        
        $query = "SELECT * from mata_pelajaran where kd_mapel=".$kdmapel;
        // Execute the query
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result);


        echo '



        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-4 text-gray-800">
                     Edit Mata Pelajaran
            </h1>
        </div>

        <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Input Data Mata Pelajaran</h6>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
        <form id="form" method="POST" enctype="multipart/form-data" autocomplete="on" action="'; echo htmlspecialchars("dashboard.php?halaman=editMapel&id=$username&kd_mapel=$kdmapel"); echo '">
            <table id="dataTableAdd" width="auto" cellspacing="0">
                ';echo'

                <tr>
                    <td valign="top">Nama Mata Pelajaran</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="nama_mapel" min="0" max="100"autofocus value=';echo '"'.$row['nama_mapel'].'"';echo'>
                    </td>
                    <td valign="top">
                        <span style="color:red"></span>
                    </td>  
                </tr>

                <tr>
                    <td valign="top">KKM</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="number" name="kkm" min="0" max="100"autofocus value=';echo $row['kkm'];echo'>
                    </td>
                    <td valign="top">
                        <span style="color:red"></span>
                    </td>  
                </tr>
                ';
                

                echo'
                <tr>   
                 


                    <td valign="top"><br>
                    <a class="btn btn-primary" href="dashboard.php?halaman=detailMatkul&id='; echo $_GET['id'];echo'" role="button">Kembali</a>
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
             
