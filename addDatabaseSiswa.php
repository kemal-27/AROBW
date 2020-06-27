<!-- addDataSiswa -->
<?php
    if(isset($_POST["submit_all"]))
    {
        if($_GET['sub'] == "data_siswa")
        {
            $nisn = filter_var($_POST['nisn'],FILTER_SANITIZE_STRING);
            $nama_siswa = filter_var($_POST['nama_siswa'],FILTER_SANITIZE_STRING);
            $tgl_lahir = filter_var($_POST['tgl_lahir'],FILTER_SANITIZE_STRING);
            $jenis_kelamin = filter_var($_POST['jenis_kelamin'],FILTER_SANITIZE_STRING);
            $alamat = filter_var($_POST['alamat'],FILTER_SANITIZE_STRING);
            $agama = filter_var($_POST['agama'],FILTER_SANITIZE_STRING);
            $anak_ke = filter_var($_POST['anak_ke'],FILTER_SANITIZE_STRING);
            $status = filter_var($_POST['status'],FILTER_SANITIZE_STRING);
            $nama_ayah = filter_var($_POST['nama_ayah'],FILTER_SANITIZE_STRING);
            $nama_ibu = filter_var($_POST['nama_ibu'],FILTER_SANITIZE_STRING);
            $pekerjaan_ayah = filter_var($_POST['pekerjaan_ayah'],FILTER_SANITIZE_STRING);
            $pekerjaan_ibu = filter_var($_POST['pekerjaan_ibu'],FILTER_SANITIZE_STRING);
            $no_telp = filter_var($_POST['no_telp'],FILTER_SANITIZE_STRING);
            $tgl_diterima = filter_var($_POST['tgl_diterima'],FILTER_SANITIZE_STRING);
            $sekolah_asal = filter_var($_POST['sekolah_asal'],FILTER_SANITIZE_STRING);
            $kd_kelas = filter_var($_POST['kd_kelas'],FILTER_SANITIZE_STRING);
            $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
            $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
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
                    echo "Sorry, there was an error uploading your file.";
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
                    
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            $error_nisn = NULL;
            $error_nama_siswa = NULL;
            $error_tgl_lahir = NULL;
            $error_jenis_kelamin = NULL;
            $error_alamat = NULL;
            $error_agama = NULL;
            $error_anak_ke = NULL;
            $error_status = NULL;
            $error_nama_ayah = NULL;
            $error_nama_ibu = NULL;
            $error_pekerjaan_ayah = NULL;
            $error_pekerjaan_ibu = NULL;
            $error_no_telp = NULL;
            $error_tgl_diterima = NULL;
            $error_sekolah_asal = NULL;
            $error_kd_kelas = NULL;
            $error_username = NULL;
            $error_password = NULL;
            $error_gambar_profil = NULL;
            if($nisn == '')
            {
                $error_nisn = "NISN diperlukan";
            }
            if($nama_siswa == '')
            {
                $error_nama_siswa = "Nama Siswa diperlukan";
            }
            if($tgl_lahir == '')
            {
                $error_username = "Tanggal Lahir diperlukan";
            }
            if($jenis_kelamin == '')
            {
                $error_jenis_kelamin = "Jenis Kelamin diperlukan";
            }
            if($alamat == '')
            {
                $error_alamat = "Alamat diperlukan";
            }
            if($agama == '')
            {
                $error_agama = "Agama diperlukan";
            }
            if($anak_ke == '')
            {
                $error_anak_ke = "Data ini diperlukan";
            }
            if($status == '')
            {
                $error_status = "Status diperlukan";
            }
            if($nama_ayah == '')
            {
                $error_nama_ayah = "Nama Ayah diperlukan";
            }
            if($nama_ibu == '')
            {
                $error_nama_ibu = "Nama Ibu diperlukan";
            }
            if($pekerjaan_ayah == '')
            {
                $error_pekerjaan_ayah = "Pekerjaan Ayah diperlukan";
            }
            if($pekerjaan_ibu == '')
            {
                $error_pekerjaan_ibu = "Pekerjaan Ibu diperlukan";
            }
            if($no_telp == '')
            {
                $error_no_telp = "Nomor Telepon diperlukan";
            }
            if($tgl_diterima == '')
            {
                $error_tgl_diterima = "Tanggal Diterima diperlukan";
            }
            if($sekolah_asal == '')
            {
                $error_sekolah_asal = "Sekolah Asal diperlukan";
            }
            if($kd_kelas == '')
            {
                $error_kd_kelas = "Kode Kelas diperlukan";
            }
            if($username == '')
            {
                $error_username = "Username diperlukan";
            }
            if($password == '')
            {
                $error_password = "Password diperlukan";
            }
            if($gambar_nama == '')
            {
                $error_gambar_profil = "Gambar Profil diperlukan";
            }
            if($error_nisn || $error_nama_siswa || $error_tgl_lahir || $error_jenis_kelamin || $error_alamat || $error_agama || $error_anak_ke || $error_status || $error_nama_ayah || $error_nama_ibu || $error_pekerjaan_ayah || $error_pekerjaan_ibu || $error_no_telp || $error_tgl_diterima || $error_sekolah_asal || $error_kd_kelas || $error_username || $error_password || $error_gambar_profil)
            {
            }
            else
            {
                $query = " SELECT MAX(nisn) as MAX FROM siswa";
                $temp_result = mysqli_query($con, $query);
                if(!$temp_result)
                {
                    echo("Could not query the database: <br />". mysqli_error($con));
                    echo "<p><a href=\"dashboard.php?halaman=add_database&id=$username&sub=data_siswa\">Kembali</a>";
                    die();
                }
                $temp_row = mysqli_fetch_array($temp_result);
                $increment = 0;
                $increment = $temp_row['MAX'] + 1;
                $query = " ALTER TABLE siswa AUTO_INCREMENT=".$temp_row['MAX'];
                $temp_result = mysqli_query($con, $query);
                if(!$temp_result)
                {
                    echo("Could not query the database: <br />". mysqli_error($con));
                    echo "<p><a href=\"dashboard.php?halaman=add_database&id=$username&sub=data_siswa\">Kembali</a>";
                    die();
                }
                $query = " ALTER TABLE siswa AUTO_INCREMENT=".$temp_row['MAX'];
                $temp_result = mysqli_query($con, $query);
                if(!$temp_result)
                {
                    echo("Could not query the database: <br />". mysqli_error($con));
                    echo "<p><a href=\"dashboard.php?halaman=add_database&id=$username&sub=data_siswa\">Kembali</a>";
                    die();
                }
                $query = " INSERT INTO siswa (nisn, nama_siswa, tgl_lahir, jenis_kelamin, alamat, agama, anak_ke, status, nama_ayah, nama_ibu, pekerjaan_ayah, pekerjaan_ibu, no_telp, tgl_diterima, sekolah_asal, kd_kelas, username, password, gambar) VALUES ('$nisn', '$nama_siswa', '$tgl_lahir', '$jenis_kelamin', '$alamat', '$agama', '$anak_ke', '$status', '$nama_ayah', '$nama_ibu', '$pekerjaan_ayah', '$pekerjaan_ibu', '$no_telp', '$tgl_diterima', '$sekolah_asal', '$kd_kelas', '$username', '$password', '$gambar_profil')";
                $result = mysqli_query($con, $query);
                if(!$result)
                {
                    echo("Could not query the database: <br />". mysqli_error($con));
                    echo "<p><a href=\"dashboard.php?halaman=add_database&id=$username&sub=data_siswa\">Kembali</a>";
                    die();
                }
                else
                {
                    echo "<div class=\"alert alert-info\">1 record added</div>";
                }
            }
        }
    }
