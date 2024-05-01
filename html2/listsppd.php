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
            <li class="menu-item active">
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
                href="listsppd.php"
               
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
                <h5 class="card-header">Data SPPD</h5>
                <div class="card-body">
                  <div class="row gy-3">
                    <!-- Default Modal -->
                    <div class="col-lg-4 col-md-6">
                      <small class="text-light fw-semibold">Master</small>
                      <small class="text-light fw-semibold">/SPPD</small>
                      <div class="mt-3">
                        <!-- Button trigger modal -->
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#basicModal"
                        >
                          Tambah Data
                        </button>
                        

                        <?php
                      include "koneksi.php";
                      $panggildata = mysqli_query($koneksi, 'SELECT * FROM listsppd')or die(mysqli_error($koneksi));
                      
                      $counter = 0;
                      

                      if (isset($_GET['cari'])) {
                        //  $panggildata = $_GET['cari'];
                      
                        $panggildata = mysqli_query($koneksi, "SELECT * FROM listsppd WHERE nama LIKE '%" . $_GET['cari'] . "%' OR bidang LIKE '%" . $_GET['cari'] . "%' OR nosurat LIKE '%" . $_GET['cari']."%'"); 

                      } else {
                        $query = "SELECT * FROM listsppd";
                      }
                      
                      while ($isi = mysqli_fetch_array($panggildata)) {
                        $counter++;
                        if ($counter % 10 == 1) {
                        
                      ?>
                        <a href="cetak2.php?idsppd=<?= $isi['idsppd'] ?>" name="cari" type="button" class="btn btn-success"  >Cetak Data</a>
                      <?php
                        }
                        }
                        ?>
                    
                    
                        <!-- Modal tambah data -->
                    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Tambah Data SPPD</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                                </div>
                               
                                <form action="" method="POST">
                              <div class="modal-body">
                                
                                  <div class="row">
                                    <div class="col mb-2">
                                    <label  class="form-label">NO SPPD</label>
                                    
                                    <?php 
                                    include "koneksi.php";
                                    $sql = mysqli_query($koneksi, "select max(idsppd) as maxID from listsppd");
                                    $data = mysqli_fetch_array($sql);
                                    $kode = $data['maxID'];
                                    $kode++;
                                    $ket = "/Dishut/2024";
                                    $nosurat= sprintf( "%03s",$kode ) . $ket;
                                    // echo $nosurat;
                                    ?>
                                    <input  type="text" name="nosurat" id="nosurat" class="form-control"  value="<?= $nosurat; ?>" placeholder="Masukan Nomor surat"  />
                                  </div>
                                </div>
                                  <div class="row">
                                    <div class="col mb-2">
                                    <label  class="form-label">Tanggal</label>
                                    <input  type="date" name="tanggal" id="tanggal" class="form-control" placeholder="Masukan Tanggal" />
                                  </div>
                                </div>
                                  <div class="row">
                                  <div class="mb-2">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input name="nama" type="text" id="nama" class="form-control" placeholder="Masukan NAMA" autocomplete="TRUE"/>
                                     
                                    
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="nip"  class="form-label">NIP</label>
                                    <input name="nip" type="text" id="nip" class="form-control" placeholder="Masukan NIP" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="pangkat" class="form-label">Pangkat</label>
                                    <input name="pangkat" type="text" id="pangkat" class="form-control" placeholder="Masukan Pangkat" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <input name="jabatan" type="text" id="jabatan" class="form-control" placeholder="Nama Jabatan" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label  class="form-label">Bidang</label>
                                    <input name="bidang" type="text" id="bidang" class="form-control" placeholder="Nama Bidang" />
                                  </div>
                                </div>
                                
                                <div class="row">
                                  <div class="col mb-2">
                                    <label  class="form-label">Tingkat Menurut Aturan</label>
                                    <input name="tingkatgolongan" type="text" id="tingkatgolongan" class="form-control" placeholder="Nama Jabatan" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="dalamrangka"  class="form-label">Dalam Rangka</label>
                                    <textarea class="form-control" type="text" name="dalamrangka" id="dalamrangka" rows="3"></textarea>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="kendaraan" class="form-label">Kendaraan yang di pakai</label>
                                    <input name="kendaraan" type="text" id="kendaraan" class="form-control" placeholder="Kendaraan yang di pakai" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="tempatasal" class="form-label">Tempat Asal</label>
                                    <input name="tempatasal" type="text" id="tempatasal" class="form-control" placeholder="Tempat Asal" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="tujuanpelaksanaan"  class="form-label">Tujuan</label>
                                    <input name="tujuanpelaksanaan" type="text" id="tujuanpelaksanaan" class="form-control" placeholder="Tujuan" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="tgglpelaksana" class="form-label">Tanggal Pelaksanaan</label>
                                    <input name="tgglpelaksana" type="date" id="tgglpelaksana" class="form-control" placeholder="Tanggal Pelaksanaan" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="tanggalkembali"  class="form-label">Tanggal Kembali</label>
                                    <input name="tanggalkembali" type="date" id="tanggalkembali" class="form-control" placeholder="Tanggal Kembali" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="totalpelaksanaan" class="form-label">Lama Kegiatan</label>
                                    <input name="totalpelaksanaan" type="text" id="totalpelaksanaan" class="form-control" placeholder="Lama Kegiatan" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                  <label for="subkegiatan" class="form-label">Sub Kegiatan</label>
                                    <select name="subkegiatan" type="text" class="form-select" value="<?= $isi['subkegiatan']; ?>"
                                      id="autocompleteSelect" aria-label="Default select example" >
                                      <option selected disabled >PILIH NAMA</option>
                                      <?php
                                      include "koneksi.php";
                                      $query = mysqli_query($koneksi, "SELECT * FROM kegiatan") or die(mysqli_error($koneksi));
                                     
                                      while ($data = mysqli_fetch_array($query)) {
                                          echo "<option value='$data[namakegiatan]'>$data[namakegiatan]</option>";
                                          
                                      }
                                     
                                      ?>
                                    </select>
                                     
                                  </div>
                                </div>
                                
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="instansi" class="form-label">Instansi</label>
                                    <input name="instansi" type="text" id="instansi" class="form-control" placeholder="Instansi" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="norek" class="form-label">Kode Anggaran</label>
                                    <input name="norek" type="text" id="selectedItem" class="form-control" placeholder="Kode Rekening" />
                                    <?php 
                                    if(isset($_POST['subkegiatan'])){
                                      $query = mysqli_query($koneksi, "SELECT * FROM kegiatan") or die(mysqli_error($koneksi));
                                      $res = $query->fetch_assoc();?>
                                      <?=$res['subkegiatan'];?>
                                    <?php }?>
                                  </div>
                                </div>
                               

                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="pptk" class="form-label">PPTK</label>
                                    <input name="pptk" type="text" id="pptk" class="form-control" placeholder="Nama PPTK" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="nippptk" class="form-label">NIP</label>
                                    <input name="nippptk" type="text" id="nippptk" class="form-control" placeholder="NIP" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="pangkatpptk" class="form-label">Pangkat</label>
                                    <input name="pangkatpptk" type="text" id="pangkatpptk" class="form-control" placeholder="Pangkat" />
                                  </div>
                                 
                                      <!--tag JS  -->
                                      
                                <!-- simpan data -->
                                    <?php
                                    include "koneksi.php";

                                    if (isset($_POST['simpan'])) {
                                      $nosurat = $_POST['nosurat'];
                                      $tanggal =  $_POST['tanggal'];
                                      $nama = $_POST['nama'];
                                      $nip = $_POST['nip'];
                                      $pangkat = $_POST['pangkat'];
                                      $jabatan = $_POST['jabatan'];
                                      $bidang = $_POST['bidang'];
                                      $tingkatgolongan = $_POST['tingkatgolongan'];
                                      $dalamrangka = $_POST['dalamrangka'];
                                      $kendaraan = $_POST['kendaraan'];
                                      $tempatasal = $_POST['tempatasal'];
                                      $tujuanpelaksanaan = $_POST['tujuanpelaksanaan'];
                                      $tgglpelaksana = $_POST['tgglpelaksana'];
                                      $tanggalkembali = $_POST['tanggalkembali'];
                                      $totalpelaksanaan = $_POST['totalpelaksanaan'];
                                      $subkegiatan = $_POST['subkegiatan'];
                                      $instansi = $_POST['instansi'];
                                      $norek = $_POST['norek'];
                                      $pptk = $_POST['pptk'];
                                      $nippptk = $_POST['nippptk'];
                                      $pangkatpptk = $_POST['pangkatpptk'];

                                      $simpan = mysqli_query($koneksi, "INSERT INTO listsppd SET nosurat='$nosurat',tanggal='$tanggal',nama='$nama',nip='$nip',pangkat='$pangkat',jabatan='$jabatan',bidang='$bidang',tingkatgolongan='$tingkatgolongan',dalamrangka='$dalamrangka', kendaraan='$kendaraan', tempatasal='$tempatasal', tujuanpelaksanaan='$tujuanpelaksanaan', tgglpelaksana='$tgglpelaksana', tanggalkembali='$tanggalkembali', totalpelaksanaan='$totalpelaksanaan', subkegiatan='$subkegiatan', instansi='$instansi', norek='$norek', pptk='$pptk', nippptk='$nippptk', pangkatpptk='$pangkatpptk' ");

                                      if ($simpan) {
                                        echo "<script> alert('Data Berhasil disimpan');
                                                document.location.href='listsppd.php';</script>";
                                      } else {
                                        echo "<script> alert('Data Gagal Disimpan');</script";
                                      }
                                    }
                                    ?>      
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button  type="submit" name="simpan" class="btn btn-primary" id="simpan">Simpan</button>

                              </div>
                              </form> 
                             <!-- autofill nama -->
                             <script>
                                      function autoFillNip() {
                                        const namaInput = document.getElementById('nama');
                                        const nipInput = document.getElementById('nip');
                                        const pangkatInput = document.getElementById('pangkat');
                                        const jabatanInput = document.getElementById('jabatan');
                                        const bidangInput = document.getElementById('bidang');

                                        namaInput.addEventListener('input', function() {
                                          const enteredName = namaInput.value;

                                          fetch(`ajax.php?nama=${enteredName}`)
                                            .then(response => response.json())
                                            .then(data => {
                                              nipInput.value = data.nip || '';
                                              pangkatInput.value = data.pangkat || '';
                                              jabatanInput.value = data.jabatan || '';
                                              bidangInput.value = data.bidang || '';
                                            })
                                            .catch(error => {
                                              console.error('Error fetching data:', error);
                                            });
                                        });
                                      }

                                      autoFillNip();

                                     
                                    </script>    
                                    <!-- akhir -->

                                   <!--auto kegiatan -->
                                    <script>
                                      $("#autocompleteSelect").autocomplete({
                                          serviceUrl: "ajax3.php", // Ganti dengan URL dari file PHP Anda
                                          onSelect: function(suggestion) {
                                              $("#selectedItem").text("You selected: " + suggestion.value);
                                          },
                                      });
                                    </script> 
                                    <!-- akhir --> 
                              <!-- autofill PPTK -->
                              <script>
                                      function autoFillNip2() {
                                        const namaInput = document.getElementById('pptk');
                                        const nipInput = document.getElementById('nippptk');
                                        const pangkatInput = document.getElementById('pangkatpptk');
                                       

                                        namaInput.addEventListener('input', function() {
                                          const enteredName = namaInput.value;

                                          fetch(`ajax2.php?nama=${enteredName}`)
                                            .then(response => response.json())
                                            .then(data => {
                                            // namaInput.value = data.nama|| '';
                                              nipInput.value = data.nip || '';
                                              pangkatInput.value = data.pangkat || '';
                                            })
                                            .catch(error => {
                                              console.error('Error fetching data:', error);
                                            });
                                        });
                                      }

                                      autoFillNip2();

                                    </script>    
                                    <!-- akhir autofill -->
                            </div>
                          </div>
                          
                        </div>
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
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Pangkat</th>
                        <th>Jabatan</th>
                        <th>Bidang</th>
                        <th>Tingkat Menurut Aturan</th>
                        <th>Dalam Rangka</th>
                        <th>Kendaraan</th>
                        <th>Tempat Asal</th>
                        <th>Tujuan Pelaksana</th>
                        <th>Tanggal Pergi</th>
                        <th>Tanggal Kembali</th>
                        <th>Total Pelaksana</th>
                        <th>Sub Kegiatan</th>
                        <th>Instansi</th>
                        <th>Kode Anggaran</th>
                        <th>PPTK</th>
                        <th>NIP</th>
                        <th>Pangkat</th>
                        <th></th>
                      </tr>

                      
                    </thead>
                    <tbody class="table-border-bottom-0">
                    

