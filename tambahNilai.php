<?php
$kdsiswa=$_GET['kdsiswa'];
    if(isset($_POST["submit_all"]))
    {    
            $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
            $NISN = $_GET['kdsiswa'];
             
            $Semester = $_SESSION['semester'];
            $tahun_ajar = $_SESSION['tahun'];
            $kd_mapel = filter_var($_POST['kd_mapel'],FILTER_SANITIZE_STRING);
            $query5 = "DELETE FROM nilai WHERE nisn='".$NISN."' AND tahun_ajaran='".$tahun_ajar."' AND kd_mapel='".$kd_mapel."' AND semester='".$Semester."'";
            $result2 = mysqli_query($con, $query5);
           
            $nilai = filter_var($_POST['nilai'],FILTER_SANITIZE_STRING);
            $query3 = " SELECT * FROM mata_pelajaran where kd_mapel=".$kd_mapel;
            $error_kd_mapel = NULL;
            $error_nilai = NULL;
            // Execute the query
            $loop = mysqli_query($con,$query3);
            $data3 = mysqli_fetch_array($loop);
            if($nilai = '')
            {
                $nilai = 0;
            }
            if ($nilai>=$data3['kkm']){
                  $keterangan="Lulus";
            }else{
                $keterangan="Tidak Lulus";
            }      
            if($kd_mapel == '')
            {
                $error_kd_mapel = "Mata Pelajaran diperlukan";
            }
            if($nilai == '')
            {
                $error_nilai = "Nilai diperlukan";
            }
            if($error_kd_mapel || $error_nilai)
            {
            }
            else
            {
                $query4 = " INSERT INTO nilai(nisn, kd_mapel , tahun_ajaran, semester, nilai, keterangan) VALUES ($NISN , $kd_mapel, '$tahun_ajar', $Semester, $nilai, '$keterangan')";
                $result = mysqli_query($con, $query4);
                 if(!$result)
                {
                    echo("Could not query the database: <br />". mysqli_error($con));
                }
                    
                 echo "<div class=\"alert alert-info\">Data nilai berhasil ditambahkan </div>";
            }
        

    }













?>
<?php
    if($_GET['sub'] == "data_nilai_siswa")
    {   
        $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
        if (mysqli_connect_errno()){
          die ("Could not connect to the database: <br />". mysqli_connect_error( ));
        }

        //Asign a query
        $query = " SELECT * FROM kelas";
        // Execute the query
        $kelas = mysqli_query($con,$query);
        if (!$kelas){
          die ("Could not query the database: <br />". mysqli_error($con));//koneksi kueri error
        }
        
        


        echo '



        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-4 text-gray-800">
                     Tambah Nilai
            </h1>
        </div>

        <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Input Data Nilai</h6>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
        <form id="form" method="POST" enctype="multipart/form-data" autocomplete="on" action="'; echo htmlspecialchars("dashboard.php?halaman=tambahNilai&id=$username&kdsiswa=$kdsiswa&sub=data_nilai_siswa"); echo '">
            <table id="dataTableAdd" width="auto" cellspacing="0">
                ';
                $query2 = " SELECT * FROM mata_pelajaran";
                    // Execute the query
                $nilai = mysqli_query($con,$query2);
                                 
                echo'

                <tr>
                    <td valign="top">Mata Pelajaran</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <select id="kelas" name="kd_mapel"  class="custom-select">
                          <option selected  >Open this select menu</option>
                        ';while($data2 = mysqli_fetch_array($nilai)){ 
                            echo '<option value='.$data2['kd_mapel'].'>'.$data2['nama_mapel'].'</option>';
                            }echo '
                        </select>
                    </td>
                    <td valign="top">
                        <span style="color:red"></span>
                    </td>  
                </tr>

                <tr>
                    <td valign="top">Nilai</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="number" name="nilai" min="0" max="100"autofocus>
                    </td>
                    <td valign="top">
                        <span style="color:red"></span>
                    </td>  
                </tr>
                ';
                

                echo'
                <tr>   
                 


                    <td valign="top"><br>
                    <a class="btn btn-primary" href="dashboard.php?halaman=detailNilai&id='; echo $_GET['id']; echo'&kdsiswa=';echo $kdsiswa;echo '&sub=data_nilai_siswa';echo'" role="button">Kembali</a>
                    <input class="btn btn-primary" type="submit" name="submit_all" value="Submit">  
                    </td>
                </tr>
            </table>
         </form>
          </div>
        </div>
    </div>
        ';

    }
?>
             
