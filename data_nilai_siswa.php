

<script>function orderkelas(){
  var xmlhttp = getXMLHTTPRequest();
  //get input value
  var kelas = encodeURI(document.getElementById('kelas').value);
  //set url and innerssss
  var inner = "siswa";
  var url = "byKelasSiswa.php";
  var params = "kelas=" + kelas;
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
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr><a href="dashboard.php?halaman=addNilai&id=<?php echo $username; echo "&sub=data_nilai_siswa"; ?>" class="btn-danger btn" style="margin-bottom: 20px">Buat Nilai Baru</a></tr>
         <tr><?php
        $query2 = " SELECT * FROM kelas";
        // Execute the query
        $kelas = mysqli_query($con,$query2);
        if (!$kelas){
          die ("Could not query the database: <br />". mysqli_error($con));//koneksi kueri error
        }
          echo '
          <form id="form" method="POST" enctype="multipart/form-data" autocomplete="on">
          <select onchange="orderkelas()" id="kelas" name="kelas"  class="custom-select">
                          <option selected value="">Semua Kelas</option>
                        ';while($data = mysqli_fetch_array($kelas)){
                            echo '<option value='.$data['kd_kelas'].'>'.$data['kd_kelas'].'</option>';
                            }echo '
                        </select>
              </form> <br>'
          ?></tr><tr><br></tr>
        <tr>
          <th>NISN</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Kelas</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody id="siswa">
          <?php

            $query = "SELECT DISTINCT siswa.nisn,nama_siswa,jenis_kelamin,kd_kelas FROM siswa INNER JOIN nilai on siswa.nisn=nilai.nisn order by kd_kelas, nama_siswa";
            $result = mysqli_query($con, $query);
            if(!$result)
            {
              die("Could not query the database: <br />". mysqli_error($con));
            }
            while($row = mysqli_fetch_array($result)){;
          ?>
          <tr>
            <td><?php echo $row['nisn']; ?></td>
            <td><?php echo $row['nama_siswa']; ?></td>
            <td><?php echo $row['jenis_kelamin']; ?></td>
            <td><?php echo $row['kd_kelas']; ?></td>
            <td>                                                                
              <a href="dashboard.php?halaman=detailNilai&id=<?php echo $username; echo "&kdsiswa=".$row['nisn']; echo "&sub=data_nilai_siswa"; ?>" class="btn-info btn" >Lihat Data</a>        
              <a href="dashboard.php?halaman=delete_database&id=<?php echo $username; echo "&kdsiswa=".$row['nisn']; echo "&kd_mapel=all"; echo "&sub=data_nilai_siswa"; ?>" class="btn-warning btn" >Delete</a>
            </td>
          </tr>
          <?php
            }
          ?>
        </tbody>

        
        
      </table>
    </div>
  </div>
</div>

