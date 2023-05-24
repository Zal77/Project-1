<?php
include_once("koneksi.php");

error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
    // Ambil data dari formulir
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Lakukan validasi atau pemrosesan data lainnya sesuai kebutuhan);

    // Periksa koneksi
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    // Membuat query untuk menyimpan data ke tabel pengguna
    $sql = "INSERT INTO user (nama_pelanggan, email, username, password) VALUES ('$nama_pelanggan', '$email', '$username', '$password')";

    if ($koneksi->query($sql) === true) {
        echo "Registrasi berhasil!";
        header("Location: login.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . $sql . "<br>" . $koneksi->error;
    }

    // Menutup koneksi ke database
    $koneksi->close();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="website icon" type="png" href="Mitra_GAS.png" sizes="any" />
    <link rel="stylesheet" href="style.css" />
    <title>Gayatri Art Studiio</title>

    <!--FONT GOOGLE-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="box">
      <form action="" method="POST">
        <div class="container-signup">
          <div class="table-head">
            <table border="2">
              <tr>
                <td>
                    <span>CREATE ACCOUNT</span>
                  </div>
                </td>
              </tr>
            </table>
          </div>
          <table border="2">
            <tr>
              <td>
                <div class="input-field">
                  <label>Nama Lengkap</label>
                  <!--<i data-feather="user"></i>-->
                  <input
                    type="text"
                    class="input"
                    name="nama_pelanggan"
                    placeholder="Masukkan Nama Lengkap"
                    required
                  />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="input-field">
                  <label>Email</label>
                  <!--<i data-feather="user"></i>-->
                  <input
                    type="text"
                    class="input"
                    name="email"
                    placeholder="Masukkan Username/Email"
                    required
                  />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="input-field">
                  <label>Username</label>
                  <!--<i data-feather="user"></i>-->
                  <input
                    type="text"
                    class="input"
                    name="username"
                    placeholder="Username"
                    required
                  />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="input-field">
                  <label for="password">Password</label>
                  <input
                    id="password"
                    type="password"
                    class="input"
                    name="password"
                    placeholder="Masukkan Password"
                    required
                  />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="bottom">
                  <div class="left">
                    <a href="Login.php">Do you Have Account?</a>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="input-field">
                    <button type="submit" name="submit" class="submit">SUBMIT</button>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </form>
    </div>
    <script src="script.js"></script>
    <!--feather icon-->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  </body>
</html>
