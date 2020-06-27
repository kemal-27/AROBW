<?php
    $db_host='localhost';
    $db_database='raport';
    $db_username='root';
    $db_password='';
    // Connect //==> ini juga diganti
    $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
    if (mysqli_connect_errno()){
        die ("Could not connect to the database: <br />". mysqli_connect_error( ));
    }
?>
<?php
    if($_GET['sub'] == "data_nilai_siswa")
    {
        $temp_kd_siswa = $_GET['kdsiswa'];
    }
    if($_GET['sub'] == "data_pegawai")
    {
        $temp_id_admin = $_GET['id_admin'];
    }
    if(!isset($_POST["submit_all"]))
    {
        if($_GET['sub'] == "data_nilai_siswa")
        {
            $query = "SELECT * FROM nilai JOIN mata_pelajaran ON nilai.kd_mapel = mata_pelajaran.kd_mapel WHERE nisn=".$_GET['kdsiswa'];
            $result = mysqli_query($con, $query);
            if(!$result)
            {
                die("Could not query the database: <br />". mysqli_error($con));
            }
            else
            {
                $row = mysqli_fetch_array($result);
                $kdsiswa = $row['nisn'];
                $kd_mapel = $row['kd_mapel'];
                $tahun_ajaran = $row['tahun_ajaran'];
                $semester = $row['semester'];
                $nilai = $row['nilai'];
                $keterangan = $row['keterangan'];
                $nama_mapel = $row['nama_mapel'];
            }
        }
        else if($_GET['sub'] == "data_pegawai")
        {
            $query = "SELECT * FROM admin WHERE id_admin=".$_GET['id_admin'];
            $query2 = "SELECT * FROM profile WHERE idprofile=".$_GET['id_admin'];
            $result = mysqli_query($con, $query);
            $result2 = mysqli_query($con, $query2);
            if(!$result)
            {
                die("Could not query the database: <br />". mysqli_error($con));
            }
            else if(!$result2)
            {
                die("Could not query the database: <br />". mysqli_error($con));
            }
            else
            {
                $row = mysqli_fetch_array($result);
                $row2 = mysqli_fetch_array($result2);
                $id_admin = $row['id_admin'];
                $nama_admin = $row['nama_admin'];
                $address = $row['address'];
                $usernamePegawai = $row['username'];
                $password = $row['password'];
                $email = $row['email'];
                $gambar_profil = $row2['gambar'];
            }
        }
    }
    else
    {
        if($_GET['sub'] == "data_nilai_siswa")
        {    
            $query2 = "SELECT * FROM mata_pelajaran m INNER JOIN nilai n on m.kd_mapel=n.kd_mapel where kd_nilai=".$_GET['kd_nilai'] ;
            $result = mysqli_query($con, $query2);
            $row = mysqli_fetch_array($result);

            $tahun_ajaran = filter_var($_POST['tahun_ajaran'],FILTER_SANITIZE_STRING);
            $semester = filter_var($_POST['semester'],FILTER_SANITIZE_STRING);
            $nilai = filter_var($_POST['nilai'],FILTER_SANITIZE_STRING);
            if($row['kkm']<=$nilai){
                $keterangan = "Lulus";
            }else{
                $keterangan = "Tidak Lulus";
            }
            $error_kdsiswa = NULL;
            $error_kd_mapel = NULL;
            $error_tahun_ajaran = NULL;
            $error_semester = NULL;
            $error_nilai = NULL;
            $error_keterangan = NULL;
            if($tahun_ajaran == '')
            {
                $error_tahun_ajaran = "Tahun ajaran diperlukan";
            }
            if($semester == '')
            {
                $error_semester = "Semester diperlukan";
            }
            if($nilai == '')
            {
                $error_nilai = "Nilai diperlukan";
            }
            if($keterangan == '')
            {
                $error_keterangan = "Keterangan diperlukan";
            }
            if($error_kdsiswa || $error_kd_mapel || $error_tahun_ajaran || $error_semester || $error_nilai || $error_keterangan)
            {
                $query = "SELECT * FROM nilai WHERE nisn=".$_GET['kdsiswa'];
                $query2 = "SELECT * FROM mata_pelajaran WHERE kd_mapel=".$_GET['kd_mapel'];
                $result = mysqli_query($con, $query);
                $result2 = mysqli_query($con, $query2);
                if(!$result)
                {
                    die("Could not query the database: <br />". mysqli_error($con));
                }
                else if(!$result2)
                {
                    die("Could not query the database: <br />". mysqli_error($con));
                }
                else
                {
                    $row = mysqli_fetch_array($result);
                    $row2 = mysqli_fetch_array($result2);
                    $kdsiswa = $row['nisn'];
                    $kd_mapel = $row['kd_mapel'];
                    $tahun_ajaran = $row['tahun_ajaran'];
                    $semester = $row['semester'];
                    $nilai = $row['nilai'];
                    $keterangan = $row['keterangan'];
                    $nama_mapel = $row2['nama_mapel'];
                }
            }
            else
            {
                //$query = " UPDATE produk SET produk_id=".$id_produk.", produk_nama='".$nama_produk."', produk_item=".$item_produk.", produk_harga=".$harga_produk.", produk_stok=".$stok_produk.", produk_satuan='".$satuan_produk."', produk_gambar='".$gambar_produk."', produk_keterangan ='".$keterangan_produk."', produk_status'".$status_produk."', pegawai_id=".$id_pegawai.", kategori_id=".$id_kategori.", subkategori_id=".$id_sub_kategori." WHERE produk_id=".$_GET['produk_id'];
                $query = " UPDATE nilai SET nilai=\"$nilai\",tahun_ajaran=\"$tahun_ajaran\", semester=\"$semester\", keterangan=\"$keterangan\" WHERE kd_nilai=".$_GET['kd_nilai'];
                $result = mysqli_query($con, $query);
                if(!$result)
                {
                    echo("Could not query the database: <br />". mysqli_error($con));
                    echo "<p><a href=\"dashboard.php?halaman=edit_database&id=$username&kdsiswa=$temp_kd_siswa&sub=data_nilai_siswa\">Kembali</a>";
                    die();
                }
                else
                {
                    $temp_kd_siswa = $_GET['kdsiswa'];
                    echo "<div class=\"alert alert-info\">1 record updated</div>";
                    
                }
            }
        }
        else if($_GET['sub'] == "data_pegawai")
        {
            $nama_admin = filter_var($_POST['nama_admin'],FILTER_SANITIZE_STRING);
            $address = filter_var($_POST['address'],FILTER_SANITIZE_STRING);
            $usernamePegawai = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
            $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'],FILTER_SANITIZE_STRING);
            $gambar_profil = filter_var($_POST['username'],FILTER_SANITIZE_STRING).".jpg";
            $gambar_nama = '';
           


            $target_dir = "img/";
            $_FILES["fileToUpload"]["name"]=$gambar_profil;
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                $gambar_nama = $_FILES["fileToUpload"]["name"];
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                unlink($target_file);
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    
                } else {
                    
                }
            }
            // Check file size
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    
                } 
            }


            $error_id_admin = NULL;
            $error_nama_admin = NULL;
            $error_address = NULL;
            $error_username = NULL;
            $error_password = NULL;
            $error_email = NULL;
            $error_gambar_profil = NULL;
            if($nama_admin == '')
            {
                $error_nama_admin = "Nama Admin diperlukan";
            }
            if($address == '')
            {
                $error_address = "Address Admin diperlukan";
            }
            if($usernamePegawai == '')
            {
                $error_username_pegawai = "Username Admin diperlukan";
            }
            if($password == '')
            {
                $error_password = "Password Admin diperlukan";
            }
            if($email == '')
            {
                $error_email = "Email Admin diperlukan";
            }
            if($error_id_admin || $error_nama_admin || $error_address || $error_username || $error_password || $error_email )
            {
                $query = "SELECT * FROM admin WHERE id_admin=".$_GET['id_admin'];
                $query2 = "SELECT * FROM profile WHERE idprofile=".$_GET['id_admin'];
                $result = mysqli_query($con, $query);
                $result2 = mysqli_query($con, $query2);
                if(!$result)
                {
                    die("Could not query the database: <br />". mysqli_error($con));
                }
                else if(!$result2)
                {
                    die("Could not query the database: <br />". mysqli_error($con));
                }
                else
                {
                    $row = mysqli_fetch_array($result);
                    $row2 = mysqli_fetch_array($result2);
                    $id_admin = $row['id_admin'];
                    $nama_admin = $row['nama_admin'];
                    $address = $row['address'];
                    $usernamePegawai = $row['username'];
                    $password = $row['password'];
                    $email = $row['email'];
                    
                }
            }
            else
            {




                $query = "UPDATE admin SET nama_admin=\"$nama_admin\", address=\"$address\", email=\"$email\", username=\"$usernamePegawai\",password=\"$password\" WHERE id_admin=".$_GET['id_admin'];
                $query2 = "UPDATE profile SET gambar=\"$gambar_profil\" WHERE idprofile=".$_GET['id_admin'];
                $result = mysqli_query($con, $query);
                $result2 = mysqli_query($con, $query2);
                if(!$result)
                {
                    echo("Could not query the database: <br />". mysqli_error($con));
                    echo "<p><a href=\"dashboard.php?halaman=edit_database&id=$username&id_admin=$temp_id_admin&sub=data_pegawai\">Kembali</a>";
                    die();
                }
                else if(!$result2)
                {
                    echo("Could not query the database: <br />". mysqli_error($con));
                    echo "<p><a href=\"dashboard.php?halaman=edit_database&id=$username&id_admin=$temp_id_admin&sub=data_pegawai\">Kembali</a>";
                    die();
                }
                else
                {
                    $temp_id_admin = $_GET['id_admin'];
                    echo "<div class=\"alert alert-info\">1 record updated</div>";
                    echo "<meta http-equiv=\"refresh\" content=\"1; url=dashboard.php?halaman=edit_database&id=$username&id_admin=$temp_id_admin&sub=data_pegawai\">";
                }
            }
        }
    }
