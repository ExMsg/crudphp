<?php include_once 'Controller/Config/Connection.php';

if (isset($_POST["action"])) {
    if ($_POST["action"] == "insert") {
        insert();
    }
}

function insert() {
        global $Mahasiswa;
        $ID = $_POST['id'];
        $Nim = $_POST['nim'];
        $Nama = $_POST['nama'];
        $Prodi = $_POST['prodi'];
        $JenisKelamin = $_POST['jenisKelamin'];
        $NoTelp = $_POST['notelp'];

        $Mahasiswa->Tambah($ID, $Nim, $Nama, $Prodi, $JenisKelamin, $NoTelp);
        print "Data berhasil ditambahkan !";
}
?>