<?php
        $kdkelas=$_GET['kd_kelas'];
         $query = "DELETE FROM kelas WHERE kd_kelas=\"$kdkelas\" ";
        
        $result = mysqli_query($con, $query);
        if(!$result)
        {
            echo("Could not query the database: <br />". mysqli_error($con));
            echo "<p><a href=\"dashboard.php?halaman=data_nilai_siswa&id=$username\">Kembali</a>";
            die();
        }
        echo "<div class=\"alert alert-info\">Data berhasil dihapus</div>";
        echo "<meta http-equiv=\"refresh\" content=\"1; url=dashboard.php?halaman=detailkelas&id=$username\">";


?>