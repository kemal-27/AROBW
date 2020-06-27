<?php
$query="SELECT * FROM kelas order by kd_kelas";
$result = mysqli_query($con, $query);
if(!$result)
{
  die("Could not query the database: <br />". mysqli_error($con));
} 

?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-4 text-gray-800">
      Data Mata Pelajaran
    </h1>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Tabel Kelas</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <a href="dashboard.php?halaman=tambahkelas&id=<?php echo $username;?>">Tambah Kelas</a>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          
        <tr>
          <th>Kelas</th>
          <th>Wali Kelas</th>
          <th>Kapasitas Kelas</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody id="nilaitahun">
          <?php while($row = mysqli_fetch_array($result)){?>
          <tr>
            <td><?php echo $row['kd_kelas']; ?></td>
            <td><?php echo $row['nama_walikelas']; ?></td>
            <td><?php echo $row['kapasitas_kelas']; ?></td>
            <td>                                                                
              <a href="dashboard.php?halaman=editkelas&id=<?php echo $username;echo "&kd_kelas=".$row['kd_kelas'];?>" class="btn-danger btn" >Edit</a>
              <a href="dashboard.php?halaman=deletekelas&id=<?php echo $username; echo "&kd_kelas=".$row['kd_kelas']; ?>" class="btn-warning btn" >Delete</a>
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

