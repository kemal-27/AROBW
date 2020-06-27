<?php
            $db_host='localhost';
            $db_database='raport';
            $db_username='root';
            $db_password='';
            $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
            $tahun=$_POST['tahun'];
            $semester=$_POST['semester'];
            session_start();
            $username=$_SESSION['id'];
            $kdsiswa=$_SESSION['kdsiswa'];
            $query2 = "SELECT * FROM mata_pelajaran mp INNER JOIN nilai n ON mp.kd_mapel=n.kd_mapel INNER JOIN siswa s ON s.nisn=n.nisn INNER JOIN kelas k on k.kd_kelas=s.kd_kelas where s.nisn='".$kdsiswa."' AND n.tahun_ajaran='".$tahun."'AND n.semester='".$semester."'order by nama_mapel" ;
             $_SESSION['tahun']=$tahun;
            $_SESSION['semester']=$semester;
             $result = mysqli_query($con, $query2);
            if(!$result)
            {
              die("Could not query the database: <br />". mysqli_error($con));
            }
            $sum=0;
            $i=0;
            while($row = mysqli_fetch_array($result)){
            $sum=$sum+$row['nilai'];
            $i=$i+1;

          echo ' <tr>
            <td>'.$row['nama_mapel'].'</td>
            <td>'.$row['kkm'].'</td>
            <td>'.$row['nilai'].'</td>
            <td>'.$row['keterangan'].'</td>
            <td>                                                                
              
                    <a href="dashboard.php?halaman=edit_database&id='.$username.'&kdsiswa='.$row['nisn'].'&kd_nilai='.$row['kd_nilai'].'&sub=data_nilai_siswa" class="btn-danger btn" >Edit</a>
              <a href="dashboard.php?halaman=delete_database&id='.$username.'&kdsiswa='.$row['nisn'].'&kd_nilai='.$row['kd_nilai'].'&kd_mapel='.$row['kd_mapel'].'&sub=data_nilai_siswa" class="btn-warning btn" >Delete</a> 
            </td>
          </tr>';
        }
        if($i>0){
        echo '<tr>
            <td colspan="2">Total Nilai :  </td> 
            <td>'.$sum.'</td>
          </tr>
          <tr>
            <td colspan="2">Rata-rata Nilai :  </td> 
            <td>'.$sum/$i.'</td>
          </tr> ';
        }

?>          