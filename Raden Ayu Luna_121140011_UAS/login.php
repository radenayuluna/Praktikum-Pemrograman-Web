<?php
include 'koneksi_database.php';
if(isset($_SESSION['admin'])){
    header("location:index.php");
}
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    if ($username == "" && $password == "") {
      echo"<script>alert('jangan konsongkan form input silahkan login ulang'); document.location = 'login.php';</script>";
    }elseif ($username == "") {
      echo"<script>alert('username kosong silahkan login ulang'); document.location = 'login.php';</script>";
    }elseif($password == ""){
      echo"<script>alert('password kosong silahkan login ulang'); document.location = 'login.php';</script>";
    }else {
      $login = mysqli_query($db, "SELECT * FROM admin where username='$username' AND password='$password'");
      if (mysqli_num_rows($login)) {
          $_SESSION['admin'] = mysqli_fetch_array($login);
          echo"<script>alert('login berhasil'); document.location = 'index.php';</script>";
      }else {
        echo"<script>alert('input yg anda masukan salah silahkan coba lagi'); document.location = 'login.php';</script>";
    }
  }
}elseif (isset($_POST['register'])) {
    $nama= $_POST['nama'];
    $username= $_POST['username'];
    $password= sha1($_POST['password']);

    $admin = mysqli_query($db,"SELECT * FROM admin");
    $data = mysqli_fetch_array($admin);

    if ($nama == "" || $username == "" || $password == "") {
        echo"<script>alert('jangan konsongkan form input silahkan login ulang');</script>";
    }else{
        if ($username != $data['username']) {
        mysqli_query($db, "INSERT INTO admin(nama, username, password) VALUES ('$nama','$username','$password')");
        echo"<script>alert('Registrasi Akun Berhasil'); document.location = 'login.php';</script>";
        
        }else {
            echo"<script>alert('username sudah digunakan silahkan registrasi ulang'); document.location = 'login.php';</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.jpg" type="image/png">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="post" enctype="multipart/form-data" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password"/>
            </div>
            <input type="submit" value="Login" class="btn solid" name="login"/>
          </form>
          <form method="post" enctype="multipart/form-data" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Nama" name="nama"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" placeholder="Username" name="username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password"/>
            </div>
            <input type="submit" class="btn" value="Sign up" name="register"/>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Klik button dibawah apabila belum mempunyai akun
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Sign In ?</h3>
            <p>
              Klik button di bawah apabila telah memiliki akun.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>
  <script>
    const sign_in_btn = document.querySelector("#sign-in-btn");
    const sign_up_btn = document.querySelector("#sign-up-btn");
    const container = document.querySelector(".container");

    sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
    });

    sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
    });
  </script>
</div>
</body>
</html>


