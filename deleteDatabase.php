<?php
    if($_GET['sub'] == "data_nilai_siswa")
    {
        if ($_GET['kd_mapel']=="all"){
            $query = "DELETE FROM nilai WHERE nisn=".$_GET['kdsiswa']."";
        }else{
        $query = "DELETE FROM nilai WHERE kd_nilai=".$_GET['kd_nilai']."";}
        $result = mysqli_query($con, $query);
        if(!$result)
        {
            echo("Could not query the database: <br />". mysqli_error($con));
            echo "<p><a href='"."dashboard.php?halaman=detailNilai&id=$username&kdsiswa=".$_GET['kdsiswa']."&sub=data_nilai_siswa"."'>Kembali</a>";
            die();
        }
        echo "<div class=\"alert alert-info\">Data berhasil dihapus</div>";
        echo "<meta http-equiv='refresh' content='1; url=dashboard.php?halaman=detailNilai&id=$username"."&kdsiswa=".$_GET['kdsiswa']."&sub=data_nilai_siswa"."'>";
    }
    if($_GET['sub'] == "data_siswa")
    {
        $query = "DELETE FROM siswa WHERE nisn=".$_GET['nisn']."";
        $result = mysqli_query($con, $query);
        if(!$result)
        {
            echo("Could not query the database: <br />". mysqli_error($con));
            echo "<p><a href=\"dashboard.php?halaman=data_siswa&id=$username\">Kembali</a>";
            die();
        }
        echo "<div class=\"alert alert-info\">Data berhasil dihapus</div>";
        echo "<meta http-equiv=\"refresh\" content=\"1; url=dashboard.php?halaman=data_siswa&id=$username\">";
    }
    if($_GET['sub'] == "data_pegawai")
    {
        $query = "DELETE FROM admin WHERE id_admin=".$_GET['id_admin'];
        $query2 = "DELETE FROM profile WHERE idprofile=".$_GET['id_admin'];
        $query3 = "SELECT * FROM admin WHERE id_admin=".$_GET['id_admin'];
        $result3 = mysqli_query($con, $query3);
        $result = mysqli_query($con, $query);
        $result2 = mysqli_query($con, $query2);
        if(!$result)
        {
            echo("Could not query the database: <br />". mysqli_error($con));
            echo "<p><a href=\"dashboard.php?halaman=data_pegawai&id=$username\">Kembali</a>";
            die();
        }
        $row3 = mysqli_fetch_array($result3);
        $file = "img/".$row3['username'];
        if(file_exists($file.".jpg"))
        {
            if(unlink($file.".jpg"))
            {
            }
            else
            {
                die("$file cannot be deleted due to an error.");
            }
        }
        else if(file_exists($file.".png"))
        {
            if(unlink($file.".png"))
            {
            }
            else
            {
                die("$file cannot be deleted due to an error.");
            }
        }
        else if(file_exists($file.".jpeg"))
        {
            if(unlink($file.".jpeg"))
            {
            }
            else
            {
                die("$file cannot be deleted due to an error.");
            }
        }
        else if(file_exists($file.".gif"))
        {
            if(unlink($file.".gif"))
            {
            }
            else
            {
                die("$file cannot be deleted due to an error.");
            }
        }
        echo "<div class=\"alert alert-info\">Data berhasil dihapus</div>";
        echo "<meta http-equiv=\"refresh\" content=\"1; url=dashboard.php?halaman=data_pegawai&id=$username\">";
    } 
?>
