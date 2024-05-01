<?php 

require "/xampp/htdocs/SPPD/fpdf/fpdf.php";


class PDF extends FPDF
{
    public $cellHeight = 20;
}
// membuat koneksi ke database
$db = new PDO('mysql:host=localhost;dbname=sppd','root','');

// query untuk mengambil data berdasarkan data yang dipilih
$idsppd = isset($_GET['idsppd']) ? $_GET['idsppd'] : "";
$sql = "SELECT * FROM listsppd WHERE idsppd = '$idsppd'";
$query = $db->query($sql);
// coba

$multiCellHeight = 6;
$width = 95;
$height = 15;

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

$pdf->SetFont('ARIAL','',9);
$pdf->Cell(150,3,'',0,1,'R');
$pdf->Cell(150,5,'Lembar Ke :',0,1,'R');
$pdf->Cell(150,5,'Kode No   :',0,1,'R',);
$pdf->Cell(150,5,'Nomor     :',0,1,'R');

$pdf->SetFont('ARIAL','U',11);
$pdf->Cell(200,10,'',0,1,'C');



// tabel



$no =1;
// $koneksi = mysqli_connect("localhost","root","","sppd");
// $data = mysqli_query($koneksi,"SELECT * FROM listsppd where idsppd") or die(mysqli_error($koneksi));

