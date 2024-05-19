<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once "koneksi.php";

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\SimpleType\JcTable;
use PhpOffice\PhpWord\Style\Paper;
use PhpOffice\PhpWord\Style\Table;

    function generateWordDoc($data) {

        $phpWord = new PhpWord();
        $phpWord->setDefaultFontName('Arial');
        $phpWord->setDefaultFontSize(9);
        $section = $phpWord->addSection([
            'marginTop' => 720, // 2 inch
            'marginBottom' => 720, // 2 inch
            'marginLeft' => 720, // 2 inch
            'marginRight' => 720, // 2 inch
        ]);

        // Define table style
        $tableStyle = [
            'borderColor' => '000000',
            'borderSize' => 6,
            'cellMargin' => 50,
        ];
        $phpWord->addTableStyle('Detail Table', $tableStyle);

        $table = $section->addTable('Detail Table');

        $table->addRow();
        $cell = $table->addCell(12000);
        $nestedTable = $cell->addTable();
        $nestedTable->addRow();
        $nestedCell1 = $nestedTable->addCell(6000, ['borderSize' => 0, 'borderColor' => 'FFFFFF']);
        $nestedCell2 = $nestedTable->addCell(6000, ['borderSize' => 0, 'borderColor' => 'FFFFFF']);

        $nestedTable2 = $nestedCell2->addTable();
        $nestedTable2->addRow();

        $cell1NestedTable2 = $nestedTable2->addCell(2000, ['borderSize' => 0, 'borderColor' => 'FFFFFF']);
        $cell2NestedTable2 = $nestedTable2->addCell(3000, ['borderSize' => 0, 'borderColor' => 'FFFFFF']);

        $textRunLeft = $cell1NestedTable2->addTextRun();
        $textRunRight = $cell2NestedTable2->addTextRun();

        $textRunLeft->addTextBreak();
        $textRunLeft->addText('Berangkat dari');
        $textRunLeft->addTextBreak();
        $textRunLeft->addText('Tanggal');
        $textRunLeft->addTextBreak();
        $textRunLeft->addText('Tujuan');
        $textRunLeft->addTextBreak(3);
        $textRunLeft->addText('Jabatan');
        $textRunLeft->addTextBreak(3);
        $textRunLeft->addText('Nama');
        $textRunLeft->addTextBreak();
        $textRunLeft->addText('nip');

        $textRunRight->addTextBreak();
        $textRunRight->addText(': '.$data['tempatasal']);
        $textRunRight->addTextBreak();
        $textRunRight->addText(': '.tgl_indo($data['tanggal']));
        $textRunRight->addTextBreak();
        $textRunRight->addText(': '.$data['tujuanpelaksanaan']);

        //bagian 2
        templateDoc($table, 'II.', $data);
        templateDoc($table, 'III.', $data);
        templateDoc($table, 'IV.', $data);

        //bagian 3
        $table->addRow();
        $cell = $table->addCell(12000);
        $nestedTable = $cell->addTable();
        $nestedTable->addRow();

        $nestedCell = $nestedTable->addCell(700, ['borderSize' => 0, 'borderColor' => 'FFFFFF']);
        $nestedTable = $nestedCell->addTable();
        $nestedTable->addRow();

        $cellNestedTable2 = $nestedTable->addCell(700, ['borderSize' => 0, 'borderColor' => 'FFFFFF']);

        $textRun = $cellNestedTable2->addTextRun();

        $textRun->addText('V.');

        $nestedCell1 = $nestedTable->addCell(6000, ['borderSize' => 0, 'borderColor' => 'FFFFFF']);
        $nestedTable1 = $nestedCell1->addTable();
        $nestedTable1->addRow();

        $cell1NestedTable2 = $nestedTable1->addCell(2000, ['borderSize' => 0, 'borderColor' => 'FFFFFF']);
        $cell2NestedTable2 = $nestedTable1->addCell(3000, ['borderSize' => 0, 'borderColor' => 'FFFFFF']);

        $textRunLeft = $cell1NestedTable2->addTextRun();
        $textRunRight = $cell2NestedTable2->addTextRun();

        $textRunLeft->addText('Tiba di');
        $textRunLeft->addTextBreak();
        $textRunLeft->addText('Pada Tanggal');
        $textRunLeft->addTextBreak(2);
        $textRunLeft->addText('Jabatan');
        $textRunLeft->addTextBreak(3);
        $textRunLeft->addText('Nama');
        $textRunLeft->addTextBreak();
        $textRunLeft->addText('nip');

        $textRunRight->addText(': '.$data['tempatasal']);
        $textRunRight->addTextBreak();
        $textRunRight->addText(': '.tgl_indo($data['tanggalkembali']));


        $nestedCell2 = $nestedTable->addCell(6800, ['borderSize' => 0, 'borderColor' => 'FFFFFF']);

        $nestedTable2 = $nestedCell2->addTable();
        $nestedTable2->addRow();

        $cellNestedTable2 = $nestedTable2->addCell(6000, ['borderSize' => 0, 'borderColor' => 'FFFFFF']);

        $textRun = $cellNestedTable2->addTextRun();

        $textRun->addText('Telah diperiksa, dengan keterangan bahwa perjalanan tersebut di atas benar-benar dilakukan atas perintahnya dan semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat-singkatnya');

        //bagian 4
        $table->addRow();
        $cell = $table->addCell(12000);
        $nestedTable = $cell->addTable();
        $nestedTable->addRow();

        $nestedCell = $nestedTable->addCell(700);

        $textRun = $nestedCell->addTextRun();

        $textRun->addText('VI.');

        $nestedCell = $nestedTable->addCell(11300);

        $textRun = $nestedCell->addTextRun();

        $textRun->addText('CATATAN LAIN-LAIN');

        //bagian 5
        $table->addRow();
        $cell = $table->addCell(12000);
        $nestedTable = $cell->addTable();
        $nestedTable->addRow();

        $nestedCell = $nestedTable->addCell(700);

        $textRun = $nestedCell->addTextRun();

        $textRun->addText('VII.');

        $nestedCell = $nestedTable->addCell(11300);

        $textRun = $nestedCell->addTextRun();

        $textRun->addText('PERHATIAN :');
        $textRun->addTextBreak();
        $textRun->addText('PPK yang menerbitkan SPD, pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat/tiba, serta bendahara pengeluaran bertanggung jawab berdasarkan peraturan-peraturan keuangan Negara apabila negara menderita rugi akibat kesalahan, kelalaian, dan kealpaannya.');

        $section->addTextBreak(1);
        $section->addText("Pejabat Pembuat Komitmen", null, ['alignment' => 'right']);
        $section->addTextBreak(3);
        $section->addText($data['pptk'], null, ['alignment' => 'right']);
        $section->addText('NIP '.$data['nippptk'], null, ['alignment' => 'right']);

        //halaman 2
        $section2 = $phpWord->addSection([
            'marginTop' => 720, // 2 inch
            'marginBottom' => 720, // 2 inch
            'marginLeft' => 720, // 2 inch
            'marginRight' => 720, // 2 inch
        ]);

        $table = $section2->addTable(); // Tambahkan tabel untuk menyusun gambar dan teks dalam satu baris
        $table->addRow(); // Tambahkan baris pertama

        // Tambahkan gambar di kolom pertama
        $cell = $table->addCell(2000); // Tentukan lebar kolom gambar
        $cell->addImage('../assets/img/logo.png', ['width' => 50, 'height' => 50]); // Tambahkan gambar

        // Tambahkan teks di kolom kedua
        $cell = $table->addCell(); // Kolom kedua akan mengisi sisa lebar
        $headerText1 = $cell->addTextRun(['alignment' => 'center']);
        $headerText1->addText('PEMERINTAH PROVINSI JAMBI', ['bold' => true, 'size' => 10.5]);
        $headerText1->addTextBreak(); // Menambahkan jeda baris
        $headerText1->addText('DINAS KEHUTANAN', ['bold' => true, 'size' => 18]);
        $headerText1->addTextBreak(); // Menambahkan jeda baris
        $headerText1->addText('Alamat: Jl. Arief Rahman Hakim No. 10 Telanaipura, website: kehutanan.jambiprov.go.id', ['bold' => true, 'size' => 7.5]);
        $headerText1->setLineSpacing(1);

        // Tambahkan garis di bawah header
        $lineStyle = ['weight' => 2, 'width' => 520, 'height' => 0, 'color' => '000000'];
        $section2->addLine($lineStyle);

        $table = $section2->addTable();
        $table->addRow();
        $cell = $table->addCell();
        $textRun = $cell->addTextRun();
        $textRun->addText('Lembar ke', ['size' => 8]);
        $textRun->addTextBreak();
        $textRun->addText('Kode No.', ['size' => 8]);
        $textRun->addTextBreak();
        $textRun->addText('Nomor', ['size' => 8]);

        $cell2 = $table->addCell();
        $textRun = $cell2->addTextRun();
        $textRun->addText(': ');
        $textRun->addTextBreak();
        $textRun->addText(': ');
        $textRun->addTextBreak();
        $textRun->addText(': '.$data['nosurat']);


        // Tambahkan judul
        $section2->addText('SURAT PERJALANAN DINAS (SPD)', ['size' => 11], ['alignment' => 'center', 'underline' => 'single']);

        $table = $section2->addTable('Detail Table');

        $table->addRow();
        $cell1 = $table->addCell(700);
        $textRun1 = $cell1->addTextRun(['alignment' => 'center']);
        $textRun1->addText('1.', null, ['spaceAfter' => 0]);

        $cell2 = $table->addCell(6000);
        $textRun2 = $cell2->addTextRun();
        $textRun2->addText('Pejabat Pembuat Komitmen');

        $cell3 = $table->addCell(6000);
        $textRun3 = $cell3->addTextRun();
        $textRun3->addText($data['subkegiatan']);

        //row 2
        $table->addRow();
        $cell1 = $table->addCell(700);
        $textRun1 = $cell1->addTextRun(['alignment' => 'center']);
        $textRun1->addText('2.');

        $cell2 = $table->addCell(6000);
        $textRun2 = $cell2->addTextRun();
        $textRun2->addText('Nama Pegawai yang diperintah');

        $cell3 = $table->addCell(6000);
        $textRun3 = $cell3->addTextRun();
        $textRun3->addText($data['nama'].' / '.$data['nip']);

        //row3
        $table->addRow();
        $cell1 = $table->addCell(700, ['vMerge' => 'restart']);
        $textRun1 = $cell1->addTextRun(['alignment' => 'center']);
        $textRun1->addText('3.');

        $cell2 = $table->addCell(6000);
        $textRun2 = $cell2->addTextRun();
        $textRun2->addText('a. Pangkat dan Golongan menurut PP No. 6 Tahun 1997', ['size' => 8]);

        $cell3 = $table->addCell(6000);
        $textRun3 = $cell3->addTextRun();
        $textRun3->addText('a. '.$data['pangkat'].' / '.$data['golongan']);

        //baris2
        $table->addRow();
        $cell1 = $table->addCell(700, ['vMerge' => 'continue']);

        $cell2 = $table->addCell(6000);
        $textRun2 = $cell2->addTextRun();
        $textRun2->addText('b. Jabatan');

        $cell3 = $table->addCell(6000);
        $textRun3 = $cell3->addTextRun();
        $textRun3->addText('b. '.$data['jabatan'], ['size' => 8]);

        //baris 3
        $table->addRow();
        $cell1 = $table->addCell(700, ['vMerge' => 'continue']);

        $cell2 = $table->addCell(6000);
        $textRun2 = $cell2->addTextRun();
        $textRun2->addText('c. '.$data['tingkatgolongan']);

        $cell3 = $table->addCell(6000);
        $textRun3 = $cell3->addTextRun();
        $textRun3->addText('c. C');

        //row 4
        $table->addRow();
        $cell1 = $table->addCell(700);
        $textRun1 = $cell1->addTextRun(['alignment' => 'center']);
        $textRun1->addText('4.');

        $cell2 = $table->addCell(6000);
        $textRun2 = $cell2->addTextRun();
        $textRun2->addText('Maksud Perjalanan Dinas');

        $cell3 = $table->addCell(6000);
        $textRun3 = $cell3->addTextRun();
        $textRun3->addText($data['dalamrangka'], ['size' => 8]);

        //row 5
        $table->addRow();
        $cell1 = $table->addCell(700);
        $textRun1 = $cell1->addTextRun(['alignment' => 'center']);
        $textRun1->addText('5.');

        $cell2 = $table->addCell(6000);
        $textRun2 = $cell2->addTextRun();
        $textRun2->addText('Alat angkut yang dipergunakan');

        $cell3 = $table->addCell(6000);
        $textRun3 = $cell3->addTextRun();
        $textRun3->addText($data['kendaraan']);

        //row 6
        $table->addRow();
        $cell1 = $table->addCell(700);
        $textRun1 = $cell1->addTextRun(['alignment' => 'center']);
        $textRun1->addText('6.');

        $cell2 = $table->addCell(6000);
        $textRun2 = $cell2->addTextRun();
        $textRun2->addText('a. Tempat berangkat');
        $textRun2->addTextBreak(2);
        $textRun2->addText('b. Tempat tujuan');

        $cell3 = $table->addCell(6000);
        $textRun3 = $cell3->addTextRun();
        $textRun3->addText('a. '.$data['tempatasal']);
        $textRun3->addTextBreak(2);
        $textRun3->addText('b. '.$data['tujuanpelaksanaan'], ['size' => 8]);

        //row 7
        $table->addRow();
        $cell1 = $table->addCell(700);
        $textRun1 = $cell1->addTextRun(['alignment' => 'center']);
        $textRun1->addText('7.');

        $cell2 = $table->addCell(6000);
        $textRun2 = $cell2->addTextRun();
        $textRun2->addText('a. Lamanya Perjalanan Dinas');
        $textRun2->addTextBreak(2);
        $textRun2->addText('b. Tanggal berangkat');
        $textRun2->addTextBreak(2);
        $textRun2->addText('c. Tanggal harus kembali');

        $cell3 = $table->addCell(6000);
        $textRun3 = $cell3->addTextRun();
        $textRun3->addText('a. '.$data['totalpelaksanaan']);
        $textRun3->addTextBreak(2);
        $textRun3->addText('b. '.tgl_indo($data['tgglpelaksana']));
        $textRun3->addTextBreak(2);
        $textRun3->addText('c. '.tgl_indo($data['tanggalkembali']));

        //row 8
        $table->addRow();
        $cell1 = $table->addCell(700);
        $textRun1 = $cell1->addTextRun(['alignment' => 'center']);
        $textRun1->addText('8.');

        $cell2 = $table->addCell(6000);
        $textRun2 = $cell2->addTextRun();
        $textRun2->addText('Pengikut');

        $cell3 = $table->addCell(6000);

        //row 9
        $table->addRow();
        $cell1 = $table->addCell(700, ['vMerge' => 'restart']);
        $textRun1 = $cell1->addTextRun(['alignment' => 'center']);
        $textRun1->addText('3.');

        $cell2 = $table->addCell(6000);
        $textRun2 = $cell2->addTextRun();
        $textRun2->addText('Pembebanan Anggaran');

        $cell3 = $table->addCell(6000);
        $textRun3 = $cell3->addTextRun();
        $textRun3->addText($data['subkegiatan'], ['size' => 8]);

        //baris2
        $table->addRow();
        $cell1 = $table->addCell(700, ['vMerge' => 'continue']);

        $cell2 = $table->addCell(6000);
        $textRun2 = $cell2->addTextRun();
        $textRun2->addText('a. Instansi');

        $cell3 = $table->addCell(6000);
        $textRun3 = $cell3->addTextRun();
        $textRun3->addText('a. '.$data['instansi']);

        //baris 3
        $table->addRow();
        $cell1 = $table->addCell(700, ['vMerge' => 'continue']);

        $cell2 = $table->addCell(6000);
        $textRun2 = $cell2->addTextRun();
        $textRun2->addText('b. Mata Anggaran');

        $cell3 = $table->addCell(6000);
        $textRun3 = $cell3->addTextRun();
        $textRun3->addText('b. '.$data['norek']);


        //row 10
        $table->addRow();
        $cell1 = $table->addCell(700);
        $textRun1 = $cell1->addTextRun(['alignment' => 'center']);
        $textRun1->addText('10.');

        $cell2 = $table->addCell(6000);
        $textRun2 = $cell2->addTextRun();
        $textRun2->addText('Keterangan Lain Lain');

        $cell3 = $table->addCell(6000);


        $section2->addTextBreak();
        $section2->addText("Dikeluarkan di ".$data['tempatasal'], null, ['alignment' => 'right']);
        $section2->addText('pada tanggal '.tgl_indo($data['tanggal']), null, ['alignment' => 'right']);
        $section2->addTextBreak();
        $section2->addText("Pejabat Pembuat Komitmen", null, ['alignment' => 'right']);
        $section2->addTextBreak(3);
        $section2->addText($data['pptk'], null, ['alignment' => 'right']);
        $section2->addText('NIP '.$data['nippptk'], null, ['alignment' => 'right']);


    // Save file
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Disposition: attachment;filename="SPD.docx"');
    header('Cache-Control: max-age=0');

    $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save('php://output');
}

