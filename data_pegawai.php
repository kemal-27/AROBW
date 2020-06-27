<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-4 text-gray-800">
      Data Pegawai 
    </h1>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Tabel Data Pegawai</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
          <th>Id Admin</th>
          <th>Nama Admin</th>
          <th>Alamat</th>
          <th>Username</th>
          <th>Password</th>
          <th>Email</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          <?php
            $query = "SELECT * FROM admin";
            $result = mysqli_query($con, $query);
            if(!$result)
            {
              die("Could not query the database: <br />". mysqli_error($con));
            }
            while($row = mysqli_fetch_array($result)){;
          ?>
          <tr>
            <td><?php echo $row['id_admin']; ?></td>
            <td><?php echo $row['nama_admin']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>                                                                        
              <a href="dashboard.php?halaman=edit_database&id=<?php echo $username; echo "&id_admin=".$row['id_admin']; echo "&sub=data_pegawai"; ?>" class="btn-danger btn" >Edit</a>
              <a href="dashboard.php?halaman=delete_database&id=<?php echo $username; echo "&id_admin=".$row['id_admin']; echo "&sub=data_pegawai"; ?>" class="btn-warning btn" >Delete</a>
            </td>
          </tr>
          <?php
            }
          ?>
        </tbody>
        <a href="dashboard.php?halaman=add_database&id=<?php echo $username; echo "&sub=data_pegawai"; ?>" class="btn-danger btn" style="margin-bottom: 20px">Buat Pegawai Baru</a>
      </table>
    </div>
  </div>
</div>

