<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once "koneksi.php";

if ($_GET['idkwitansi']) {
    $idkwitansi = $_GET['idkwitansi'];

    $sql = "SELECT * FROM kwitansi as k
            LEFT JOIN listsppd as l ON k.nosppd = l.nosurat WHERE k.idkwitansi = '$idkwitansi'";

    $result = mysqli_query($koneksi,$sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [210, 350]]);

        $transport = '';
        $jumlah = 0;

        if ($row['transport'] == 'umum') {
            if ($row['tp1'] != '') {
                $transport .= '
                    <tr>
                        <td></td>
                        <td><div class="stl_01" style="margin-left:31.0758em;top:53.0394em;"><span class="stl_14 stl_11 stl_54" style="word-spacing:-0.001em;">'.$row['tp1'].' '.$row['kettp1'].' &nbsp;</span></div>
                        </td>
                        <td><div class="stl_01" style="margin-left:28.2458em;top:53.1494em;"><span class="stl_14 stl_11 stl_58">'.formatNumber($row['satuan1']).' &nbsp;</span></div>
                        </td>
                        <td><div class="stl_01" style="margin-left:9.8817em;top:53.1494em;"><span class="stl_14 stl_11 stl_54" style="word-spacing:-0.001em;">'.$row['kettp1'].' &nbsp;</span></div>
                        </td>
                    </tr>
                ';
                $jumlah += $row['satuan1'];
            }
            if ($row['tp2'] != '') {
                $transport .= '
                    <tr>
                        <td></td>
                        <td><div class="stl_01" style="margin-left:31.0758em;top:53.0394em;"><span class="stl_14 stl_11 stl_54" style="word-spacing:-0.001em;">'.$row['tp2'].' '.$row['kettp2'].' &nbsp;</span></div>
                        </td>
                        <td><div class="stl_01" style="margin-left:28.2458em;top:53.1494em;"><span class="stl_14 stl_11 stl_58">'.formatNumber($row['satuan2']).' &nbsp;</span></div>
                        </td>
                        <td><div class="stl_01" style="margin-left:9.8817em;top:53.1494em;"><span class="stl_14 stl_11 stl_54" style="word-spacing:-0.001em;">'.$row['kettp2'].' &nbsp;</span></div>
                        </td>
                    </tr>
                ';
                $jumlah += $row['satuan2'];
            }
            if ($row['tp3'] != '') {
                $transport .= '
                    <tr>
                        <td></td>
                        <td><div class="stl_01" style="margin-left:31.0758em;top:53.0394em;"><span class="stl_14 stl_11 stl_54" style="word-spacing:-0.001em;">'.$row['tp3'].' '.$row['kettp3'].' &nbsp;</span></div>
                        </td>
                        <td><div class="stl_01" style="margin-left:28.2458em;top:53.1494em;"><span class="stl_14 stl_11 stl_58">'.formatNumber($row['satuan3']).' &nbsp;</span></div>
                        </td>
                        <td><div class="stl_01" style="margin-left:9.8817em;top:53.1494em;"><span class="stl_14 stl_11 stl_54" style="word-spacing:-0.001em;">'.$row['kettp3'].' &nbsp;</span></div>
                        </td>
                    </tr>
                ';
                $jumlah += $row['satuan3'];
            }
            if ($row['tp4'] != '') {
                $transport .= '
                    <tr>
                        <td></td>
                        <td><div class="stl_01" style="margin-left:31.0758em;top:53.0394em;"><span class="stl_14 stl_11 stl_54" style="word-spacing:-0.001em;">'.$row['tp4'].' '.$row['kettp4'].' &nbsp;</span></div>
                        </td>
                        <td><div class="stl_01" style="margin-left:28.2458em;top:53.1494em;"><span class="stl_14 stl_11 stl_58">'.formatNumber($row['satuan4']).' &nbsp;</span></div>
                        </td>
                        <td><div class="stl_01" style="margin-left:9.8817em;top:53.1494em;"><span class="stl_14 stl_11 stl_54" style="word-spacing:-0.001em;">'.$row['kettp4'].' &nbsp;</span></div>
                        </td>
                    </tr>
                ';
                $jumlah += $row['satuan4'];
            }
            if ($row['tp5'] != '') {
                $transport .= '
                    <tr>
                        <td></td>
                        <td><div class="stl_01" style="margin-left:31.0758em;top:53.0394em;"><span class="stl_14 stl_11 stl_54" style="word-spacing:-0.001em;">'.$row['tp5'].' '.$row['kettp5'].' &nbsp;</span></div>
                        </td>
                        <td><div class="stl_01" style="margin-left:28.2458em;top:53.1494em;"><span class="stl_14 stl_11 stl_58">'.formatNumber($row['satuan5']).' &nbsp;</span></div>
                        </td>
                        <td><div class="stl_01" style="margin-left:9.8817em;top:53.1494em;"><span class="stl_14 stl_11 stl_54" style="word-spacing:-0.001em;">'.$row['kettp5'].' &nbsp;</span></div>
                        </td>
                    </tr>
                ';
                $jumlah += $row['satuan5'];
            }

        } elseif ($row['transport'] == 'dinas') {
            $transport = '
            <tr>
                <td></td>
                <td><div class="stl_01" style="margin-left:31.0758em;top:53.0394em;"><span class="stl_14 stl_11 stl_54" style="word-spacing:-0.001em;">'.$row['keteranganbbm'].' '.$row['liter'].' Liter &nbsp;</span></div>
                </td>
                <td><div class="stl_01" style="margin-left:28.2458em;top:53.1494em;"><span class="stl_14 stl_11 stl_58">'.formatNumber($row['hargaliter']).' &nbsp;</span></div>
                </td>
                <td><div class="stl_01" style="margin-left:9.8817em;top:53.1494em;"><span class="stl_14 stl_11 stl_54" style="word-spacing:-0.001em;"> &nbsp;</span></div>
                </td>
            </tr>
            ';
            $jumlah += $row['hargaliter'];
        }

        $harian = isset($row['harian']) ? intval($row['harian']) : 0;
        $satuanharian = isset($row['satuanharian']) ? intval($row['satuanharian']) : 0;

        $jmlHarian = $harian * $satuanharian;
        $hargaPen1 = isset($row['hargapen1']) ? intval($row['hargapen1']) : 0;
        $hargaPen2 = isset($row['hargapen2']) ? intval($row['hargapen2']) : 0;

        $jumlah += $jmlHarian;
        $jumlah += $hargaPen1;
        $jumlah += $hargaPen2;

        $addon1 = $row['addon1'] == 'ya' ? 'x 30%' : '';
        $addon2 = $row['addon2'] == 'ya' ? 'x 30%' : '';

        $html = '
        <html>
        <head>
            <meta charset="utf-8" />
            <title>
            </title>
        
            <link rel="stylesheet" href="../assets/css/kwitansi.css">
        </head>
        <body>
        <div class="stl_01" style="margin-left:40.0683em;margin-top:3.1128em;"><span class="stl_07 stl_08 stl_09">'.$row['subdana'].' &nbsp;</span></div>
        <div style="border: 2px solid black;">
            <div style="border-bottom: 2px solid black;padding: 5px">
                <div class="stl_01" style="text-align: center"><span class="stl_10 stl_11 stl_12" style="word-spacing:0.0084em;">K W I T A N S I &nbsp;</span></div>
                <table style="width: 100%;margin-top: 10px">
                    <tr>
                        <td width="25%"><div class="stl_01" style=""><span class="stl_14 stl_11 stl_15" style="word-spacing:-0.0009em;">Tahun Anggaran &nbsp;</span></div>
                        </td>
                        <td width="1%"><div class="stl_01" style="margin-left:13.05em;"><span class="stl_13 stl_11 stl_12">:</span></div>
                        </td>
                        <td width="20%"><div class="stl_01" style="margin-left:13.2942em;"><span class="stl_14 stl_11 stl_17">'.date('Y').' &nbsp;</span></div>
                        </td>
                        <td width="10%"><div class="stl_01" style="margin-left:26.6653em;"><span class="stl_20 stl_11 stl_21" style="word-spacing:0.0064em;">Bukti No. &nbsp;</span></div>
                        <td width="15%"><div class="stl_01" style="margin-left:31.5659em;"><span class="stl_20 stl_11 stl_22">/BKK-BPP/Dishut/ &nbsp;</span></div>
                        </td>
                        <td><div class="stl_01" style="margin-left:38.2385em;"><span class="stl_20 stl_11 stl_23">/2024 &nbsp;</span></div></td>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%; margin-bottom: 10px">
                    <tr>
                        <td width="25%"><div class="stl_01" style=""><span class="stl_14 stl_11 stl_16" style="word-spacing:-0.0011em;">Kode Rekening &nbsp;</span></div></td>
                        <td width="1%"><div class="stl_01" style="margin-left:13.0342em;"><span class="stl_13 stl_11 stl_12">:</span></div>
                        </td>
                        <td><div class="stl_01" style="margin-left:13.2942em;"><span class="stl_14 stl_11 stl_18">'.$row['norek'].' &nbsp;</span></div></td>
                    </tr>
                    <tr>
                        <td width="25%"><div class="stl_01" style="margin-left:3.922em;"><span class="stl_14 stl_11 stl_19" style="word-spacing:0.0003em;">Uraian Pengeluaran &nbsp;</span></div>
                        </td>
                        <td width="1%"><div class="stl_01" style="margin-left:13.0283em;"><span class="stl_13 stl_11 stl_12">:</span></div>
                        </td>
                        <td><div class="stl_01" style="margin-left:13.2942em;"><span class="stl_14 stl_11 stl_19" style="word-spacing:0.0025em;">'.$row['uraianpengeluaran'].' &nbsp;</span></div>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="border-bottom: 2px solid black; padding: 5px">
                <table style="width: 100%;margin-top: 10px;">
                    <tr>
                        <td width="25%"><div class="stl_01" style="margin-left:3.922em;"><span class="stl_14 stl_11 stl_24" style="word-spacing:-0.0051em;">Terima Dari &nbsp;</span></div>
                        </td>
                        <td width="1%"><div class="stl_01" style="margin-left:13.54em;z-index:1800;"><span class="stl_13 stl_11 stl_12">:</span></div>
                        </td>
                        <td><div class="stl_01" style="margin-left:13.2942em;"><span class="stl_14 stl_11 stl_19" style="word-spacing:0.0025em;">Bendahara Pengeluaran Pembantu Dinas Kehutanan Provinsi Jambi &nbsp;</span></div>
                        </td>
                    </tr>
                    <tr>
                        <td width="25%"><div class="stl_01" style="margin-left:3.922em;"><span class="stl_14 stl_11 stl_25" style="word-spacing:0.0013em;">Uang Sejumlah &nbsp;</span></div>
                        </td>
                        <td width="1%"><div class="stl_01" style="margin-left:13.06em;"><span class="stl_13 stl_11 stl_12">:</span></div>
                        </td>
                        <td><div class="stl_01" style="margin-left:18.9942em;"><span class="stl_14 stl_11 stl_29">Rp. '.formatNumber($jumlah).' &nbsp; ('.terbilang_rupiah($jumlah).' rupiah)</span></div>
                        </td>
                    </tr>
                    <tr>
                        <td width="25%"><div class="stl_01" style="margin-left:3.922em;"><span class="stl_14 stl_11 stl_19" style="word-spacing:0.0003em;">Uraian Pengeluaran &nbsp;</span></div>
                        </td>
                        <td width="1%"><span class="stl_13 stl_11 stl_30">:</span></td>
                        <td><div class="stl_01" style="margin-left:13.0158em;"><span class="stl_14 stl_11 stl_31" style="word-spacing:0.0033em;">'.$row['dalamrangka'].' &nbsp;</span></div>
                        </td>
                    </tr>
                </table>
                <div class="stl_01" style="margin-left:5px;margin-top:40px;"><span class="stl_14 stl_11 stl_33">Mengetahui &nbsp;</span></div>
                <div class="stl_01" style="margin-left:5px;"><span class="stl_14 stl_11 stl_34" style="word-spacing:0.0005em;">Kuasa Pengguna Anggaran &nbsp;</span></div>
                <br><br><br>
                <div class="stl_01" style="margin-left:5px;"><span class="stl_14 stl_11 stl_29" style="word-spacing:0.0054em;">'.$row['nama'].' &nbsp;</span></div>
                <div class="stl_01" style="margin-left:5px;margin-bottom: 10px"><span class="stl_14 stl_11 stl_35" style="word-spacing:0.005em;">NIP '.$row['nip'].' &nbsp;</span></div>
            </div>
            <div>
                <table style="width: 100%;">
                    <tr>
                        <td style="border-right:2px solid black">
                            <div class="stl_01" style="margin-left:3.922em;"><span class="stl_14 stl_11 stl_36" style="word-spacing:-0.0179em;">Perhatian !!! &nbsp;</span></div>
                            <br><br>
                            <div class="stl_01" style="margin-left:3.922em;"><span class="stl_14 stl_11 stl_19" style="word-spacing:0.0045em;">1. Barang-barang &nbsp;</span></div>
                            <div class="stl_01" style="margin-left:4.6832em;"><span class="stl_14 stl_11 stl_42" style="word-spacing:0.0093em;">inventaris didaftarkan &nbsp;</span></div>
                            <div class="stl_01" style="margin-left:3.922em;"><span class="stl_14 stl_11 stl_43" style="word-spacing:0.0028em;">2. Rekening-rekening &nbsp;</span></div>
                            <div class="stl_01" style="margin-left:4.6832em;"><span class="stl_14 stl_11 stl_35" style="word-spacing:0.0029em;">pembelian barang &nbsp;</span></div>
                            <div class="stl_01" style="margin-left:4.6832em;"><span class="stl_14 stl_11 stl_44" style="word-spacing:0.0018em;">di lampirkan &nbsp;</span></div>
                        </td>
                        <td style="border-right:2px solid black">
                            <div class="stl_01" style="margin-left:13.2942em;"><span class="stl_14 stl_11 stl_37" style="word-spacing:0.0024em;">Setuju Dibayar, &nbsp;</span></div>
                            <div class="stl_01" style="margin-left:13.2942em;"><span class="stl_14 stl_11 stl_38">PPTK &nbsp;</span></div>
                            <br><br><br>
                            <div class="stl_01" style="margin-left:13.2942em;"><span class="stl_14 stl_11 stl_40" style="word-spacing:0.0015em;">'.$row['pptk'].' &nbsp;</span></div>
                            <div class="stl_01" style="margin-left:13.4845em;"><span class="stl_14 stl_11 stl_35" style="word-spacing:0.005em;">NIP '.$row['nippptk'].' &nbsp;</span></div>
        
                        </td>
                        <td style="border-right:2px solid black">
                            <div class="stl_01" style="margin-left:24.0258em;"><span class="stl_14 stl_11 stl_39" style="word-spacing:0.0173em;">Lunas Bayar, &nbsp;</span></div>
                            <div class="stl_01" style="margin-left:24.0258em;"><span class="stl_14 stl_11 stl_18">Bend.Peng.Pembantu, &nbsp;</span></div>
                            <br><br><br>
                            <div class="stl_01" style="margin-left:24.0258em;"><span class="stl_14 stl_11 stl_45">Reynilda &nbsp;</span></div>
                            <div class="stl_01" style="margin-left:24.0258em;"><span class="stl_14 stl_11 stl_35" style="word-spacing:0.005em;">NIP 197603032007012013 &nbsp;</span></div>
                        </td>
                        <td>
                            <div class="stl_01" style="margin-left:34.2158em;"><span class="stl_14 stl_11 stl_40">Jambi, Maret 2024&nbsp;</span></div>
                            <div class="stl_01" style="margin-left:34.2158em;"><span class="stl_14 stl_11 stl_41" style="word-spacing:0.0053em;">Yang Menerima, &nbsp;</span></div>
                            <br><br><br>
                            <div class="stl_01" style="margin-left:34.2158em;"><span class="stl_14 stl_11 stl_46" style="word-spacing:0.0005em;">'.$row['nama'].' &nbsp;</span></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="stl_01" style="text-align: center;margin-top: 20px;"><span class="stl_14 stl_11 stl_47" style="word-spacing:0.0007em;">RINCIAN BIAYA PERJALANAN DINAS &nbsp;</span></div>
        <table style="width: 100%">
            <tr>
                <td width="25%"><div class="stl_01" style="margin-left:3.922em;"><span class="stl_14 stl_11 stl_46" style="word-spacing:0.0025em;">Lampiran SPPD Nomor &nbsp;</span></div>
                </td>
                <td width="1%"><div class="stl_01" style="margin-left:13.0542em;"><span class="stl_13 stl_11 stl_12">:</span></div>
                </td>
                <td><div class="stl_01" style="margin-left:13.5242em;"><span class="stl_14 stl_11 stl_16">'.$row['nosppd'].' &nbsp;</span></div>
                </td>
            </tr>
            <tr>
                <td><div class="stl_01" style="margin-left:3.922em;"><span class="stl_14 stl_11 stl_16">Tanggal &nbsp;</span></div>
                </td>
                <td><div class="stl_01" style="margin-left:13.0483em;"><span class="stl_13 stl_11 stl_12">:</span></div>
                </td>
                <td><div class="stl_01" style="margin-left:13.2942em;"><span class="stl_14 stl_11 stl_32" style="word-spacing:0.0052em;">'.$row['tanggalspd'].' &nbsp;</span></div>
                </td>
            </tr>
        </table>
        <table class="tbl-rincian-biaya">
            <thead>
            <tr>
                <th width="7%"><div class="stl_01" style="font-weight: normal"><span class="stl_14 stl_11 stl_23">NO &nbsp;</span></div>
                </th>
                <th width="40%"><div class="stl_01" style="font-weight: normal"><span class="stl_14 stl_11 stl_50" style="word-spacing:0.0008em;">PERINCIAN BIAYA &nbsp;</span></div>
                </th>
                <th width="23%"><div class="stl_01" style="font-weight: normal"><span class="stl_14 stl_11 stl_48">JUMLAH Rp.&nbsp;</span></div>
                </th>
                <th width="40%"><div class="stl_01" style="font-weight: normal"><span class="stl_14 stl_11 stl_12">KETERANGAN &nbsp;</span></div>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td><div class="stl_01" style="margin-left:6.472em;top:44.7894em;"><span class="stl_14 stl_11 stl_16" style="word-spacing:0em;">'.$row['keteranganperjalanan'].' Non Eselon, dengan rincian sebagai berikut : &nbsp;</span></div>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><div class="stl_01" style="margin-left:4.692em;top:47.6394em;"><span class="stl_14 stl_11 stl_17">1. &nbsp;</span></div>
                </td>
                <td><div class="stl_01" style="margin-left:6.472em;top:47.6394em;"><span class="stl_14 stl_11 stl_52" style="word-spacing:-0.0017em;">Uang Harian &nbsp;</span></div>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><div class="stl_01" style="margin-left:7.882em;top:48.6094em;"><span class="stl_14 stl_11 stl_12">'.$row['harian'].' hari X Rp. '.formatNumber($row['satuanharian']).' </span></div>
                </td>
                <td><div class="stl_01"><span class="stl_14 stl_11 stl_29">'.formatNumber($jmlHarian).' &nbsp;</span></div>
                </td>
                <td></td>
            </tr>
            <tr>
                <td><div class="stl_01" style="margin-left:4.692em;top:50.1694em;"><span class="stl_14 stl_11 stl_17">2. &nbsp;</span></div>
                </td>
                <td><div class="stl_01" style="margin-left:6.472em;top:50.1694em;"><span class="stl_14 stl_11 stl_53" style="word-spacing:-0.003em;">Transport : &nbsp;</span></div>
                </td>
                <td></td>
                <td></td>
            </tr>
            '.$transport.'
            <tr>
                <td><div class="stl_01" style="margin-left:4.602em;top:57.8619em;"><span class="stl_14 stl_11 stl_57">3. &nbsp;</span></div>
                </td>
                <td><div class="stl_01" style="margin-left:6.472em;top:57.8619em;"><span class="stl_14 stl_11 stl_35">Penginapan &nbsp;</span></div>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><div class="stl_01" style="margin-left:7.882em;top:58.7919em;"><span class="stl_14 stl_11 stl_12">'.$row['satuanpen1'].' Malam '.$addon1.'</span></div>
                </td>
                <td><div class="stl_01" style="margin-left:27.8658em;top:58.7719em;"><span class="stl_14 stl_11 stl_35" style="word-spacing:0.7975em;">'.formatNumber($row['hargapen1']).' &nbsp;</span></div>
                </td>
                <td><div class="stl_01" style="margin-left:27.8658em;top:58.7719em;"><span class="stl_14 stl_11 stl_35" style="word-spacing:0.7975em;">'.$row['ketpen1'].' &nbsp;</span></div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><div class="stl_01" style="margin-left:6.702em;top:59.6819em;"><span class="stl_14 stl_11 stl_34" style="word-spacing:0.0009em;">'.$row['hotel1'].' &nbsp;</span></div>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><div class="stl_01" style="margin-left:7.882em;top:58.7919em;"><span class="stl_14 stl_11 stl_12">'.$row['satuanpen2'].' Malam '.$addon2.'</span></div>
                </td>
                <td><div class="stl_01" style="margin-left:27.8658em;top:58.7719em;"><span class="stl_14 stl_11 stl_35" style="word-spacing:0.7975em;">'.formatNumber($row['hargapen2']).' &nbsp;</span></div>
                </td>
                <td><div class="stl_01" style="margin-left:27.8658em;top:58.7719em;"><span class="stl_14 stl_11 stl_35" style="word-spacing:0.7975em;">'.$row['ketpen2'].' &nbsp;</span></div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><div class="stl_01" style="margin-left:6.702em;top:59.6819em;"><span class="stl_14 stl_11 stl_34" style="word-spacing:0.0009em;">'.$row['hotel2'].' &nbsp;</span></div>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr class="tbl-border">
                <td colspan="2"><div class="stl_01" style="text-align: center"><span class="stl_14 stl_11 stl_48">JUMLAH &nbsp;</span></div>
                </td>
                <td><div class="stl_01" style="margin-left:27.2958em;top:62.5019em;"><span class="stl_14 stl_11 stl_29">'.formatNumber($jumlah).' &nbsp;</span></div>
                </td>
                <td></td>
            </tr>
            <tr class="tbl-border">
                <td colspan="2"></td>
                <td><div class="stl_01" style="margin-left:30.1058em;top:63.4519em;"><span class="stl_14 stl_11 stl_12">-</span></div>
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4"><div class="stl_01" style="margin-left:10.1117em;top:64.4019em;"><span class="stl_14 stl_11 stl_63" style="word-spacing:0.5233em;">Terbilang '.ucwords(strtolower(terbilang_rupiah($jumlah))).' Rupiah</span><span class="stl_14 stl_11 stl_12" style="word-spacing:-0.0055em;">&nbsp;</span></div>
                </td>
            </tr>
            </tbody>
        </table>
        <table style="width: 100%;margin-top: 20px">
            <tr>
                <td width="60%">
                    <div class="stl_01" style="margin-left:3.692em;top:67.2319em;"><span class="stl_14 stl_11 stl_18" style="word-spacing:0.0036em;">Telah dibayar sejumlah Rp. '.formatNumber($jumlah).'&nbsp;</span></div>
                    <div class="stl_01" style="margin-left:30.8458em;top:68.1519em;"><span class="stl_14 stl_11 stl_18" style="word-spacing:0.003em;">'.terbilang_rupiah($jumlah).' rupiah&nbsp;</span></div>
                    <br>
                    <div class="stl_01" style="margin-left:3.692em;top:70.1319em;"><span class="stl_14 stl_11 stl_64" style="word-spacing:0.006em;">Bend.Peng. Pembantu, &nbsp;</span></div>
                    <br><br>
                    <div class="stl_01" style="margin-left:3.692em;top:73.7336em;"><span class="stl_14 stl_11 stl_45">Reynilda &nbsp;</span></div>
                    <div class="stl_01" style="margin-left:3.692em;top:74.6436em;"><span class="stl_14 stl_11 stl_35" style="word-spacing:0.005em;">NIP 197603032007012013 &nbsp;</span></div>
                </td>
                <td>
                    <div class="stl_01" style="margin-left:30.8458em;top:66.3219em;"><span class="stl_14 stl_11 stl_40">Jambi, &nbsp; Maret 2024</span></div>
                    <div class="stl_01" style="margin-left:30.8458em;top:67.2319em;"><span class="stl_14 stl_11 stl_18" style="word-spacing:0.0036em;">Telah dibayar sejumlah Rp. '.formatNumber($jumlah).'</span></div>
                    <div class="stl_01" style="margin-left:30.8458em;top:68.1519em;"><span class="stl_14 stl_11 stl_18" style="word-spacing:0.003em;">'.terbilang_rupiah($jumlah).' rupiah&nbsp;</span></div>
                    <br>
                    <div class="stl_01" style="margin-left:30.8458em;top:70.1319em;"><span class="stl_14 stl_11 stl_41" style="word-spacing:0.0053em;">Yang Menerima, &nbsp;</span></div>
                    <br><br>
                    <div class="stl_01" style="margin-left:30.8458em;top:73.7336em;"><span class="stl_14 stl_11 stl_46" style="word-spacing:0.0005em;">'.$row['nama'].' &nbsp;</span></div>
        
                </td>
            </tr>
        </table>
        </body>
        </html>
    ';

        $mpdf->WriteHTML($html);

        $mpdf->Output('kwitansi.pdf', 'I'); // Save as 'receipt.pdf'
    }
}