?>
<?php
    if($_GET['sub'] == "data_siswa")
    {
        echo '<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-4 text-gray-800">
                     Data Siswa
            </h1>
        </div>

        <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Input Data Siswa</h6>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
        <form method="POST" enctype="multipart/form-data" autocomplete="on" action="'; echo htmlspecialchars("dashboard.php?halaman=add_database&id=$username&sub=data_siswa"); echo '">
            <table id="dataTableAdd" width="auto" cellspacing="0">
                <tr>
                    <td valign="top">NISN</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="nisn" size="30" maxlength="100" placeholder="nisn (max 100 characters)" autofocus>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_nisn)) ? $error_nisn : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Nama Siswa</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="nama_siswa" size="30" rows="3" maxlength="200" placeholder="nama siswa  (max 50 characters)" autofocus></textarea>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_nama_siswa)) ? $error_nama_siswa : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Tanggal Lahir</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="tgl_lahir" size="30" maxlength="30" placeholder="tanggal lahir (max 30 characters)" autofocus>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_tgl_lahir)) ? $error_tgl_lahir : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Jenis Kelamin</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="jenis_kelamin" size="30" maxlength="30" placeholder="jenis kelamin (max 30 characters)" autofocus>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_jenis_kelamin)) ? $error_jenis_kelamin : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Alamat</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <textarea name="alamat" size="30" maxlength="50" placeholder="alamat (max 50 characters)" autofocus></textarea>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_alamat)) ? $error_alamat : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Agama</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="agama" size="30" maxlength="50" placeholder="agama (max 50 characters)" autofocus></textarea>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_agama)) ? $error_agama : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Anak Ke</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="anak_ke" size="30" maxlength="50" placeholder="anak ke (max 50 characters)" autofocus></textarea>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_anak_ke)) ? $error_anak_ke : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Status</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="status" size="30" maxlength="50" placeholder="status (max 50 characters)" autofocus></textarea>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_status)) ? $error_status : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Nama Ayah</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="nama_ayah" size="30" maxlength="50" placeholder="nama ayah (max 50 characters)" autofocus></textarea>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_nama_ayah)) ? $error_nama_ayah : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Nama Ibu</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="nama_ibu" size="30" maxlength="50" placeholder="nama ibu (max 50 characters)" autofocus></textarea>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_nama_ibu)) ? $error_nama_ibu : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Pekerjaan Ayah</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="pekerjaan_ayah" size="30" maxlength="50" placeholder="pekerjaan ayah (max 50 characters)" autofocus></textarea>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_pekerjaan_ayah)) ? $error_pekerjaan_ayah : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Pekerjaan Ibu</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="pekerjaan_ibu" size="30" maxlength="50" placeholder="pekerjaan ibu (max 50 characters)" autofocus></textarea>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_pekerjaan_ibu)) ? $error_pekerjaan_ibu : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">No Telepon</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="no_telp" size="30" maxlength="50" placeholder="no telepon(max 50 characters)" autofocus></textarea>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_no_telp)) ? $error_no_telp : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Tanggal Diterima</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="tgl_diterima" size="30" maxlength="50" placeholder="tanggal diterima (max 50 characters)" autofocus></textarea>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_tgl_diterima)) ? $error_tgl_diterima : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Sekolah Asal</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="sekolah_asal" size="30" maxlength="50" placeholder="sekolah asal (max 50 characters)" autofocus></textarea>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_sekolah_asal)) ? $error_sekolah_asal : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Kode Kelas</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="kd_kelas" size="30" maxlength="50" placeholder="kode kelas (max 50 characters)" autofocus></textarea>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_kd_kelas)) ? $error_kd_kelas : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Username</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="text" name="username" size="30" maxlength="50" placeholder="username (max 50 characters)" autofocus></textarea>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_username)) ? $error_username : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Password</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="password" name="password" size="30" maxlength="50" placeholder="password (max 50 characters)" autofocus></textarea>
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($error_password)) ? $error_password : ""; echo '</span>
                    </td>  
                </tr>
                <tr>
                    <td valign="top">Gambar Profil</td>   
                    <td valign="top">:</td>   
                    <td valign="top">
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </td>
                    <td valign="top">
                        <span style="color:red">*'; echo (isset($_profil)) ? $error_gambar_profil : ""; echo '</span>
                    </td>  
                </tr>
                <tr>   
                    <td valign="top"><br>
                    <a class="btn btn-primary" href="dashboard.php?halaman=data_siswa&id='; echo $username; echo'" role="button">Kembali</a>
                    <input class="btn btn-primary" type="submit" name="submit_all" value="Submit">  
                    </td>
                </tr>
            </table>
         </form>';
    }
?>
              </div>
            </div>
