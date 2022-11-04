<?php
if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    $Exec = $Mahasiswa->Hapus($ID);
    if ($Exec) {
        print "<script>
                alert('Data berhasil dihapus ! dengan ID : $ID');
                window.location.href = 'index.php';
               </script>";
    }
}
?>