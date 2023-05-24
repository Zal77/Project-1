<?php
include_once("koneksi.php");

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.html");
}
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
 
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        header("Location: index.html");
        exit();
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
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
      <form action="" method="POST">
        <div class="container-login">
          <div class="table-head">
            <table>
              <tr>
                <td>
                  <div class="top_header">
                    <span>LOGIN ACCOUNT</span>
                  </div>
                </td>
              </tr>
            </table>
          </div>
          <table>
            <tr>
              <td colspan="2">
                <div class="input-field">
                  <label>Username</label>
                  <input
                    type="text"
                    class="input"
                    name="username"
                    placeholder="Masukkan Username"
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
                  <br />
                  <button id="tombol" type="button">
                    <i data-feather="eye"></i>
                  </button>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <div class="bottom">
                  <div class="left">
                    <a href="/php/register.php">Create Account</a>
                  </div>
                  <div class="right">
                    <a href="/php/reset_password.php"> Forgot Password?</a>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <div class="input-field">
                  <!--<input type="submit" name="SUBMIT" class="submit" value="SUBMIT" required />-->
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