function formatNumber($num)
{
    if ($num) {
        return number_format($num,0,',','.');
    }
    return 0;
}

function terbilang_rupiah($angka){
    $angka = floatval($angka);

    $bilangan = [
        '', 'satu', 'dua', 'tiga', 'empat', 'lima',
        'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh',
        'sebelas'
    ];

    // Puluhan
    if ($angka < 12) {
        return $bilangan[$angka];
    } elseif ($angka < 20) {
        return $bilangan[$angka - 10] . ' belas';
    } elseif ($angka < 100) {
        return $bilangan[floor($angka / 10)] . ' puluh ' . $bilangan[$angka % 10];
    } elseif ($angka < 200) {
        return 'seratus ' . terbilang_rupiah($angka - 100);
    } elseif ($angka < 1000) {
        return $bilangan[floor($angka / 100)] . ' ratus ' . terbilang_rupiah($angka % 100);
    } elseif ($angka < 2000) {
        return 'seribu ' . terbilang_rupiah($angka - 1000);
    } elseif ($angka < 1000000) {
        return terbilang_rupiah(floor($angka / 1000)) . ' ribu ' . terbilang_rupiah($angka % 1000);
    } elseif ($angka < 1000000000) {
        return terbilang_rupiah(floor($angka / 1000000)) . ' juta ' . terbilang_rupiah($angka % 1000000);
    } else {
        return 'Angka terlalu besar!';
    }
}

echo "<script> alert('Id Kwitansi tidak ditemukan');
    document.location.href='rincian.php';</script>";
