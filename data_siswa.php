<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-4 text-gray-800">
      Data Siswa
    </h1>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data tabel Data Siswa</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
          <th>NISN</th>
          <th>Nama Siswa</th>
          <th>Tanggal Lahir</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>Agama</th>
          <th>Anak Ke</th>
          <th>Status</th>
          <th>Nama Ayah</th>
          <th>Nama Ibu</th>
          <th>Pekerjaan Ayah</th>
          <th>Pekerjaan Ibu</th>
          <th>No Telepon</th>
          <th>Tanggal Diterima</th>
          <th>Sekolah Asal</th>
          <th>Kode Kelas</th>
          <th>Username</th>
          <th>Password</th>
          <th>Gambar</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          <?php
            $id=$_GET['id'];
            $query = "SELECT * FROM siswa";
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
            <td><?php echo $row['tgl_lahir']; ?></td>
            <td><?php echo $row['jenis_kelamin']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['agama']; ?></td>
            <td><?php echo $row['anak_ke']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['nama_ayah']; ?></td>
            <td><?php echo $row['nama_ibu']; ?></td>
            <td><?php echo $row['pekerjaan_ayah']; ?></td>
            <td><?php echo $row['pekerjaan_ibu']; ?></td>
            <td><?php echo $row['no_telp']; ?></td>
            <td><?php echo $row['tgl_diterima']; ?></td>
            <td><?php echo $row['sekolah_asal']; ?></td>
            <td><?php echo $row['kd_kelas']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['gambar']; ?></td>
            <td>                                                                        
              <a href="dashboard.php?halaman=edit_databaseSiswa&id=<?php echo $username; echo "&nisn=".$row['nisn']; echo "&sub=data_siswa"; ?>" class="btn-danger btn" >Edit</a>
              <a href="dashboard.php?halaman=delete_database&id=<?php echo $username; echo "&nisn=".$row['nisn']; echo "&sub=data_siswa"; ?>" class="btn-warning btn" >Delete</a>
              <a href="downloadDataDiri.php?<?php echo "kdsiswa=".$row['nisn']; ?>" class="btn-info btn" >Download</a>
            </td>
          </tr>
          <?php
            }
          ?>
        </tbody>
        <a href="dashboard.php?halaman=add_database&id=<?php echo $username; echo "&sub=data_siswa"; ?>" class="btn-danger btn" style="margin-bottom: 20px">Buat Data Siswa Baru</a>
      </table>
    </div>
  </div>
</div>