while($data = $query->fetch(PDO::FETCH_OBJ)){
    // echo"<option value=$data[idsppd]> $data[idsppd]</option>";
        // nomor
    $pdf->SetFont('Arial','U',14);
    $pdf->Cell(0, 5, "SURAT PERINTAH PERJALANAN DINAS", 0, 1, 'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0, 5,'${nomor_surat}', 0, 1, 'C');
    
    $pdf->Cell(15,5,' ',0,1,'C');

    $pdf->SetFont('ARIAL','',11);
    $pdf->Cell(15,9,'1. ',1,0,'C');
    $pdf->Cell(80,9,'Pejabat Yang Memberi Perintah',1,0,'L');
    $pdf->Cell(95,9,'Kepala Dinas Kehutanan Provinsi Jambi',1,1,'L');
    $pdf->Cell(15,9,'2. ',1,0,'C');
    $pdf->Cell(80,9,'Nama Pegawai yang diperintah',1,0,'L');
    $pdf->Cell(95,9,$data->nama,1,1,'L');
    $pdf->Cell(15,27,'3. ',1,0,'C');
    // $pdf->MultiCell(80,11,"a. Pangkat dan Golongan Menurut PP No.6 Tahun 1997",1,0,'L');
   
    $pdf->Cell(80,9,'a. Pangkat dan Golongan ','LR',0,'L');
    $pdf->MultiCell(95,9,$data->pangkat,1,'L');
    $pdf->Cell(15,20,' ',0,0,'C');
    $pdf->Cell(80,9,'b. Jabatan ','LR',0,'L');
    $pdf->MultiCell(95,9,$data->jabatan,1,'L');
    $pdf->Cell(15,20,' ',0,0,'C');
    $pdf->Cell(80,9,'c. Tingkat menurut peraturan Perjalanan ','LR',0,'L');
    $pdf->MultiCell(95,9,$data->tingkatgolongan,1,'L');

    $pdf->SetLeftMargin(10);
    $pdf->SetX(10);
    

    // uji coba
    $pdf->Cell(15,20,'4. ',1,0,'C');
    $pdf->Cell(80,20,'Maksud Perjalanan Dinas ',1,0,'L');
    $pdf->MultiCell(95,4,$data->dalamrangka,1,'L',false);
   
    $pdf->Cell(15,9,'5. ',1,0,'C');
    $pdf->Cell(80,9,'Alat Angkut yang dipergunakan ',1,0,'L');
    $pdf->MultiCell(95,9,$data->kendaraan,1,'L');

    $pdf->Cell(15,18,'6. ',1,0,'C');
    $pdf->Cell(80,9,'a. Tempat Berangkat ',0,0,'L');
    $pdf->MultiCell(95,9,$data->tempatasal,1,'L');
    $pdf->Cell(15,9,'',0,0,'C');
    $pdf->Cell(80,9,'b. Tempat Tujuan ',0,0,'L');
    $pdf->MultiCell(95,9,$data->tujuanpelaksanaan,1,'L');

    $pdf->Cell(15,27,'7. ',1,0,'C');
    $pdf->Cell(80,9,'a. Lamanya Perjalanan Dinas ','T',0,'L');
    $pdf->MultiCell(95,9,$data->totalpelaksanaan,1,'L');
    $pdf->Cell(15,9,'',0,0,'C');
    $pdf->Cell(80,9,'b. Tanggal Berangkat ',0,0,'L');
    $pdf->MultiCell(95,9,date('d M Y', strtotime($data->tgglpelaksana)),1,'L');
    $pdf->Cell(15,9,'',0,0,'C');
    $pdf->Cell(80,9,'c. Tanggal Kembali ',0,0,'L');
    $pdf->MultiCell(95,9,date('d M Y', strtotime($data->tanggalkembali)),1,'L');

    $pdf->Cell(15,9,'8. ',1,0,'C');
    $pdf->Cell(80,9,'Pengikut ',1,0,'L');
    $pdf->MultiCell(95,9,'-',1,'L');

    $pdf->SetFont('ARIAL', '', 11);
    $pdf->Cell(15,2,'9. ',1,0,'C');
    $pdf->Cell(80,2,'Pembebanan Anggaran ',0,0,'L');
    $pdf->MultiCell(95,6,"DPA Dinas Kehutanan Provinsi Jambi Sub. Kegiatan " . $data->subkegiatan,1,'L');
    $pdf->MultiCell(...$multiCellParams);
    
    $pdf->SetFont('ARIAL', '', 11);
    $pdf->Cell(15,9,' ',1,0,'C');
    $pdf->Cell(80,9,'a. Instansi ',1,0,'L');
    $pdf->MultiCell(95,9,$data->instansi,1,'L');
    $pdf->Cell(15,9,' ',1,0,'C');
    $pdf->Cell(80,9,'b. Mata anggaran ',1,0,'L');
    $pdf->MultiCell(95,9,$data->norek,1,'L');

    $pdf->Cell(15,9,'10. ',1,0,'C');
    $pdf->Cell(80,9,'Keterangan Lain-lain ',1,0,'L');
    $pdf->MultiCell(95,9,'-',1,'L');

    $pdf->Cell(15,9,' ',0,0,'C');
    $pdf->Cell(80,9,'',0,0,'L');
    $pdf->MultiCell(95,9,'',0,'L');

    // ttd
    $pdf->Cell(15,5,' ',0,0,'C');
    $pdf->Cell(80,5,'',0,0,'L');
    $pdf->Cell(30,5,'',0,0,'L');
    $pdf->Cell(30,5,'Dikeluarkan di Jambi',0,1,'L');
    
    $pdf->Cell(15,5,' ',0,0,'C');
    $pdf->Cell(80,5,'',0,0,'L');
    $pdf->Cell(30,5,'',0,0,'L');
    $pdf->Cell(28,5,'pada tanggal,',0,0,'L');
    $pdf->Cell(28,5, '${tanggal_naskah}',0,1,'L');
    
    $pdf->Cell(15,5,' ',0,0,'C');
    $pdf->Cell(80,5,'',0,0,'L');
    $pdf->Cell(30,5,'',0,0,'L');
    $pdf->Cell(30,5,'${nama_jabatan}',0,1,'L');

    $pdf->Cell(15,5,' ',0,0,'C');
    $pdf->Cell(80,5,'',0,0,'L');
    $pdf->Cell(30,5,'',0,0,'L');
    $pdf->Cell(30,5,'{ttd_pengirim} ',0,1,'L');
    $pdf->Cell(15,5,'',0,0,'C');
    $pdf->Cell(80,5,'',0,0,'L');
    $pdf->Cell(30,5,'',0,0,'L');
    $pdf->Cell(30,5,'${nama_pengirim}',0,1,'L');
    $pdf->Cell(15,5,' ',0,0,'C');
    $pdf->Cell(80,5,'',0,0,'L');
    $pdf->Cell(30,5,'',0,0,'L');
    $pdf->Cell(30,5,'Pembina Utama Muda',0,1,'L');
    $pdf->Cell(15,5,' ',0,0,'C');
    $pdf->Cell(80,5,'',0,0,'L');
    $pdf->Cell(30,5,'',0,0,'L');
    $pdf->Cell(30,5,'NIP. ${nip_pengirim}',0,1,'L');
   
    
    // $pdf->Cell(10,7,$d['nosurat'],1,0,'C');
    // $pdf->Cell(95,11,$d['nama'],1,0,'C');
    // $pdf->Cell(10,7,$d['nip'],1,0,'C');
    $pdf->AddPage();
    
   
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(95, 10,'', 'LT', 0, 'C');
    $pdf->Cell(95, 10,'', 'RT', 1, 'C');

    $pdf->Cell(95, 5,'', 'L', 0, 'C');
    $pdf->Cell(32, 5,'SPPD No', '', 0, 'L');
    $pdf->Cell(2, 5,':', '', 0, 'L');
    $pdf->Cell(61, 5,'${nomor_surat}', 'R', 1, 'L');

    $pdf->Cell(95, 5,'', 'L', 0, 'C');
    $pdf->Cell(32, 5,'Berangkat Dari', '', 0, 'L');
    $pdf->Cell(2, 5,':', '', 0, 'L');
    $pdf->Cell(61, 5,$data->tempatasal, 'R', 1, 'L');

    $pdf->Cell(95, 5,'', 'L', 0, 'C');
    $pdf->Cell(32, 5,'Tanggal', '', 0, 'L');
    $pdf->Cell(2, 5,':', '', 0, 'L');
    $pdf->Cell(61, 5,'${tanggal_naskah}', 'R', 1, 'L');
    
    $pdf->Cell(95, 5,'', 'L', 0, 'C');
    $pdf->Cell(32, 5,'Tujuan', '', 0, 'L');
    $pdf->Cell(2, 5,':', '', 0, 'L');
    $pdf->Cell(61, 5,$data->tujuanpelaksanaan, 'R', 1, 'L');
    
    $pdf->Cell(95, 8,'', 'L', 0, 'C');
    $pdf->Cell(32, 8,'', '', 0, 'L');
    $pdf->Cell(2, 8,'', '', 0, 'L');
    $pdf->Cell(61, 8,'', 'R', 1, 'L');

    $pdf->Cell(95, 5,'', 'L', 0, 'C');
    $pdf->Cell(95, 5,'Pejabat Pelaksana Teknis', 'R', 1, 'L');

    $pdf->Cell(95, 8,'', 'L', 0, 'C');
    $pdf->Cell(32, 8,'', '', 0, 'L');
    $pdf->Cell(2, 8,'', '', 0, 'L');
    $pdf->Cell(61, 8,'', 'R', 1, 'L');

    $pdf->Cell(95, 8,'', 'L', 0, 'C');
    $pdf->Cell(32, 8,'', '', 0, 'L');
    $pdf->Cell(2, 8,'', '', 0, 'L');
    $pdf->Cell(61, 8,'', 'R', 1, 'L');

    $pdf->Cell(95, 5,'', 'L', 0, 'C');
    $pdf->Cell(95, 5,$data->pptk, 'R', 1, 'L');
    
    $pdf->Cell(95, 5,'', 'L', 0, 'C');
    $pdf->Cell(95, 5,$data->pangkatpptk, 'R', 1, 'L');

    $pdf->Cell(95, 5,'', 'L', 0, 'C');
    $pdf->Cell(4, 5,'NIP', '', 0, 'L');
    $pdf->Cell(3, 5,'','',0, 'L');
    $pdf->Cell(88, 5,$data->nippptk, 'R', 1, 'L');

    $pdf->Cell(95, 7,'', 'LB', 0, 'C');
    $pdf->Cell(4, 7,'', 'B', 0, 'L');
    $pdf->Cell(3, 7,'','B',0, 'L');
    $pdf->Cell(88, 7,'', 'BR', 1, 'L');

    

    //bagian 1
    $pdf->SetFont('ARIAL','',10);
    $pdf->Cell(10,5,'II. ','LT',0,'C');
    $pdf->Cell(85,5,'Tiba di',0,0,'L');
    $pdf->Cell(95,5,'Berangkat Dari','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'Pada Tanggal',0,0,'L');
    $pdf->Cell(95,5,'Ke','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'LB');
    $pdf->Cell(95,5,'Pada Tanggal','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'C');
    $pdf->Cell(95,5,'','R',1,'C');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'L');
    $pdf->Cell(95,5,'','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'L');
    $pdf->Cell(95,5,'','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'C');
    $pdf->Cell(95,5,'','R',1,'C');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'','B',0,'C');
    $pdf->Cell(95,5,'','RB',1,'C');

    //bagian 2
    $pdf->SetFont('ARIAL','',10);
    $pdf->Cell(10,5,'III. ','LT',0,'C');
    $pdf->Cell(85,5,'Tiba di',0,0,'L');
    $pdf->Cell(95,5,'Berangkat Dari','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'Pada Tanggal',0,0,'L');
    $pdf->Cell(95,5,'Ke','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'LB');
    $pdf->Cell(95,5,'Pada Tanggal','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'C');
    $pdf->Cell(95,5,'','R',1,'C');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'L');
    $pdf->Cell(95,5,'','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'L');
    $pdf->Cell(95,5,'','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'C');
    $pdf->Cell(95,5,'','R',1,'C');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'','B',0,'C');
    $pdf->Cell(95,5,'','RB',1,'C');

    //bagian 3
    $pdf->SetFont('ARIAL','',10);
    $pdf->Cell(10,5,'IV. ','LT',0,'C');
    $pdf->Cell(85,5,'Tiba di',0,0,'L');
    $pdf->Cell(95,5,'Berangkat Dari','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'Pada Tanggal',0,0,'L');
    $pdf->Cell(95,5,'Ke','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'LB');
    $pdf->Cell(95,5,'Pada Tanggal','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'C'); //mau nambah jabatn
    $pdf->Cell(95,5,'','R',1,'C');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'L');
    $pdf->Cell(95,5,'','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'L');
    $pdf->Cell(95,5,'','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'C'); //mau nambah nama
    $pdf->Cell(95,5,'','R',1,'C');//mau nambah nama
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'','B',0,'C'); //mau nambah nip
    $pdf->Cell(95,5,'','RB',1,'C');//mau nambah nip


    //bagian 4
    $pdf->SetFont('ARIAL','',10);
    $pdf->Cell(10,5,'V. ','LT',0,'C');
    $pdf->Cell(85,5,'Tiba di',0,0,'L');
    $pdf->Cell(95,5,'Telah diperiksa, dengan keterangan bahwa perjalanan','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'Pada Tanggal',0,0,'L');
    $pdf->Cell(95,5,'tersebut di atas benar-benar dilakukan atas perintahnya dan','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'LB');
    $pdf->Cell(95,5,'semata-mata untuk kepentingan jabatan dalam waktu yang','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'C');
    $pdf->Cell(95,5,'sesingkat-singkatnya.','R',1,'L');
    
    $pdf->Cell(10,7,'','L',0,'C');
    $pdf->Cell(85,7,'',0,0,'R');
    $pdf->Cell(95,7,'','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'R'); //jika mau pakai mewakili
    $pdf->Cell(95,5,'Kepala Dinas,','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'L');
    $pdf->Cell(95,5,'','R',1,'L'); //jika mau pakai mewakili
    $pdf->Cell(10,9,'','L',0,'C');
    $pdf->Cell(85,9,'',0,0,'L');
    $pdf->Cell(95,9,'','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'L');
    $pdf->Cell(95,5,'','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'C');
    $pdf->Cell(85,5,'',0,0,'C');
    $pdf->Cell(95,5,'Akhmad Bestari,S.H.,M.H','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'R');
    $pdf->Cell(85,5,'','',0,'C');
    $pdf->Cell(95,5,'Pembina Utama Muda','R',1,'L');
    $pdf->Cell(10,5,'','L',0,'R');
    $pdf->Cell(85,5,'','',0,'C');
    $pdf->Cell(95,5,'NIP. 197405081999031004','R',1,'L');

    $pdf->Cell(10,7,'','LB',0,'R');
    $pdf->Cell(85,7,'','B',0,'C');
    $pdf->Cell(95,7,'','RB',1,'L');


    //bagian 5
    $pdf->SetFont('ARIAL','',10);
    $pdf->Cell(10,7,'VI. ','LB',0,'C');
    $pdf->Cell(85,7,'Catatan Lain-Lain','B',0,'L');
    $pdf->Cell(95,7,'','RB',1,'L');
    
    // Penutup
    $pdf->SetFont('ARIAL','',10);
    $pdf->Cell(10,30,' ','LB',0,'C');
    $pdf->Cell(85,30,'','B',0,'L');
    $pdf->Cell(95,30,'','RB',1,'L');
    
    // ttd
    
}






$pdf->Output();


?>
