<?php
            $db_host='localhost';
            $db_database='raport';
            $db_username='root';
            $db_password='palembang27';
            $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
            $kelas=$_POST['kelas'];
            session_start();
            $username=$_SESSION['id'];
            if ($kelas==""){
            $query = "SELECT DISTINCT siswa.nisn,nama_siswa,jenis_kelamin,kd_kelas FROM siswa INNER JOIN nilai on siswa.nisn=nilai.nisn order by kd_kelas, nama_siswa";   
            }else{
            $query = "SELECT DISTINCT siswa.nisn,nama_siswa,jenis_kelamin,kd_kelas FROM siswa INNER JOIN nilai on siswa.nisn=nilai.nisn where kd_kelas='".$kelas."' order by kd_kelas, nama_siswa";
            }
            $result = mysqli_query($con, $query);
            if(!$result)
            {
              die("Could not query the database: <br />". mysqli_error($con));
            }
            while($row = mysqli_fetch_array($result)){

          echo '<tr>
            <td>'.$row['nisn'].'</td>
            <td>'.$row['nama_siswa'].'</td>
            <td>'.$row['jenis_kelamin'].'</td>
            <td>'.$row['kd_kelas'].'</td>
            <td>                                                                
              <a href="dashboard.php?halaman=detailNilai&id='.$username.'&kdsiswa='.$row['nisn'].'&sub=data_nilai_siswa" class="btn-info btn" >Lihat Data</a>
              <a href="dashboard.php?halaman=delete_database&id='.$username.'&kdsiswa='.$row['nisn'].'&sub=data_nilai_siswa" class="btn-warning btn" >Delete</a>                   
              
            </td>
          </tr>';
        }


?>          