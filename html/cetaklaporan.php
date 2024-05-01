<?php 

require "/xampp/htdocs/SPPD/fpdf/fpdf.php";


class PDF extends FPDF
{
    public $cellHeight = 20;
}
// membuat koneksi ke database
$db = new PDO('mysql:host=localhost;dbname=sppd','root','');

// query untuk mengambil data berdasarkan data yang dipilih
$idlaporan = isset($_GET['idlaporan']) ? $_GET['idlaporan'] : "";
$sql = "SELECT * FROM laporan WHERE idlaporan = '$idlaporan'";
$query = $db->query($sql);

$pdf = new FPDF('P','mm','LEGAL');


$pdf->AddPage();

$pdf->Image('/xampp/htdocs/SPPD/fpdf/gambar.png',15,9,23);
$pdf->SetFont('ARIAL','B',18);
$pdf->Cell(200,10,'PEMERINTAH PROVINSI JAMBI',0,1,'C',);
$pdf->SetFont('ARIAL','B',24);
$pdf->Cell(200,5,'DINAS KEHUTANAN',0,1,'C');
$pdf->SetFont('ARIAL','',9);
$pdf->Cell(200,5,'Jalan Arief Rahman Hakim No 10 Telanaipura, Jambi 36124',0,1,'C');
$pdf->SetFont('ARIAL','',9);
$pdf->Cell(200,3,'Website: www.kehutanan.jambiprov.go.id',0,1,'C');

$pdf->Line(10,34,200,34);

$pdf->SetFont('ARIAL','BU',14);
$pdf->Cell(150,3,'',0,1,'R');
$pdf->Cell(150,3,'',0,1,'R');
$pdf->Cell(200,5,'Laporan Perjalanan Dinas',0,1,'C');


$pdf->SetFont('ARIAL','U',11);
$pdf->Cell(200,10,'',0,1,'C');



// tabel



$no =1;
// $koneksi = mysqli_connect("localhost","root","","sppd");
// $data = mysqli_query($koneksi,"SELECT * FROM laporan where idlaporan") or die(mysqli_error($koneksi));

while($data = $query->fetch(PDO::FETCH_OBJ)){
    // echo"<option value=$data[idlaporan]> $data[idlaporan]</option>";
        // nomor
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(15, 5, "Tujuan", 0, 0, 'L');
    $pdf->Cell(15, 5, ": ", 0, 0, 'C');
    $pdf->Cell(20, 5, "Kepala Dinas Kehutanan ", 0, 1, 'L');

    $pdf->Cell(15, 5, "Dari  ", 0, 0, 'L');
    $pdf->Cell(15, 5, ": ", 0, 0, 'C');
    $pdf->Cell(20, 5, $data->dari, 0, 1, 'L');


    $pdf->Cell(15, 5, "Tanggal", 0, 0, 'L');
    $pdf->Cell(15, 5, ": ", 0, 0, 'C');
    $pdf->Cell(20, 5, date('d M Y', strtotime($data->tanggal)), 0, 1, 'L');

    $pdf->Cell(15, 5, "No Surat", 0, 0, 'L');
    $pdf->Cell(15, 5, ": ", 0, 0, 'C');
    $pdf->Cell(20, 5, $data->nosurat, 0, 1, 'L');

    $pdf->Cell(15, 5, "Perihal ", 0, 0, 'L');
    $pdf->Cell(15, 5, ": ", 0, 0, 'C');
    
    $pdf->MultiCell(160,5,$data->perihal,0,'L');

    $pdf->Line(10,90,200,90);
    
    $pdf->SetFont('Arial','',12);

//    isi laporan
    $pdf->Cell(80,15,'',0,1,'L');
    
    $pdf->MultiCell(190,5,$data->isi,0,'J');

    $pdf->Cell(80,20,'',0,1,'L');
    // ttd
    $pdf->Cell(15,5,' ',0,0,'C');
    $pdf->Cell(80,5,'',0,0,'L');
    $pdf->Cell(30,5,'',0,0,'L');
    $pdf->Cell(30,5,'Dikeluarkan di Jambi',0,1,'L');
    
    $pdf->Cell(15,5,' ',0,0,'C');
    $pdf->Cell(80,5,'',0,0,'L');
    $pdf->Cell(30,5,'',0,0,'L');
    $pdf->Cell(28,5,'pada tanggal,',0,0,'L');
    $pdf->Cell(28,5,date('d M Y', strtotime($data->tanggal)),0,1,'L');
    
    $pdf->Cell(15,5,' ',0,0,'C');
    $pdf->Cell(80,5,'',0,0,'L');
    $pdf->Cell(30,5,'',0,0,'L');
    $pdf->Cell(30,5,'Kepala Dinas,',0,1,'L');

    $pdf->Cell(15,5,' ',0,0,'C');
    $pdf->Cell(80,5,'',0,0,'L');
    $pdf->Cell(30,5,'',0,0,'L');
    $pdf->Cell(30,5,'',0,1,'L');
    $pdf->Cell(15,5,' ',0,0,'C');
    $pdf->Cell(80,5,'',0,0,'L');
    $pdf->Cell(30,5,'',0,0,'L');
    $pdf->Cell(30,5,'',0,1,'L');
    $pdf->Cell(15,5,' ',0,0,'C');
    $pdf->Cell(80,5,'',0,0,'L');
    $pdf->Cell(30,5,'',0,0,'L');
    $pdf->Cell(30,5,'',0,1,'L');
    $pdf->Cell(15,5,' ',0,0,'C');
    $pdf->Cell(80,5,'',0,0,'L');
    $pdf->Cell(30,5,'',0,0,'L');
    $pdf->Cell(30,5,'Akhmad Bestari, S.H.,M.H',0,1,'L');
    $pdf->Cell(15,5,' ',0,0,'C');
    $pdf->Cell(80,5,'',0,0,'L');
    $pdf->Cell(30,5,'',0,0,'L');
    $pdf->Cell(30,5,'Pembina Utama Muda',0,1,'L');
    $pdf->Cell(15,5,' ',0,0,'C');
    $pdf->Cell(80,5,'',0,0,'L');
    $pdf->Cell(30,5,'',0,0,'L');
    $pdf->Cell(30,5,'NIP. 197405081999031004',0,1,'L');
   
    
    // $pdf->Cell(10,7,$d['nosurat'],1,0,'C');
    // $pdf->Cell(95,11,$d['nama'],1,0,'C');
    // $pdf->Cell(10,7,$d['nip'],1,0,'C');
    
    
    // ttd
    
}






$pdf->Output();


?>
