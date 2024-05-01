<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'sppd');
session_start();
if ($_SESSION['level'] == "") {
  header("location:admin.php?pesan=belum_login");
}


$user = $_SESSION['username'];
$query = "SELECT * FROM userlogin where username= '$user'";
$result = mysqli_query($koneksi, $query);

?>
<?php
if (mysqli_num_rows($result) > 0) {
  $d = mysqli_fetch_array($result);
  $_SESSION["username"] = $d["username"];
  $_SESSION["level"] = $d["level"];
}
?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>ESPJ-KU</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/icon1.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- JSS Script -->
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"> -->
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
   
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <!-- <span class="app-brand-logo demo">
                <svg
                  width="25"
                  viewBox="0 0 25 42"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                > -->
                  <defs>
                    <path
                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                      id="path-1"
                    ></path>
                    <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                      id="path-3"
                    ></path>
                    <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                      id="path-4"
                    ></path>
                    <path
                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                      id="path-5"
                    ></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                          id="Triangle"
                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">ESPJ-KU</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="operator.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">MASTER</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="pegawai.php" class="menu-link">
                    <div data-i18n="Without menu">DATA PEGAWAI</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="kegiatan.php" class="menu-link">
                    <div data-i18n="Without navbar">DATA KEGIATAN</div>
                  </a>
                </li>
                
                
              </ul>
            </li>
          <!-- SPPD -->
          <li class="menu-item">
              <a
                href="kwitansi.php"
               
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">SPPD</div>
              </a>
            </li>
          <li class="menu-item">
              <a
                href="laporan.php"
               
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Laporan</div>
              </a>
            </li>
            <!-- Layouts -->
            <li class="menu-item active">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Rincian Biaya</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="kwitansi.php" class="menu-link">
                    <div data-i18n="Without menu">Tambah Kwitansi</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="rincian.php" class="menu-link">
                    <div data-i18n="Without navbar">Data Rincian Biaya</div>
                  </a>
                </li>
                
                
              </ul>
            </li>
          <!-- Batas SPPD -->
          
           
            
            
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              
             <!-- Search -->
             <form  action="" method="GET">
                <div class="navbar-nav align-items-center">
                    <div class="nav-item d-flex align-items-center">
                      <!-- <label class="bx bx=search fs-4 lh-0"></label> -->
                      <i type="submit"  class="bx bx-search fs-4 lh-0"></i>
                      <input
                        type="text"
                        class="form-control border-0 shadow-none"
                        placeholder="Search..."
                        aria-label="Search..."
                        name="cari"
                        
                       >              
                    </div>
                  </div>
                  
              </form>
              <!-- /Search -->
             

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/gambar.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/gambar.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">

                          <span class="fw-semibold d-block">
                          <?php
                          if (isset($_SESSION['username'])) {
                            echo "Halo, " . $_SESSION['username'] . "</p>";
                          } else {
                            echo "<p>Anda belum login. Silahkan <a href='index.php'>login</a> terlebih dahulu.</p>";
                          }
                          ?>    
                          </span>
                            <small class="text-muted"><?php

                                                      if (isset($_SESSION['level'])) {
                                                        echo  $_SESSION['level'] . "</p>";
                                                      } else {
                                                        echo "<p>Anda belum login. Silahkan <a href='index.php'>login</a> terlebih dahulu.</p>";
                                                      }
                                                      ?> 
                          </small>
                          </div>
                        </div>
                      </a>
                    </li>

                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    
                    <li>
                      <a class="dropdown-item" href="logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
                
              </ul>
            </div>
            <b></b>
          </nav>
            <!-- Basic Bootstrap Table --> 
            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- <div class="row"> -->
                
                  <div class="card" >
                  
             <!-- Bootstrap modals -->
             <div class="card ">
                <h5 class="card-header">Data Rincian Biaya</h5>
                <div class="card-body">
                  <div class="row gy-3">
                    <!-- Default Modal -->
                    <div class="col-lg-4 col-md-6">
                      <small class="text-light fw-semibold">Rincian Biaya</small>
                      
                      <div class="mt-3">
                        <!-- Button trigger modal -->
                        <a href="kwitansi.php"
                          type="button"
                          class="btn btn-primary"
                        >
                          Tambah Data
                        </a>
                        

                        <?php
                      include "koneksi.php";
                      $panggildata = mysqli_query($koneksi, 'SELECT * FROM kwitansi')or die(mysqli_error($koneksi));
                      
                      $counter = 0;
                      

                      if (isset($_GET['cari'])) {
                        //  $panggildata = $_GET['cari'];
                      
                        $panggildata = mysqli_query($koneksi, "SELECT * FROM kwitansi WHERE nosppd LIKE '%" . $_GET['cari'] . "%' OR uraianpengeluaran LIKE '%" . $_GET['cari'] . "%' OR keteranganperjalanan LIKE '%" . $_GET['cari']."%'");

                      } else {
                        $query = "SELECT * FROM kwitansi";
                      }
                      
                      while ($isi = mysqli_fetch_array($panggildata)) {
                        $counter++;
                        if ($counter % 10 == 1) {
                        
                      ?>
                        <a href="generate_kwitansi.php?idkwitansi=<?= $isi['idkwitansi'] ?>" name="cari" type="button" class="btn btn-success"  >Cetak Data</a>
                      <?php
                        }
                        }
                        ?>


                        <!-- Modal tambah data -->
                      </div>

                    </div>

                  
                    
                <!-- Modals tutup  -->

                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>AKSI</th>
                        <th>NO SPPD</th>
                        <th>Tanggal</th>
                        <th>Biaya Harian</th>
                        <th>Satuan</th>
                        <th>TP I</th>
                        <th>Keterangan</th>
                        <th>TP II</th>
                        <th>Keterangan</th>
                        <th>TP II</th>
                        <th>Keterangan</th>
                        <th>TP IV</th>
                        <th>Keterangan</th>
                        <th>TP V</th>
                        <th>Keterangan</th>
                        <th>Kendaraan</th>
                        <th>Harga</th>
                        <th>Penginapan</th>
                        <th>Harga</th>
                        <th>Hotel</th>
                        <th>Penginapan II</th>
                        <th>Harga</th>
                        <th>Hotel</th>
                        
                        <th></th>
                      </tr>

                      
                    </thead>
                    <tbody class="table-border-bottom-0">
                    

