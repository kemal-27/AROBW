<?php
         $db_host='localhost';
        $db_database='raport';
        $db_username='root';
        $db_password='palembang27';
        $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
        if (mysqli_connect_errno()){
          die ("Could not connect to the database: <br />". mysqli_connect_error( ));
        }
        $kelas=$_POST['kelas'];
        //Asign a query
        $query = " SELECT * FROM siswa where kd_kelas='".$kelas."'";
        // Execute the query
        $siswa = mysqli_query($con,$query);
        while($data = mysqli_fetch_array($siswa)){
            echo '<option value='.$data['nisn'].'>'.$data['nama_siswa'].'</option>';
         }

?>