function templateDoc($table, $no, $data)
{
    $table->addRow();
    $cell = $table->addCell(12000);
    $nestedTable = $cell->addTable();
    $nestedTable->addRow();

    $nestedCell = $nestedTable->addCell(700, ['borderSize' => 0, 'borderColor' => 'FFFFFF']);
    $nestedTable = $nestedCell->addTable();
    $nestedTable->addRow();

    $cellNestedTable2 = $nestedTable->addCell(700, ['borderSize' => 0, 'borderColor' => 'FFFFFF']);

    $textRun = $cellNestedTable2->addTextRun();

    $textRun->addText($no);

    $nestedCell1 = $nestedTable->addCell(6000, ['borderSize' => 0, 'borderColor' => 'FFFFFF']);
    $nestedTable1 = $nestedCell1->addTable();
    $nestedTable1->addRow();

    $cell1NestedTable2 = $nestedTable1->addCell(2000, ['borderSize' => 0, 'borderColor' => 'FFFFFF']);
    $cell2NestedTable2 = $nestedTable1->addCell(3000, ['borderSize' => 0, 'borderColor' => 'FFFFFF']);

    $textRunLeft = $cell1NestedTable2->addTextRun();
    $textRunRight = $cell2NestedTable2->addTextRun();

    $textRunLeft->addText('Tiba di');
    $textRunLeft->addTextBreak();
    $textRunLeft->addText('Pada Tanggal');
    $textRunLeft->addTextBreak(2);
    $textRunLeft->addText('Jabatan');
    $textRunLeft->addTextBreak(3);
    $textRunLeft->addText('Nama');
    $textRunLeft->addTextBreak();
    $textRunLeft->addText('nip');

    $textRunRight->addText(': '.$data['tempatasal']);
    $textRunRight->addTextBreak();
    $textRunRight->addText(': '.tgl_indo($data['tanggalkembali']));


    $nestedCell2 = $nestedTable->addCell(6800, ['borderSize' => 0, 'borderColor' => 'FFFFFF']);

    $nestedTable2 = $nestedCell2->addTable();
    $nestedTable2->addRow();

    $cell1NestedTable2 = $nestedTable2->addCell(2000, ['borderSize' => 0, 'borderColor' => 'FFFFFF']);
    $cell2NestedTable2 = $nestedTable2->addCell(3000, ['borderSize' => 0, 'borderColor' => 'FFFFFF']);

    $textRunLeft = $cell1NestedTable2->addTextRun();
    $textRunRight = $cell2NestedTable2->addTextRun();

    $textRunLeft->addText('Berangkat dari');
    $textRunLeft->addTextBreak();
    $textRunLeft->addText('Ke');
    $textRunLeft->addTextBreak();
    $textRunLeft->addText('Pada Tanggal');
    $textRunLeft->addTextBreak();
    $textRunLeft->addText('Jabatan');
    $textRunLeft->addTextBreak(3);
    $textRunLeft->addText('Nama');
    $textRunLeft->addTextBreak();
    $textRunLeft->addText('nip');

    $textRunRight->addText(': '.$data['tempatasal']);
    $textRunRight->addTextBreak();
    $textRunRight->addText(': '.$data['tujuanpelaksanaan']);
    $textRunRight->addTextBreak();
    $textRunRight->addText(': '.tgl_indo($data['tgglpelaksana']));
}


$id = $_GET['idsppd'];
if ($id) {
    $result = $koneksi->query("SELECT * FROM listsppd WHERE idsppd = $id");
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        generateWordDoc($data);
    } else {
        echo 'data tidak ditemukan.';
    }
} else {
    echo 'id tidak valid.';
}

function tgl_indo($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}