?>
<?php
    if($_GET['sub'] == "data_nilai_siswa")
    {
        $kd_nilai=$_GET['kd_nilai'];
        $queryedit="SELECT * from nilai where kd_nilai='".$_GET['kd_nilai']."'";
        $resultedit = mysqli_query($con, $queryedit);
        $edit = mysqli_fetch_array($resultedit);
        $kd_mapel=$edit['kd_mapel'];
        $querymapel="SELECT * from mata_pelajaran where kd_mapel='". $kd_mapel. "'";
        $resultmapel = mysqli_query($con, $querymapel);
        $mapel = mysqli_fetch_array($resultmapel);
        echo '<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-4 text-gray-800">
                Data Nilai Siswa 
            </h1>
        </div>

        <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Edit Data Nilai Siswa</h6>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
        <form method="POST"  autocomplete="on" action="'; echo htmlspecialchars("dashboard.php?halaman=edit_database&id=$username&kd_nilai=$kd_nilai&kdsiswa=$temp_kd_siswa&sub=data_nilai_siswa"); echo '">
            <table id="dataTableEdit" width="auto" cellspacing="0">
                <tr>
                    <td valign="top">NISN</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="number" disabled="" name="nisn" size="30" min="1" max="9999999999" placeholder="NISN (max 30 characters)" autofocus value="'; echo $edit['nisn']; echo '">
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_kd_siswa)) ? $error_kd_siswa : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Kode Mata Pelajaran</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="number" name="kd_mapel" size="10" min="1" max="9999999999" disabled="" placeholder="Kode Mata Pelajaran (max 10 characters)" autofocus value="'; echo $kd_mapel; echo '">
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_kd_mapel)) ? $error_kd_mapel : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Mata Pelajaran</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="nama_mapel" size="10" min="1" max="9999999999" disabled="" placeholder="Mata Pelajaran (max 10 characters)" autofocus value="'; echo $mapel['nama_mapel']; echo '">
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_kd_mapel)) ? $error_kd_mapel : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Tahun Ajaran</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="tahun_ajaran" size="10" min="1" max="10" placeholder="Tahun Ajaran (max 10 characters)" autofocus value="'; echo $edit['tahun_ajaran']; echo '">
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_tahun_ajaran)) ? $error_tahun_ajaran : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Semester</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                    ';if ($edit['semester']==1){
                        echo'
                        <select id="semester" name="semester" >
                          <option selected value="1">Gasal</option>
                          <option value="2">Genap</option>
                        </select>';
                    }
                    else{
                        echo'
                        <select id="semester" name="semester" >
                          <option selected value="2">Genap</option>
                          <option  value="1">Gasal</option>
                        </select>';
                    }

                    echo'
                       
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_semester)) ? $error_semester : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Nilai</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="number" name="nilai" size="20" maxlength="20" placeholder="Nilai (max 20 characters)" autofocus value="'; echo $edit['nilai']; echo '">
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_nilai)) ? $error_nilai : ""; echo '</span>
                    </td>  
                </tr>
                <tr>   
                    <td valign="top"><br>
                     <a class="btn btn-primary" href="dashboard.php?halaman=detailNilai&id='; echo $_GET['id']; echo'&kdsiswa=';echo $_GET['kdsiswa'];echo '&sub=data_nilai_siswa';echo'" role="button">Kembali</a>
                    <input class="btn btn-primary" type="submit" name="submit_all" value="Submit" href="">  
                </tr>
            </table>
         </form>';
    }
    else if($_GET['sub'] == "data_pegawai")
    {
        echo '<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-4 text-gray-800">
                Data Pegawai
            </h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Pegawai</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST"  enctype="multipart/form-data" autocomplete="on" action="'; echo htmlspecialchars("dashboard.php?halaman=edit_database&id=$username&id_admin=$temp_id_admin&sub=data_pegawai"); echo '">
                        <table id="dataTableEdit" width="auto" cellspacing="0">
                            <tr>
                                <td valign="top">Nama</td>   
                                <td valign="top">:</td>   
                                <td valign="top">
                                    <input type="text" name="nama_admin" size="30" maxlength="100" placeholder="nama admin (max 100 characters)" autofocus value="'; echo $nama_admin; echo '">
                                </td>
                                <td valign="top">
                                    <span style="color:red">*'; echo (isset($error_nama_admin)) ? $error_nama_admin : ""; echo '</span>
                                </td>  
                            </tr>
                            <tr>
                                <td valign="top">Address</td>   
                                <td valign="top">:</td>   
                                <td valign="top">
                                    <textarea name="address" size="30" maxlength="200" placeholder="address admin (max 200 characters)" autofocus>'; echo $address; echo '</textarea>
                                </td>
                                <td valign="top">
                                    <span style="color:red">*'; echo (isset($error_address)) ? $error_address : ""; echo '</span>
                                </td>  
                            </tr>
                            <tr>
                                <td valign="top">Username</td>   
                                <td valign="top">:</td>   
                                <td valign="top">
                                    <input type="text" name="username" size="30" maxlength="30" placeholder="username admin (max 30 characters)" autofocus value="'; echo $usernamePegawai; echo '">
                                </td>
                                <td valign="top">
                                    <span style="color:red">*'; echo (isset($error_username)) ? $error_username : ""; echo '</span>
                                </td>  
                            </tr>
                            <tr>
                                <td valign="top">Password</td>   
                                <td valign="top">:</td>   
                                <td valign="top">
                                    <input type="password" name="password" size="30" maxlength="30" placeholder="password admin (max 30 characters)" autofocus value="'; echo $password; echo '">
                                </td>
                                <td valign="top">
                                    <span style="color:red">*'; echo (isset($error_password)) ? $error_password : ""; echo '</span>
                                </td>  
                            </tr>
                            <tr>
                                <td valign="top">Email</td>   
                                <td valign="top">:</td>   
                                <td valign="top">
                                    <input type="text" name="email" size="30" maxlength="50" placeholder="email admin (max 50 characters)" autofocus value="'; echo $email; echo '">
                                </td>
                                <td valign="top">
                                    <span style="color:red">*'; echo (isset($error_email)) ? $error_email : ""; echo '</span>
                                </td>  
                            </tr>
                            <tr>
                                <td valign="top">Gambar Profil</td>   
                                <td valign="top">:</td>   
                                <td valign="top">
                                   <input type="file" name="fileToUpload" id="fileToUpload">
                                </td>
                                <td valign="top">
                                    <span style="color:red">*'; echo (isset($error_gambar_profil)) ? $error_gambar_profil : ""; echo '</span>
                                </td>  
                            </tr>
                            <tr>   
                                <td valign="top"><br>
                                <a class="btn btn-primary" href="dashboard.php?halaman=data_pegawai&id='; echo $username; echo'" role="button">Kembali</a>
                                <input class="btn btn-primary" type="submit" name="submit_all" value="Submit">  
                                </td>
                            </tr>
                        </table>
                    </form>';
    }
?>
              </div>
            </div>