<!-- memanggil data pegawai dan pencarian -->
<?php
include "koneksi.php";
$panggildata = mysqli_query($koneksi, 'SELECT * FROM kwitansi ORDER BY idkwitansi');
$no = 1;

if (isset($_GET['cari'])) {
  //  $panggildata = $_GET['cari'];
  $panggildata = mysqli_query($koneksi, "SELECT * FROM kwitansi WHERE nosppd LIKE '%" . $_GET['cari'] . "%' OR uraianpengeluaran LIKE '%" . $_GET['cari'] . "%' OR keteranganperjalanan LIKE '%" . $_GET['cari']."%'");
} else {
  $query = "SELECT * FROM kwitansi";
}

while ($isi = mysqli_fetch_array($panggildata)) {
?>
                      <tr>
                      
                        <td><?php echo $no++; ?></td>
                        <td>
                          
                        
                        <a href="generate_kwitansi.php?idkwitansi=<?= $isi['idkwitansi'] ?>"    class="btn btn-success ">Cetak</a>
                        <!-- Button trigger edit data modal -->
                      <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#editkategori<?= $isi['idkwitansi']; ?>"
                      >
                        Edit
                      </button>
                  <!-- Modal edit data -->
                  <div class="modal fade" id="editkategori<?= $isi['idkwitansi']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel1">Edit Data Kwitansi</h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                              </div>
                              <form action="" method="POST">
                              <div class="card-body">
                              <form action="rincian.php" method="post">
                                  <input type="hidden" id="idkwitansi" name="idkwitansi" value="<?= $isi['idkwitansi']; ?>">
                                <div class="row mb-3">
                                  <label for="nosppd" class="col-sm-2 col-form-label" >Nomor SPD</label>
                                  <div class="col-sm-4">
                                    <input name="nosppd" type="text"  id="nosppd" class="form-control" placeholder="XXX/Dishut-1.1/III/2024" value="<?= $isi['nosppd']; ?>" />
                                  </div>
                                  <label class="col-1 col-form-label" for="basic-default-name">Tanggal SPPD</label>
                                  <div class="col-sm-3">
                                    <input type="text" name="tanggalspd" id="tanggalspd" class="form-control" placeholder="12 Maret 2024" value="<?= $isi['tanggalspd']; ?>" />
                                  </div>
                                </div>

                                <div class="row mb-3">
                                  <label class="col-sm-2 col-form-label" for="basic-default-company">Uraian Pengeluaran</label>
                                  <div class="col-sm-10">
                                    <input
                                    name="uraianpengeluaran" id="uraianpengeluaran"
                                      type="text"
                                      class="form-control"
                                      id="basic-default-company"
                                      placeholder="Perjalanan Dinas Biasa"
                                    value="<?= $isi['uraianpengeluaran']; ?>"
                                    />
                                  </div>
                                </div>

                                <div class="row mb-3">
                                  <label class="col-sm-2 col-form-label" for="basic-default-message">Keterangan</label>
                                  <div class="col-sm-10">
                                    <textarea
                                    name="keteranganperjalanan" id="keteranganperjalanan"

                                      class="form-control"
                                      placeholder="Uang Harian pada ASN/Non Eselon ke Jambi, 3 (tiga) hari, dengan rincian sebagai berikut"
                                      aria-label="Uang Harian pada ASN/Non Eselon ke Jambi, 3 (tiga) hari, dengan rincian sebagai berikut"
                                      aria-describedby="basic-icon-default-message2"
                                    ><?= $isi['keteranganperjalanan']; ?></textarea>
                                  </div>
                                </div>

                                <!-- uang harian                                 -->
                                <div class="row mb-3">
                                  <label class="col-sm-2 col-form-label" for="basic-default-name">Biaya Harian</label>
                                  <div class="col-sm-2">
                                    <input type="text" name="harian" id="harian" class="form-control" placeholder="3" value="<?= $isi['harian']; ?>" />
                                  </div>
                                  <label class="col-1 col-form-label" for="basic-default-name">Satuan</label>
                                  <div class="col-sm-2">
                                    <input type="text" name="satuanharian" id="satuanharian" class="form-control" placeholder="370.000" value="<?= $isi['satuanharian']; ?>" />
                                  </div>
                                </div>
                                <!-- Kendaraan Harian                                 -->
                                <div class="row mb-4">
                                  <label class="col-sm-2 col-form-label" for="basic-default-name">Transport</label>
                                  <div class="col-sm-2">
                                  <select name="transport" onchange="setTransport(this)" type="text" class="form-select"
                                      id="autocompleteSelect" aria-label="Default select example" >
                                      <?php if($isi['transport'] == 'umum') { ?>
                                      <option value="umum" selected>Kendaraan Umum</option>
                                      <option value="dinas">Kendaraan Dinas</option>
                                      <?php } elseif($isi['transport'] == 'dinas') { ?>
                                      <option value="umum">Kendaraan Umum</option>
                                      <option value="dinas" selected>Kendaraan Dinas</option>
                                      <?php } else { ?>
                                      <option value="umum">Kendaraan Umum</option>
                                      <option value="dinas">Kendaraan Dinas</option>
                                      <?php } ?>
                                  </div>
                                  <div class="col-sm-2">
                                    <input type="hidden" class="form-control" placeholder="APBD/APBN" />
                                  </div>
                                  <label class="col-sm-1"  for="basic-default-name">Sumber Dana</label>
                                  <div class="col-sm-2">
                                    <input type="text" name="subdana" id="subdana" class="form-control" placeholder="APBD/APBN" value="<?= $isi['subdana']; ?>" />
                                  </div>
                                </div>

                                  <!-- Tiket Transport -->
                                  <div id="transport-wrapper">
                                      <div class="row mb-3">
                                          <label class="col-sm-2 col-form-label" for="basic-default-name">Transport 1</label>
                                          <div class="col-sm-2">
                                              <input type="text" name="tp1" id="tp1" class="form-control" placeholder="2" value="<?= $isi['tp1']; ?>" />
                                          </div>
                                          <label class="col-1 col-form-label" for="basic-default-name">Satuan</label>
                                          <div class="col-sm-2">
                                              <input type="text" name="satuan1" id="satuan1"  class="form-control" placeholder="120.000" value="<?= $isi['satuan1']; ?>" />
                                          </div>
                                          <label class="col-sm-1 col-form-label" for="basic-default-name">Ket</label>
                                          <div class="col-sm-3">
                                              <input type="text" name="kettp1" id="kettp1"  class="form-control" placeholder="Tiket Jambi - Kerinci" value="<?= $isi['kettp1']; ?>" />
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                          <label class="col-sm-2 col-form-label" for="basic-default-name">Transport 2</label>
                                          <div class="col-sm-2">
                                              <input type="text" name="tp2" id="tp2"  class="form-control" placeholder="2" value="<?= $isi['tp2']; ?>" />
                                          </div>
                                          <label class="col-1 col-form-label" for="basic-default-name">Satuan</label>
                                          <div class="col-sm-2">
                                              <input type="text" name="satuan2" id="satuan2"  class="form-control" placeholder="120.000" value="<?= $isi['satuan2']; ?>" />
                                          </div>
                                          <label class="col-sm-1 col-form-label" for="basic-default-name">Ket</label>
                                          <div class="col-sm-3">
                                              <input type="text" name="kettp2" id="kettp2"  class="form-control" placeholder="Tiket Jambi - Kerinci" value="<?= $isi['kettp2']; ?>" />
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                          <label class="col-sm-2 col-form-label" for="basic-default-name">Transport 3</label>
                                          <div class="col-sm-2">
                                              <input type="text" name="tp3" id="tp3"  class="form-control" placeholder="2" value="<?= $isi['tp3']; ?>" />
                                          </div>
                                          <label class="col-1 col-form-label" for="basic-default-name">Satuan</label>
                                          <div class="col-sm-2">
                                              <input type="text" name="satuan3" id="satuan3"  class="form-control" placeholder="120.000" value="<?= $isi['satuan3']; ?>" />
                                          </div>
                                          <label class="col-sm-1 col-form-label" for="basic-default-name">Ket</label>
                                          <div class="col-sm-3">
                                              <input type="text" name="kettp3" id="kettp3"  class="form-control" placeholder="Tiket Jambi - Kerinci" value="<?= $isi['kettp3']; ?>" />
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                          <label class="col-sm-2 col-form-label" for="basic-default-name">Transport 4</label>
                                          <div class="col-sm-2">
                                              <input type="text" name="tp4" id="tp4"  class="form-control" placeholder="1" value="<?= $isi['tp4']; ?>" />
                                          </div>
                                          <label class="col-1 col-form-label" for="basic-default-name">Satuan</label>
                                          <div class="col-sm-2">
                                              <input type="text" name="satuan4" id="satuan4"  class="form-control" placeholder="120.000" value="<?= $isi['satuan4']; ?>" />
                                          </div>
                                          <label class="col-sm-1 col-form-label" for="basic-default-name">Ket</label>
                                          <div class="col-sm-3">
                                              <input type="text" name="kettp4" id="kettp4"  class="form-control" placeholder="Tiket Jambi - Kerinci" value="<?= $isi['kettp4']; ?>" />
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                          <label class="col-sm-2 col-form-label" for="basic-default-name">Transport 5</label>
                                          <div class="col-sm-2">
                                              <input type="text" name="tp5" id="tp5"  class="form-control" placeholder="1" value="<?= $isi['tp5']; ?>" />
                                          </div>
                                          <label class="col-1 col-form-label" for="basic-default-name">Satuan</label>
                                          <div class="col-sm-2">
                                              <input type="text" name="satuan5" id="satuan5"  class="form-control" placeholder="120.000" value="<?= $isi['satuan5']; ?>" />
                                          </div>
                                          <label class="col-sm-1 col-form-label" for="basic-default-name">Ket</label>
                                          <div class="col-sm-3">
                                              <input type="text" name="kettp5" id="kettp5"  class="form-control" placeholder="Tiket Jambi - Kerinci" value="<?= $isi['kettp5']; ?>" />
                                          </div>
                                      </div>
                                  </div>
                                 <!-- akhir tiket transport -->
                                 <!-- Kendaraan Dinas -->
                                 <div class="row mb-3" id="kend-dinas-wrapper">
                                  <label class="col-sm-2 col-form-label" for="basic-default-name">Kendaraan Dinas</label>
                                  <div class="col-sm-4">
                                    <input type="text" name="keteranganbbm" id="keteranganbbm"  class="form-control" placeholder="Mobil Dinas BH XXX BBM Pertamax/Pertalite" value="<?= $isi['keteranganbbm']; ?>" />
                                  </div>
                                  <label class="col-1 col-form-label" for="basic-default-name">Liter</label>
                                  <div class="col-sm-2">
                                    <input type="text" name="liter" id="liter"  class="form-control" placeholder="40" value="<?= $isi['liter']; ?>" />
                                  </div>
                                  <label class="col-sm-1 col-form-label" for="basic-default-name">Harga</label>
                                  <div class="col-sm-2">
                                    <input type="text" name="hargaliter" id="hargaliter"  class="form-control" placeholder="14.500" value="<?= $isi['hargaliter']; ?>" />
                                  </div>
                                </div>
                                 <!-- Akhir Kendaraan Dinas -->
                                  <!-- Penginapan 1 -->
                                  <div class="row mb-3">
                                  <label class="col-sm-2 col-form-label" for="basic-default-name">Penginapan 1</label>
                                  <div class="col-sm-3">
                                    <input type="text" name="ketpen1" id="ketpen1"  class="form-control" placeholder="Penginapan 1 Malam" value="<?= $isi['ketpen1']; ?>" />
                                  </div>
                                  <label class="col-1 col-form-label" for="basic-default-name">Satuan</label>
                                  <div class="col-sm-2">
                                    <input type="text" name="satuanpen1" id="satuanpen1"  class="form-control" placeholder="40" value="<?= $isi['satuanpen1']; ?>" />
                                  </div>
                                  <label class="col-sm-1 col-form-label" for="basic-default-name">Harga</label>
                                  <div class="col-sm-2">
                                    <input type="text" oninput="setHarga(this, '1')" name="hargapen1" id="hargapen1" class="form-control" placeholder="14.500" value="<?= $isi['hargapen1']; ?>" />
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="row mb-3">
                                            <label class="col-sm-5 col-form-label" for="basic-default-name">Nama Penginapan</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="hotel1" id="hotel1" class="form-control" placeholder="Penginapan 1 Malam" value="<?= $isi['hotel1']; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-check">
                                            <?php if ($isi['addon1'] == 'ya') { ?>
                                                <input onclick="hitungHarga('hargapen1', '1', '1')" class="form-check-input" type="radio" name="addon1" id="flexRadioGroup1Option1" value="ya" checked>
                                            <?php } else { ?>
                                                <input onclick="hitungHarga('hargapen1', '1', '1')" class="form-check-input" type="radio" name="addon1" id="flexRadioGroup1Option1" value="ya">
                                            <?php } ?>
                                            <label class="form-check-label" for="flexRadioGroup1Option1">
                                                30%
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <?php if ($isi['addon1'] == 'tidak') { ?>
                                                <input onclick="hitungHarga('hargapen1', '2', '1')" class="form-check-input" type="radio" name="addon1" id="flexRadioGroup1Option2" value="tidak" checked>
                                            <?php } else { ?>
                                                <input onclick="hitungHarga('hargapen1', '2', '1')" class="form-check-input" type="radio" name="addon1" id="flexRadioGroup1Option2" value="tidak">
                                            <?php } ?>
                                            <label class="form-check-label" for="flexRadioGroup1Option2">
                                                Non 30%
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                 <!-- Akhir Penginapan -->
                                  <!-- Penginapan 2 -->
                                  <div class="row mb-3">
                                  <label class="col-sm-2 col-form-label" for="basic-default-name">Penginapan 1</label>
                                  <div class="col-sm-3">
                                    <input type="text" name="ketpen2" id="ketpen2"  class="form-control" placeholder="Penginapan 1 Malam" value="<?= $isi['ketpen2']; ?>" />
                                  </div>
                                  <label class="col-1 col-form-label" for="basic-default-name">Satuan</label>
                                  <div class="col-sm-2">
                                    <input type="text" name="satuanpen2" id="satuanpen2" class="form-control" placeholder="40" value="<?= $isi['satuanpen2']; ?>" />
                                  </div>
                                  <label class="col-sm-1 col-form-label" for="basic-default-name">Harga</label>
                                  <div class="col-sm-2">
                                    <input type="text" oninput="setHarga(this, '2')" name="hargapen2" id="hargapen2" class="form-control" placeholder="14.500" value="<?= $isi['hargapen2']; ?>" />
                                  </div>
                                </div>
                                  <div class="row">
                                      <div class="col-md-5">
                                          <div class="row mb-3">
                                              <label class="col-sm-5 col-form-label" for="basic-default-name">Nama Penginapan</label>
                                              <div class="col-sm-7">
                                                  <input type="text" name="hotel2" id="hotel2" class="form-control" placeholder="Penginapan 1 Malam" value="<?= $isi['hotel2']; ?>" />
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-1">
                                          <div class="form-check">
                                              <?php if($isi['addon2'] == 'ya') { ?>
                                                <input onclick="hitungHarga('hargapen2', '1', '2')" class="form-check-input" type="radio" name="addon2" id="flexRadioGroup2Option1" value="ya" checked>
                                              <?php } else { ?>
                                                <input onclick="hitungHarga('hargapen2', '1', '2')" class="form-check-input" type="radio" name="addon2" id="flexRadioGroup2Option1" value="ya">
                                              <?php } ?>
                                              <label class="form-check-label" for="flexRadioGroup2Option1">
                                                  30%
                                              </label>
                                          </div>
                                      </div>
                                      <div class="col-md-2">
                                          <div class="form-check">
                                              <?php if ($isi['addon2'] == 'tidak') { ?>
                                                <input onclick="hitungHarga('hargapen2', '2', '2')" class="form-check-input" type="radio" name="addon2" id="flexRadioGroup2Option2" value="tidak" checked>
                                              <?php } else { ?>
                                                <input onclick="hitungHarga('hargapen2', '2', '2')" class="form-check-input" type="radio" name="addon2" id="flexRadioGroup2Option2" value="tidak">
                                              <?php } ?>
                                              <label class="form-check-label" for="flexRadioGroup2Option2">
                                                  Non 30%
                                              </label>
                                          </div>
                                      </div>
                                  </div>

                                 <!-- Akhir Penginapan -->
                                      <!-- koneksi edit data  -->
                                          <?php
                                          include "koneksi.php";

                                          if (isset($_POST['edit'])) {
                                              $id = $_POST['idkwitansi'];
                                              $nosppd = $_POST['nosppd'];
                                              $tanggalspd = $_POST['tanggalspd'];
                                              $tanggalkwt = $_POST['tanggalkwt'] ?? date('Y-m-d');
                                              $uraianpengeluaran = $_POST['uraianpengeluaran'];
                                              $keteranganperjalanan = $_POST['keteranganperjalanan'];
                                              $harian = $_POST['harian'];
                                              $satuanharian = $_POST['satuanharian'];
                                              $transport = $_POST['transport'];
                                              $subdana = $_POST['subdana'];
                                              $tp1 = $_POST['tp1'];
                                              $satuan1 = $_POST['satuan1'];
                                              $kettp1 = $_POST['kettp1'];
                                              $tp2 = $_POST['tp2'];
                                              $satuan2 = $_POST['satuan2'];
                                              $kettp2 = $_POST['kettp2'];
                                              $tp3 = $_POST['tp3'];
                                              $satuan3 = $_POST['satuan3'];
                                              $kettp3 = $_POST['kettp3'];
                                              $tp4 = $_POST['tp4'];
                                              $satuan4 = $_POST['satuan4'];
                                              $kettp4 = $_POST['kettp4'];
                                              $tp5 = $_POST['tp5'];
                                              $satuan5 = $_POST['satuan5'];
                                              $kettp5 = $_POST['kettp5'];
                                              $keteranganbbm = $_POST['keteranganbbm'];
                                              $liter = $_POST['liter'];
                                              $hargaliter = $_POST['hargaliter'];
                                              $keteranganliter = $_POST['keteranganliter'] ?? "";
                                              $ketpen1 = $_POST['ketpen1'];
                                              $satuanpen1 = $_POST['satuanpen1'];
                                              $hargapen1 = $_POST['hargapen1'];
                                              $hotel1 = $_POST['hotel1'];
                                              $addon1 = $_POST['addon1'];
                                              $ketpen2 = $_POST['ketpen2'];
                                              $satuanpen2 = $_POST['satuanpen2'];
                                              $hargapen2 = $_POST['hargapen2'];
                                              $hotel2 = $_POST['hotel2'];
                                              $addon2 = $_POST['addon2'];

                                            $edit = mysqli_query($koneksi, "UPDATE kwitansi 
                                                SET nosppd = '$nosppd',
                                                    tanggalspd = '$tanggalspd',
                                                    tanggalkwt = '$tanggalkwt',
                                                    uraianpengeluaran = '$uraianpengeluaran',
                                                    keteranganperjalanan = '$keteranganperjalanan',
                                                    harian = '$harian',
                                                    satuanharian = '$satuanharian',
                                                    transport = '$transport',
                                                    subdana = '$subdana',
                                                    tp1 = '$tp1',
                                                    satuan1 = '$satuan1',
                                                    kettp1 = '$kettp1',
                                                    tp2 = '$tp2',
                                                    satuan2 = '$satuan2',
                                                    kettp2 = '$kettp2',
                                                    tp3 = '$tp3',
                                                    satuan3 = '$satuan3',
                                                    kettp3 = '$kettp3',
                                                    tp4 = '$tp4',
                                                    satuan4 = '$satuan4',
                                                    kettp4 = '$kettp4',
                                                    tp5 = '$tp5',
                                                    satuan5 = '$satuan5',
                                                    kettp5 = '$kettp5',
                                                    keteranganbbm = '$keteranganbbm',
                                                    liter = '$liter',
                                                    hargaliter = '$hargaliter',
                                                    keteranganliter = '$keteranganliter',
                                                    ketpen1 = '$ketpen1',
                                                    satuanpen1 = '$satuanpen1',
                                                    keteranganpen11 = '',
                                                    hargapen1 = '$hargapen1',
                                                    hotel1 = '$hotel1',
                                                    addon1 = '$addon1',
                                                    ketpen2 = '$ketpen2',
                                                    satuanpen2 = '$satuanpen2',
                                                    hargapen2 = '$hargapen2',
                                                    hotel2 = '$hotel2',
                                                    addon2 = '$addon2'
                                                  WHERE idkwitansi='$id'");

                                            if ($edit) {
                                              echo "<script> alert('Data Berhasil di Edit');
                                                      document.location.href='rincian.php';</script>";
                                            } else {
                                              echo "<script> alert('Data Gagal di Edit');</script";
                                            }
                                          }
                                          ?>

                                      </div>
                                          <div class="d-flex justify-content-end mb-4" style="margin-right: 50px;gap: 10px;">
                                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                              <button  type="submit" name="edit" class="btn btn-primary" id="simpan">Edit</button>
                                          </div>
                              </form>
                                    </div>

                          </div>
                          
                        </div>
                        
                      </div>
                    </div>
                    
                  </div>
                      
              <!-- Modals tutup  -->
                        <!-- akhir edit data -->
                        
                        <!-- Masuk Hapus Pegawai -->
                        
                        <a href="hapuskwitansi.php?idkwitansi=<?= $isi['idkwitansi'] ?>" onclick="return confirm('Apakah Nama Pegawai ini Mau di Hapus?')"   class="btn btn-danger">Hapus</a>
                        
                      </div>
                      </td>
                        <td><?php echo $isi['nosppd']; ?></td>
                        <td><?php echo $isi['tanggalspd']; ?></td>
                        <td><?php echo $isi['harian']; ?></td>
                        <td><?php echo $isi['satuanharian']; ?></td>
                        <td><?php echo $isi['tp1']; ?></td>
                        <td><?php echo $isi['kettp1']; ?></td>
                        <td><?php echo $isi['tp2']; ?></td>
                        <td><?php echo $isi['kettp2']; ?></td>
                        <td><?php echo $isi['tp3']; ?></td>
                        <td><?php echo $isi['kettp3']; ?></td>
                        <td><?php echo $isi['tp4']; ?></td>
                        <td><?php echo $isi['kettp4']; ?></td>
                        <td><?php echo $isi['tp5']; ?></td>
                        <td><?php echo $isi['kettp5']; ?></td>
                        <td><?php echo $isi['keteranganbbm']; ?></td>
                        <td><?php echo $isi['hargaliter']; ?></td>
                        <td><?php echo $isi['ketpen1']; ?></td>
                        <td><?php echo $isi['hargapen1']; ?></td>
                        <td><?php echo $isi['hotel1']; ?></td>
                        <td><?php echo $isi['ketpen2']; ?></td>
                        <td><?php echo $isi['hargapen2']; ?></td>
                        <td><?php echo $isi['hotel1']; ?></td>
                       
                       
                        <!-- keterangan tabel -->
                       
                      </tr> 
                    </tbody>
<?php
}
?>

                  </table>
                
                </div>
                
                </form>
                
              </div>
              <br>
              <a href="cetak3.php" name="cari" type="button" class="btn btn-primary"  >Cetak Rekap Laporan</a>
              <!--/ Basic Bootstrap Table -->

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            
                    <!-- </div>
    <div class="row"> -->
                   
                    </div>
                  </div>
                </div>
                <!--/ Transactions -->
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by M Dude
                  
                </div>
               
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    
    <!-- <script type="text/javascript" src="js/script.js"></script> -->

    <script>
        const kendUmum = document.getElementById('transport-wrapper')
        const kendDinas = document.getElementById('kend-dinas-wrapper')

        kendDinas.style.display = 'none'
        function setTransport(target_el) {
            if (target_el.value == 'dinas') {
                kendDinas.style.display = 'flex'
                kendUmum.style.display = 'none'
            }
            if (target_el.value == 'umum') {
                kendUmum.style.display = 'block'
                kendDinas.style.display = 'none'
            }
        }

        let hargaAwal1;
        let hargaAwal2;
        function hitungHarga(elem, id, group) {
            const harga = document.getElementById(elem)
            if (hargaAwal1 == undefined && group == 1) {
                hargaAwal1 = harga.value
            }
            if (hargaAwal2 == undefined && group == 2) {
                hargaAwal2 = harga.value
            }

            if (id == 1) {
                harga.value = (harga.value * 30) / 100
            }
            if (id == 2) {
                if (group == 1) {
                    harga.value = hargaAwal1
                }
                if (group == 2) {
                    harga.value = hargaAwal2
                }
            }
        }
        function setHarga(harga, group) {
            if (group == 1) {
                hargaAwal1 = harga.value
            }
            if (group == 2) {
                hargaAwal2 = harga.value
            }
        }
        // const btnSimpan = document.getElementById('simpan')
        // btnSimpan.addEventListener('click', () => window.open('generate_kwitansi.php', '_blank'))
    </script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    
    <script src="../assets/js/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <!-- <script src="/assets/js/jquery-3.2.1.min.js"></script>
    <script src="/assets/js/jquery.autocomplete.min.js"></script> -->
    <script src="../assets/js/jquery-ui.min.js"></script>
    <script src="../assets/js/jquery-ui.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>