<!-- memanggil data pegawai dan pencarian -->
<?php
include "koneksi.php";
$panggildata = mysqli_query($koneksi, 'SELECT * FROM listsppd ORDER BY idsppd');
$no = 1;

if (isset($_GET['cari'])) {
  //  $panggildata = $_GET['cari'];
  $panggildata = mysqli_query($koneksi, "SELECT * FROM listsppd WHERE nama LIKE '%" . $_GET['cari'] . "%' OR bidang LIKE '%" . $_GET['cari'] . "%' OR nosurat LIKE '%" . $_GET['cari']."%'");
} else {
  $query = "SELECT * FROM listsppd";
}

while ($isi = mysqli_fetch_array($panggildata)) {
?>
                      <tr>
                      
                        <td><?php echo $no++; ?></td>
                        <td>
                          
                        
                        <a href="cetak.php?idsppd=<?= $isi['idsppd'] ?>"    class="btn btn-success ">Cetak</a>
                        <!-- Button trigger edit data modal -->
                      <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#editkategori<?= $isi['idsppd']; ?>"
                      >
                        Edit
                      </button>
                  <!-- Modal edit data -->
                  <div class="modal fade" id="editkategori<?= $isi['idsppd']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel1">Edit Data Pegawai</h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                              </div>
                              <form action="" method="POST">
                            <div class="modal-body">  
                            
                              <div class="row">
                                <div class="col mb-4">
                                  <label  class="form-label">Nomor SPPD</label>
                                  <input  type="hidden" name="idsppd" value="<?= $isi['idsppd']; ?>" class="form-control" placeholder="Masukan Nama" />
                                  <input  type="text" name="nosurat" value="<?= $isi['nosurat']; ?>" class="form-control" placeholder="Masukan Nama" />
                                </div>
                              </div>
                              <div class="row">
                                    <div class="col mb-2">
                                    <label  class="form-label">Tanggal</label>
                                    <input  type="date" name="tanggal" id="tanggal" value="<?= $isi['tanggal']; ?>" class="form-control" placeholder="Masukan Nama" />
                                  </div>
                                </div>
                                  <div class="row">
                                  <div class="mb-2">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input name="nama" type="text" id="nama" value="<?= $isi['nama']; ?>" class="form-control" placeholder="Masukan NIP" />
                                     <!-- <select name="nama" onchange="isi_otomatis()" class="form-select" id="nama" aria-label="Default select example" required autofocus>
                                      <option selected disabled>PILIH NAMA</option> 
                                       

                                    //  include "koneksi.php";
                                    //  $query = mysqli_query($koneksi, "SELECT * FROM data_pegawai") or die(mysqli_error($koneksi));
                                    //  while($data = mysqli_fetch_array($query)){
                                    //   echo"<option value=$data[nama]> $data[nama]</option>";
                                    //  }
                                     
                                     
                                     
                                    </select>
                                     -->
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="nip"  class="form-label">NIP</label>
                                    <input name="nip" type="text" id="nip" value="<?= $isi['nip']; ?>" class="form-control" placeholder="Masukan NIP" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="pangkat" class="form-label">Pangkat</label>
                                    <input name="pangkat" type="text" id="pangkat" value="<?= $isi['pangkat']; ?>" class="form-control" placeholder="Masukan Pangkat" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <input name="jabatan" type="text" id="jabatan" value="<?= $isi['jabatan']; ?>" class="form-control" placeholder="Nama Jabatan" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="bidang" class="form-label">Bidang</label>
                                    <input name="bidang" type="text" id="bidang" value="<?= $isi['bidang']; ?>" class="form-control" placeholder="Nama Jabatan" />
                                  </div>
                                </div>
                                
                                <div class="row">
                                  <div class="col mb-2">
                                    <label  class="form-label">Tingkat Menurut Aturan</label>
                                    <input name="tingkatgolongan" type="text" id="tingkatgolongan" value="<?= $isi['tingkatgolongan']; ?>" class="form-control" placeholder="Nama Jabatan" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="dalamrangka"  class="form-label">Dalam Rangka</label>
                                    <textarea class="form-control" type="text" name="dalamrangka" value="<?= $isi['dalamrangka']; ?>" id="dalamrangka" rows="3"></textarea>
                                    
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="kendaraan" class="form-label">Kendaraan yang di pakai</label>
                                    <input name="kendaraan" type="text" id="kendaraan" value="<?= $isi['kendaraan']; ?>" class="form-control" placeholder="Nama Jabatan" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="tempatasal" class="form-label">Tempat Asal</label>
                                    <input name="tempatasal" type="text" id="tempatasal" value="<?= $isi['tempatasal']; ?>" class="form-control" placeholder="Nama Jabatan" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="tujuanpelaksanaan"  class="form-label">Tujuan</label>
                                    <input name="tujuanpelaksanaan" type="text" id="tujuanpelaksanaan"  value="<?= $isi['tujuanpelaksanaan']; ?>" class="form-control" placeholder="Tujuan Pelaksana Kegiatan" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="tgglpelaksana" class="form-label">Tanggal Pelaksanaan</label>
                                    <input name="tgglpelaksana" type="date" id="tgglpelaksana" value="<?= $isi['tgglpelaksana']; ?>" class="form-control" placeholder="Nama Jabatan" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="tanggalkembali"  class="form-label">Tanggal Kembali</label>
                                    <input name="tanggalkembali" type="date" id="tanggalkembali" value="<?= $isi['tanggalkembali']; ?>" class="form-control" placeholder="Nama Jabatan" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="totalpelaksanaan" class="form-label">Lama Kegiatan</label>
                                    <input name="totalpelaksanaan" type="text" id="totalpelaksanaan" value="<?= $isi['totalpelaksanaan']; ?>" class="form-control" placeholder="Nama Jabatan" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="subkegiatan"  class="form-label">Sub Kegiatan</label>
                                    
                                    <select name="subkegiatan" onchange="isi_otomatis()" class="form-select" value="<?= $isi['subkegiatan']; ?>" id="subkegiatan" aria-label="Default select example" required autofocus>
                                      <option selected disabled>PILIH NAMA</option> 
                                       
                                      <?php
                                      include "koneksi.php";
                                      $query = mysqli_query($koneksi, "SELECT * FROM kegiatan") or die(mysqli_error($koneksi));
                                      while ($data = mysqli_fetch_array($query)) {
                                        echo "<option value=$data[namakegiatan]> $data[namakegiatan]</option>";
                                      }

                                      ?>
                                     
                                    </select> 

                                    
                                  </div>
                                </div>
                                
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="instansi" class="form-label">Instansi</label>
                                    <input name="instansi" type="text" id="instansi" value="<?= $isi['instansi']; ?>" class="form-control" placeholder="Nama Jabatan" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="norek" class="form-label">Kode Anggaran</label>
                                    <input name="norek" type="text" id="norek" value="<?= $isi['norek']; ?>" class="form-control" placeholder="Nama Jabatan" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="pptk" class="form-label">PPTK</label>
                                    <input name="pptk" type="text" id="pptk" value="<?= $isi['pptk']; ?>" class="form-control" placeholder="Nama Jabatan" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="nippptk" class="form-label">NIP</label>
                                    <input name="nippptk" type="text" id="nippptk" value="<?= $isi['nippptk']; ?>" class="form-control" placeholder="Nama Jabatan" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-2">
                                    <label for="pangkatpptk" class="form-label">Pangkat</label>
                                    <input name="pangkatpptk" type="text" id="pangkatpptk" value="<?= $isi['pangkatpptk']; ?>" class="form-control" placeholder="Nama Jabatan" />
                                  </div>
                                
                              <!-- koneksi edit data  -->
                                  <?php
                                  include "koneksi.php";
                                  if (isset($_POST['edit'])) {
                                    $id = $_POST['idsppd'];
                                    $nosurat = $_POST['nosurat'];
                                    $tanggal = $_POST['tanggal'];
                                    $nama = $_POST['nama'];
                                    $nip = $_POST['nip'];
                                    $pangkat = $_POST['pangkat'];
                                    $jabatan = $_POST['jabatan'];
                                    $bidang = $_POST['bidang'];
                                    $tingkatgolongan = $_POST['tingkatgolongan'];
                                    $dalamrangka = $_POST['dalamrangka'];
                                    $kendaraan = $_POST['kendaraan'];
                                    $tempatasal = $_POST['tempatasal'];
                                    $tujuanpelaksanaan = $_POST['tujuanpelaksanaan'];
                                    $tgglpelaksana = $_POST['tgglpelaksana'];
                                    $tanggalkembali = $_POST['tanggalkembali'];
                                    $totalpelaksanaan = $_POST['totalpelaksanaan'];
                                    $subkegiatan = $_POST['subkegiatan'];
                                    $instansi = $_POST['instansi'];
                                    $norek = $_POST['norek'];
                                    $pptk = $_POST['pptk'];
                                    $nippptk = $_POST['nippptk'];
                                    $pangkatpptk = $_POST['pangkatpptk'];

                                    $edit = mysqli_query($koneksi, "UPDATE listsppd SET 
                                          nosurat='$nosurat',
                                          tanggal='$tanggal',
                                          nama='$nama',
                                          nip='$nip',
                                          pangkat='$pangkat',
                                          jabatan='$jabatan', 
                                          bidang='$bidang', 
                                          tingkatgolongan='$tingkatgolongan',
                                          dalamrangka='$dalamrangka',
                                          kendaraan='$kendaraan',
                                          tempatasal='$tempatasal', 
                                          tujuanpelaksanaan='$tujuanpelaksanaan',
                                          tgglpelaksana='$tgglpelaksana',
                                          tanggalkembali='$tanggalkembali',
                                          totalpelaksanaan='$totalpelaksanaan', 
                                          subkegiatan='$subkegiatan',
                                          instansi='$instansi',
                                          norek='$norek',
                                          pptk='$pptk', 
                                          nippptk='$nippptk', 
                                          pangkatpptk='$pangkatpptk' WHERE idsppd=" . $id);

                                    if ($edit) {
                                      echo "<script> alert('Data Berhasil di Edit');
                                              document.location.href='listsppd.php';</script>";
                                    } else {
                                      echo "<script> alert('Data Gagal di Edit');</script";
                                    }
                                  }
                                  ?>   
                                      
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                              <button  type="submit" name="edit" class="btn btn-primary" id="simpan">Edit</button>

                            </div>
                            
                            </form>   
                            
                          </div>
                          
                        </div>
                        
                      </div>
                    </div>
                    
                  </div>
                      
              <!-- Modals tutup  -->
                        <!-- akhir edit data -->
                        
                        <!-- Masuk Hapus Pegawai -->
                        
                        <a href="hapussppd.php?idsppd=<?= $isi['idsppd'] ?>" onclick="return confirm('Apakah Nama Pegawai ini Mau di Hapus?')"   class="btn btn-danger">Hapus</a>
                        
                      </div>
                      </td>
                        <td><?php echo $isi['nosurat']; ?></td>
                        <td><?php echo $isi['tanggal']; ?></td>
                        <td><?php echo $isi['nama']; ?></td>
                        <td><?php echo $isi['nip']; ?></td>
                        <td><?php echo $isi['pangkat']; ?></td>
                        <td><?php echo $isi['jabatan']; ?></td>
                        <td><?php echo $isi['bidang']; ?></td>  
                        <td><?php echo $isi['tingkatgolongan']; ?></td>
                        <td><?php echo $isi['dalamrangka']; ?></td>
                        <td><?php echo $isi['kendaraan']; ?></td>
                        <td><?php echo $isi['tempatasal']; ?></td>
                        <td><?php echo $isi['tujuanpelaksanaan']; ?></td>
                        <td><?php echo $isi['tgglpelaksana']; ?></td>
                        <td><?php echo $isi['tanggalkembali']; ?></td>
                        <td><?php echo $isi['totalpelaksanaan']; ?></td>
                        <td><?php echo $isi['subkegiatan']; ?></td>
                        <td><?php echo $isi['instansi']; ?></td>
                        <td><?php echo $isi['norek']; ?></td>
                        <td><?php echo $isi['pptk']; ?></td>
                        <td><?php echo $isi['nippptk']; ?></td>
                        <td><?php echo $isi['pangkatpptk']; ?></td>
                       
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