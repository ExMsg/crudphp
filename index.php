<?php
include_once 'Controller/Config/Connection.php';
include_once 'Controller/Layout/Header.php';    
?>
<nav class="navbar bg-dark navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="?"><span class="text-info">CRUD</span> Biodata Mahasiswa</a>
  </div>
</nav>
<?php
      $p = @$_GET['p'];
      switch ($p) {

        case 'Ubah':
          include_once 'Pages/Ubah.php';
          break;

        case 'Detail':
          include_once 'Pages/Detail.php';
          break;

        case 'Hapus':
          include_once 'Pages/Hapus.php';
          break;

        default:
            include_once 'Pages/Lihat.php';
            break;
      }
include_once 'Controller/Layout/Footer.php';
?>