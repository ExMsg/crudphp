<?php 

$Host = "127.0.0.1"; // Host database -> default : localhost / 127.0.0.1
$Username = "root"; // Username database -> default : root
$Password = ""; // Password database -> default : null / kosong
$Database = "mahasiswa"; // Nama database, isi sesuai dengan nama database kalian

try
{
    // Buat koneksi ke database
    $Dbh = new PDO("mysql:host=$Host;dbname=$Database", $Username, $Password);

    // Set Error mode
    $Dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e)
{

    // Print detail error jika ada kesahalan koneksi kedatabase
    print "Gagal terhubung ke database atau kesalahan pada query anda : " .  $e->getMessage() . "<br>";
    die();
    
}

// Mengdeklarasi Class Mahasiswa
include_once "Controller/Class.Mahasiswa.php";
$Mahasiswa = new Mahasiswa($Dbh);
?>