<script>
function getXMLHTTPRequest() {
  var req = false;
  try {
    /* for Firefox */
    req = new XMLHttpRequest();
  } catch (err) {
  try {
    /* for some versions of IE */
    req = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (err) {
  try {
/* for some other versions of IE */
    req = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (err) {
    req = false;
  }
  }
  }
return req;
}



  function orderTahun(){
  var xmlhttp = getXMLHTTPRequest();
  //get input value
  var tahun = encodeURI(document.getElementById('tahun').value);
  var semester = encodeURI(document.getElementById('semester').value);
  //set url and innerssss
  var inner = "nilaitahun";
  var url = "byTahunAjaran.php";
  var params = "tahun=" + tahun + "&semester="+ semester;
  xmlhttp.open("POST", url, true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.onreadystatechange = function() {
  document.getElementById(inner).innerHTML = '<imgsrc="images/ajax_loader.png"/>';
  if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
  document.getElementById(inner).innerHTML =xmlhttp.responseText;
  }
  return false;
  }
  xmlhttp.send(params);
}
</script>

<?php
 $kdsiswa=$_GET['kdsiswa'];
            $_SESSION['kdsiswa']=$kdsiswa;

            $query = "SELECT * FROM mata_pelajaran mp INNER JOIN nilai n ON mp.kd_mapel=n.kd_mapel INNER JOIN siswa s ON s.nisn=n.nisn INNER JOIN kelas k on k.kd_kelas=s.kd_kelas where s.nisn='".$kdsiswa."' order by nama_mapel" ;
            $query5 = "SELECT DISTINCT tahun_ajaran FROM  nilai where nisn='".$kdsiswa."' order by tahun_ajaran DESC" ;
            $result4 = mysqli_query($con, $query5);
            $row3 = mysqli_fetch_array($result4);
            $tahun = $row3['tahun_ajaran'];


            $query6 = "SELECT DISTINCT tahun_ajaran, semester FROM  nilai where nisn='".$kdsiswa."' order by tahun_ajaran DESC, semester DESC" ;
            $result5 = mysqli_query($con, $query6);
            $row4 = mysqli_fetch_array($result5);
            $semester = $row4['semester'];


            $result2 = mysqli_query($con, $query);
            $result3 = mysqli_query($con, $query5);
            $row2 = mysqli_fetch_array($result2);
           
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-4 text-gray-800">
      Data Nilai Siswa 
    </h1>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Tabel Data Nilai Siswa</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table width="100%" border=0>
        <tr>
          <td>Nama : <?php echo $row2['nama_siswa']?></td>
          <td>Kelas : <?php echo $row2['kd_kelas']?></td>
        </tr>

        <tr>
          <td>NISN : <?php echo $row2['nisn']?></td>
          <td width="11%">Tahun Ajaran :</td><td> <?php  echo'
          <form  id="form" method="POST" enctype="multipart/form-data" autocomplete="on">
          <select onchange="orderTahun()" type="text" style="width:35%"  id="tahun" name="tahun" >
                        ';while($data = mysqli_fetch_array($result3)){
                            echo '<option value="'.$data['tahun_ajaran'].'">'.$data['tahun_ajaran'].'</option>';
                            }echo '
                        </select>
                      
            </form>'?></td>
        </tr>
        <tr>
          <td>Alamat : <?php echo $row2['alamat']?></td>
          <td>Semester : </td>
          <td> <?php  echo'
          <form  id="form" method="POST" enctype="multipart/form-data" autocomplete="on">
          <select style="width:35%" onchange="orderTahun()" id="semester" name="semester" >
                          
                          ';if ($semester==1){
                          echo'
                          <option selected value="1">Gasal</option>
                          <option value="2">Genap</option>';
                          }else{
                          echo'
                          <option selected value="2">Genap</option>
                          <option value="1">Gasal</option>';
                          }

                          echo '
                        </select>
              </form>';?></td>
        </tr>
        <tr><td><a href="DownloadNilai.php">Download</a></td></tr>
        <tr><td><a href="dashboard.php?halaman=tambahNilai&id=<?php echo $username; echo "&sub=data_nilai_siswa"; echo "&kdsiswa=".$_GET['kdsiswa'].""; ?>">Tambah Nilai</a></td></tr>
      </table>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          
        <tr>
          <th>Mata Pelajaran</th>
          <th>KKM</th>
          <th>Nilai</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody id="nilaitahun">
          <?php
            
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
          ?>
          <tr>
            <td><?php echo $row['nama_mapel']; ?></td>
            <td><?php echo $row['kkm']; ?></td>
            <td><?php echo $row['nilai']; ?></td>
            <td><?php echo $row['keterangan']; ?></td>
            <td>                                                                
              <a href="dashboard.php?halaman=edit_database&id=<?php echo $username; echo "&kdsiswa=".$row['nisn'];echo "&kd_nilai=".$row['kd_nilai'];; echo "&sub=data_nilai_siswa"; ?>" class="btn-danger btn" >Edit</a>
              <a href="dashboard.php?halaman=delete_database&id=<?php echo $username; echo "&kdsiswa=".$row['nisn']; echo "&kd_nilai=".$row['kd_nilai'];echo "&kd_mapel=".$row['kd_mapel']; echo "&sub=data_nilai_siswa"; ?>" class="btn-warning btn" >Delete</a>
            </td>
          </tr>
          <?php
            }
            if ($i>0){
          echo '
          <tr>
            <td colspan="2">Total Nilai :  </td> 
            <td>'.$sum.'</td>
          </tr>
          <tr>
            <td colspan="2">Rata-rata Nilai :  </td> 
            <td>'.$sum/$i.'</td>
          </tr>
          ';
        }
          ?>
        </tbody>     
      </table>
    </div>
  </div>
</div>

