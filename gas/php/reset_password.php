<?php
include_once("koneksi.php");

error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
    // Ambil data dari formulir
    $username_email = $_POST['username_email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Periksa koneksi
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    // Membuat query untuk memperbarui password pengguna berdasarkan username atau email
    $sql = "UPDATE pengguna SET password = '$new_password' WHERE username = '$username_email' OR email = '$username_email'";

    if ($koneksi->query($sql) === true) {
        echo "Password berhasil diubah!";
        // Redirect ke halaman lain jika diperlukan
        // header("Location: halaman_berikutnya.php");
        // exit();
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
    <title>Gayatri Art Studiio</title>
    <link rel="website icon" type="png" href="Mitra_GAS.png" sizes="any" />
    <link rel="stylesheet" href="style.css" />

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
      <form onsubmit="return Validateform()">
        <div class="container-forgot-password">
          <table>
            <tr>
              <td>
                <div class="top_header">
                  <span>LUPA PASSWORD</span>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="input-field">
                  <label>Username/Email</label>
                  <!--<i data-feather="user"></i>-->
                  <input
                    type="text"
                    class="input"
                    placeholder="Masukkan Username/Email"
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
                    placeholder="Masukkan Password Baru"
                    required
                  />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <!--KONFIRMASI PASSWORD-->
                <div class="input-field">
                  <input
                    id="password"
                    type="password"
                    class="input"
                    placeholder="Konfirmasi Password"
                    required
                  />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="input-field">
                  <input type="submit" class="submit" value="SUBMIT" required />
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
