<?php
// memanggil library FPDF
require('phpfpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$db_host='localhost';
$db_database='raport';
$db_username='root';
$db_password='';
$con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
$pdf = new FPDF('P','mm','A4');
 session_start();
$kdsiswa=$_GET['kdsiswa'];
// membuat halaman baru
$query2 = "SELECT * FROM siswa where nisn=".$kdsiswa;
$result = mysqli_query($con, $query2);
$row = mysqli_fetch_array($result);
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(200,7,'KETERANGAN TENTANG DIRI PESERTA DIDIK',0,1,'C');
$pdf->Cell(200,7,' ',0,1,'C');
$pdf->Cell(200,7,' ',0,1,'C');
$pdf->SetFont('Arial','B',12);

$pdf->Cell(70,9,'1. Nama Peserta Didik (lengkap) ',0,0,'L');$pdf->Cell(10,9,' :',0,0,'L');
$pdf->Cell(200,9,$row['nama_siswa'],0,1,'L');

 $pdf->Cell(70,9,'2. Nomor Induk Siswa Nasional ',0,0,'L');$pdf->Cell(10,9,' :',0,0,'L');
$pdf->Cell(20,9,$row['nisn'],0,1,'L');
 
 $pdf->Cell(70,9,'3. Tanggal Lahir ',0,0,'L');$pdf->Cell(10,9,' :',0,0,'L');
 $pdf->Cell(200,9,$row['tgl_lahir'],0,1,'L');
 
 $pdf->Cell(70,9,'4. Jenis Kelamin ',0,0,'L');$pdf->Cell(10,9,' :',0,0,'L');
 $pdf->Cell(200,9,$row['jenis_kelamin'],0,1,'L');
 
 $pdf->Cell(70,9,'5. Agama ',0,0,'L');$pdf->Cell(10,9,' :',0,0,'L');
 $pdf->Cell(200,9,$row['agama'],0,1,'L');
 
  $pdf->Cell(70,9,'6. Status Dalam Keluarga ',0,0,'L');$pdf->Cell(10,9,' :',0,0,'L');
 $pdf->Cell(200,9,$row['status'],0,1,'L');

$pdf->Cell(70,9,'7. Anak ke  ',0,0,'L');$pdf->Cell(10,9,' :',0,0,'L');
 $pdf->Cell(200,9,$row['anak_ke'],0,1,'L');

 $pdf->Cell(70,9,'8. Alamat Peserta Didik ',0,0,'L');$pdf->Cell(10,9,' :',0,0,'L');
 $pdf->Cell(200,9,$row['alamat'],0,1,'L');

 $pdf->Cell(70,9,'9. Nomer Telepon Rumah ',0,0,'L');$pdf->Cell(10,9,' :',0,0,'L');
 $pdf->Cell(200,9,$row['no_telp'],0,1,'L'); 

 $pdf->Cell(70,9,'10. Sekolah Asal ',0,0,'L');$pdf->Cell(10,9,' :',0,0,'L');
 $pdf->Cell(200,9,$row['sekolah_asal'],0,1,'L');

$pdf->Cell(70,9,'11. Diterima Pada ',0,0,'L');$pdf->Cell(10,9,' :',0,0,'L');
 $pdf->Cell(200,7,$row['tgl_diterima'],0,1,'L');

 $pdf->Cell(70,9,'12. Nama Orang Tua ',0,0,'L');$pdf->Cell(10,9,' :',0,1,'L');
 $pdf->Cell(10,9,' ',0,0,'C');$pdf->Cell(60,9,'a. Ayah ',0,0,'L');$pdf->Cell(10,9,' :',0,0,'L');
 $pdf->Cell(200,9,$row['nama_ayah'],0,1,'L');
 $pdf->Cell(10,9,' ',0,0,'C');$pdf->Cell(60,9,'b. ibu ',0,0,'L');$pdf->Cell(10,9,' :',0,0,'L');
 $pdf->Cell(200,9,$row['nama_ibu'],0,1,'L');

 $pdf->Cell(70,9,'13. Pekerjaan Orang Tua ',0,0,'L');$pdf->Cell(10,9,' :',0,1,'L');
 $pdf->Cell(10,9,' ',0,0,'C');$pdf->Cell(60,9,'a. Ayah ',0,0,'L');$pdf->Cell(10,9,' :',0,0,'L');
 $pdf->Cell(200,9,$row['pekerjaan_ayah'],0,1,'L');
 $pdf->Cell(10,9,' ',0,0,'C');$pdf->Cell(60,9,'b. ibu ',0,0,'L');$pdf->Cell(10,9,' :',0,0,'L');
 $pdf->Cell(200,9,$row['pekerjaan_ibu'],0,1,'L');
 
$pdf->Output();
?>