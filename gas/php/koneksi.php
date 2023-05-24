<?php
$koneksi = new mysqli("localhost", "root", "", "gas");

// Check connection
if ($koneksi -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
?>