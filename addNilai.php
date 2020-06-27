<?php
    if(isset($_POST["submit_all"]))
    {
            $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
       
            $query3 = " SELECT * FROM mata_pelajaran";
             // Execute the query
            $loop = mysqli_query($con,$query3);
            $NISN = filter_var($_POST['NISN'],FILTER_SANITIZE_STRING);
            $Semester = filter_var($_POST['semester'],FILTER_SANITIZE_STRING);
            $tahun_ajar = filter_var($_POST['tahun_ajar'],FILTER_SANITIZE_STRING);
            $query5 = "DELETE FROM nilai WHERE nisn='".$NISN."' AND tahun_ajaran='".$tahun_ajar."'  AND semester='".$Semester."'";
            $result2 = mysqli_query($con, $query5);



            while($data3 = mysqli_fetch_array($loop)){
               
                $kd_mapel = $data3['kd_mapel'];
                $nilai = filter_var($_POST[$kd_mapel],FILTER_SANITIZE_STRING);
                if ($nilai==""){
                    $nilai=0;
                }
                if ($nilai>=$data3['kkm']){
                    $keterangan="Lulus";
                }else{
                    $keterangan="Tidak Lulus";
                }




                $error_semester = NULL;
                $error_tahun_ajar = NULL;
                $error_NISN = NULL;

                if($NISN == '')
                {
                    $error_NISN = "NISN diperlukan";
                }
                if($Semester == '')
                {
                    $error_semester = "Semester diperlukan";
                }
                if($tahun_ajar == '')
                {
                    $error_tahun_ajar = "Tahun ajaran diperlukan";
                }
                if($error_NISN || $error_semester || $error_tahun_ajar)
                {
                }
                else{
                    $query4 = " INSERT INTO nilai(nisn, kd_mapel , tahun_ajaran, semester, nilai, keterangan) VALUES ($NISN , $kd_mapel, '$tahun_ajar', $Semester, $nilai, '$keterangan')";
                    $result = mysqli_query($con, $query4);
                     if(!$result)
                    {
                        echo("Could not query the database: <br />". mysqli_error($con));
                    }
                    echo "<div class=\"alert alert-info\">Data nilai berhasil ditambahkan </div>";
                }
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
        <form id="form" method="POST" enctype="multipart/form-data" autocomplete="on" action="'; echo htmlspecialchars("dashboard.php?halaman=addNilai&id=$username&sub=data_nilai_siswa"); echo '">
            <table id="dataTableAdd" width="auto" cellspacing="0">
                <tr>
                    <td valign="top">Kelas</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <select onchange="tugas()" id="kelas" name="kelas"  class="custom-select">
                          <option selected  >Open this select menu</option>
                        ';while($data = mysqli_fetch_array($kelas)){
                            echo '<option value='.$data['kd_kelas'].'>'.$data['kd_kelas'].'</option>';
                            }echo '
                        </select>
                    </td>
                    <td valign="top">
                        <span style="color:red"></span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">NISN</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input name="NISN" type="text" list="siswa" autofocus />
                        <datalist id="siswa">
                        </datalist>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_NISN)) ? $error_NISN : ""; echo '</span>
                    </td>  
                </tr>

                <tr>
                    <td valign="top">Tahun Ajar</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="tahun_ajar" size="30" maxlength="30"  autofocus>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_tahun_ajar)) ? $error_tahun_ajar : ""; echo '</span>
                    </td>  
                </tr>

                <tr>
                    <td valign="top">Semester</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <select id="semester" name="semester" >
                          <option selected value="1">Gasal</option>
                          <option value="2">Genap</option>
                        </select>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_semester)) ? $error_semester : ""; echo '</span>
                    </td>  
                </tr>
                ';
                $query2 = " SELECT * FROM mata_pelajaran";
                    // Execute the query
                $nilai = mysqli_query($con,$query2);
                while($data2 = mysqli_fetch_array($nilai)){                  
                echo'

                <tr>
                    <td valign="top">'.$data2['nama_mapel'].'</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="number" name="'.$data2['kd_mapel'].'" min="0" max="100"autofocus>
                    </td>
                    <td valign="top">
                        <span style="color:red"></span>
                    </td>  
                </tr>
                ';
                }

                echo'
                <tr>   
                    <td valign="top"><br>
                    <a class="btn btn-primary" href="dashboard.php?halaman=data_nilai_siswa&id='; echo $username; echo'" role="button">Kembali</a>
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
             
