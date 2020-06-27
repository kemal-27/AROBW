   
  <?php
 $tapel = $_POST['tapel'];
    $smt = $_POST['smt'];
     $kdsiswa = $_POST['kdsiswa'];
  ?>
   <tr><td class="hide_all"><a href="DownloadNilaiFront.php?id=<?php echo $kdsiswa; ?>&tahun=<?php echo $tapel; ?>&semester=<?php echo $smt; ?>" class="btn-info btn" >Download</a></td></tr>
  <?php
   
   
    $i = 1;
    require_once("koneksi.php");
    $query = "SELECT * FROM nilai JOIN mata_pelajaran ON nilai.kd_mapel=mata_pelajaran.kd_mapel WHERE nilai.nisn='$kdsiswa' AND nilai.tahun_ajaran='$tapel' AND nilai.semester='$smt' ORDER BY nilai.kd_mapel ASC";
    $result = mysqli_query($koneksi, $query);
    if(!$result)
    {
      die("Could not query the database: <br />". mysqli_error($koneksi));
    }
    echo '<tr>
          <th>No.</th>
          <th>Mata Pelajaran</th>
          <th>Tahun Ajaran</th>
          <th>Semester</th>
          <th>Nilai</th>
          <th>Keterangan</th>
        </tr>';
    while($row = mysqli_fetch_array($result)){
  echo "<tr>
    <td>".$i."</td>
    <td>".$row['nama_mapel']."</td>
    <td>".$row['tahun_ajaran']."</td>
    <td>".$row['semester']."</td>
    <td>".$row['nilai']."</td>
    <td>".$row['keterangan']."</td>
  </tr>";
    $i++;
    }
  ?>
