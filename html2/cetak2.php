<?php 

require "/xampp/htdocs/SPPD/fpdf/fpdf.php";


$koneksi = mysqli_connect("localhost","root","","sppd");
$db = new PDO('mysql:host=localhost;dbname=sppd','root','');

// query untuk mengambil data berdasarkan data yang dipilih


$pdf = new FPDF('L','mm','LEGAL');


$pdf->AddPage();

$pdf->Image('/xampp/htdocs/SPPD/fpdf/gambar.png',15,9,23);
$pdf->SetFont('ARIAL','B',18);
$pdf->Cell(340,10,'PEMERINTAH PROVINSI JAMBI',0,1,'C',);
$pdf->SetFont('ARIAL','B',24);
$pdf->Cell(340,5,'DINAS KEHUTANAN',0,1,'C');
$pdf->SetFont('ARIAL','',9);
$pdf->Cell(340,5,'Jalan Arief Rahman Hakim No 10 Telanaipura, Jambi 36124',0,1,'C');
$pdf->SetFont('ARIAL','',9);
$pdf->Cell(340,3,'Website: www.kehutanan.jambiprov.go.id',0,1,'C');

$pdf->Line(10,34,340,34);
$pdf->SetFont('ARIAL','U',12);
$pdf->Cell(340,15,'REKAP PERJALANAN DINAS',0,1,'C');
$pdf->SetFont('ARIAL','',9);
$pdf->Cell(30,20,'NO',1,0,'C',);
$pdf->Cell(68,20,'Nomor Surat',1,0,'C',);
$pdf->Cell(45,20,'Tanggal',1,0,'C',);
$pdf->Cell(68,20,'Nama',1,0,'C',);

$pdf->Cell(68,20,'Tujuan',1,0,'C',);
$pdf->Cell(50,20,'Bidang',1,1,'C',);




// tabel

$panggildata = mysqli_query($koneksi, 'SELECT * FROM listsppd ORDER BY idsppd');
$idsppd = isset($_GET['idsppd']) ? $_GET['idsppd'] : "";
$panggildata = "SELECT * FROM listsppd WHERE idsppd LIKE '%" . $_GET['idsppd']."%'" ;
$query = $db->query($panggildata);
$no =1;



while($data = $query->fetch(PDO::FETCH_OBJ)){      
        $pdf->SetFont('ARIAL','',11);
        // $pdf->Cell(340,15,'',0,1,'C',);
        $pdf->Cell(30,20,$no++,1,0,'C',);
        $pdf->Cell(68,20,$data->nosurat,1,0,'C',);
        $pdf->Cell(45,20,$data->tanggal,1,0,'C',);
        $pdf->Cell(68,20,$data->nama,1,0,'C',);
        // $pdf->MultiCell(50,20,$hasil['tanggal'],1);
        // $pdf->MultiCell(68,20,$hasil['nama'],1);
        // $pdf->MultiCell(107,20,$hasil['dalamrangka'],0,'L');
        
     
        $pdf->Cell(68,20,$data->tujuanpelaksanaan,1,0,'C',);
        $pdf->Cell(50,20,$data->bidang,1,1,'C',);
        
    




}


$pdf->Output();


?>
