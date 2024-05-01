<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>ESPJ-KU</title>
    
</head>
<body>
    <div class="login-container">

        <h2>LOGIN</h2>
        <?php
include 'koneksi.php';

if (isset($_POST['login'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $query = mysqli_query($koneksi,"SELECT * FROM userlogin WHERE username='$user' AND password='$pass' ");
    $data = mysqli_fetch_array($query);
    $cekdata = mysqli_num_rows($query);

    if ($cekdata > 0){
    if ($data['level']=="ADMIN") {
        // echo "Anda Seorang ADMIN";
    // Pengarahan Lokasi Admin
        $_SESSION['username'] = $user;
        $_SESSION['level'] = "ADMIN";
        header('location:html/admin.php');

    }elseif ($data['level']=="OPERATOR") {
        // echo "Anda Seorang Operator";
        $_SESSION['username'] = $user;
        $_SESSION['level'] = "OPERATOR";
        header('location:html2/operator.php');
    }
    }else{
        echo "Login Gagal";
    }
}
?>
        <form class="login-form" action="#" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login" class="btn btn-block btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
