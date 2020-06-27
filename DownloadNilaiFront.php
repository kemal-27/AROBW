<?php
// memanggil library FPDF
require('phpfpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$db_host='localhost';
$db_database='raport';
$db_username='root';
$db_password='';

 session_start();

$con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
$pdf = new FPDF('l','mm','A5');
$tahun=$_GET['tahun'];
$semester=$_GET['semester'];
$kdsiswa=$_GET['id'];
if($semester==1){
	$semester2="Gasal";}
else{
	$semester2="Genap";
}
// membuat halaman baru
$query2 = "SELECT * FROM mata_pelajaran mp INNER JOIN nilai n ON mp.kd_mapel=n.kd_mapel INNER JOIN siswa s ON s.nisn=n.nisn INNER JOIN kelas k on k.kd_kelas=s.kd_kelas where s.nisn='".$kdsiswa."' AND n.tahun_ajaran='".$tahun."'AND n.semester='".$semester."'order by nama_mapel" ;
$result = mysqli_query($con, $query2);
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'Nilai Raport Tahun Ajaran '.$tahun.' Semester '.$semester2,0,1,'C');
$pdf->SetFont('Arial','B',12);

 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
 $pdf->SetX(20);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,6,'Nama Mapel',1,0,'C');
$pdf->Cell(20,6,'KKM',1,0,'C');
$pdf->Cell(27,6,'Nilai',1,0,'C');
$pdf->Cell(25,6,'Keterangan',1,1,'C');

$pdf->SetFont('Arial','',10);
 
 
while ($row = mysqli_fetch_array($result)){
	$pdf->SetX(20);
    $pdf->Cell(100,6,$row['nama_mapel'],1,0);
    $pdf->Cell(20,6,$row['kkm'],1,0,'C');
    $pdf->Cell(27,6,$row['nilai'],1,0,'C');
    $pdf->Cell(25,6,$row['keterangan'],1,1,'C'); 
}
 
$pdf->Output();
?>