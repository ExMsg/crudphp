<?php
if (isset($_GET['ID'])) {
    $Query = $Dbh->query("SELECT * FROM mahasiswa WHERE ID = '$_GET[ID]'");
    $Data = $Query->fetch(PDO::FETCH_ASSOC);
}
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <h1>Ubah Data Siswa</h1>
            <hr class="w-25">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button class="btn btn-danger float-end" onclick="window.location.href = '?'">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali
            </button>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-6 mx-auto">
            <form method="POST">
                <div class="mb-3">
                    <label for="IDMahasiswa">
                        Kode Mahasiswa
                    </label>
                    <input type="text" name="ID" id="IDMahasiswa" class="form-control" value="<?=$Data['ID']?>" required disabled>
                </div>
                <div class="mb-3">
                    <label for="NimMahasiswa">
                        Nim
                    </label>
                    <input type="text" name="Nim" id="NimMahasiswa" class="form-control" required autocomplete="off" maxlength="35" placeholder="Masukan nim anda..." value="<?=$Data['Nim']?>">
                </div>
                <div class="mb-3">
                    <label for="NamaMahasiswa">
                        Nama
                    </label>
                    <input type="text" name="Nama" id="NamaMahasiswa" class="form-control" required autocomplete="off" maxlength="35" placeholder="Masukan nama anda..." value="<?=$Data['Nama']?>">
                </div>
                <div class="mb-3">
                    <label for="ProdiMahasiswa">
                        Prodi
                    </label>
                    <select name="Prodi" id="ProdiMahasiswa" class="form-select" required>
                        <option <?php if ($Data['Prodi'] == '') print "selected"; ?>>-- Pilih program studi anda --</option>
                        <option value="Sistem Informasi" <?php if ($Data['Prodi'] == 'Sistem Informasi') print "selected"; ?>>Sistem Informasi</option>
                        <option value="Manajemen Informatika" <?php if ($Data['Prodi'] == 'Manajemen Informatika') print "selected"; ?>>Manajemen Informatika</option>
                        <option value="Teknik Informatika" <?php if ($Data['Prodi'] == 'Teknik Informatika') print "selected"; ?>>Teknik Informatika</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="JenisKelaminMahasiswa">
                        Jenis Kelamin
                    </label>
                    <select name="Jenis_Kelamin" id="JenisKelaminMahasiswa" class="form-select" required>
                        <option <?php if ($Data['Jenis_Kelamin'] == '') print "selected"; ?>>-- Pilih jenis kelamin anda --</option>
                        <option value="Laki" <?php if ($Data['Jenis_Kelamin'] == 'Laki') print "selected"; ?>>Laki - Laki</option>
                        <option value="Perempuan" <?php if ($Data['Jenis_Kelamin'] == 'Perempuan') print "selected"; ?>>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="TelpMahasiswa">
                        No. Telephone
                    </label>
                    <input type="tel" name="Telp" id="TelpMahasiswa" class="form-control" required autocomplete="off" placeholder="Masukan No.Telp anda..." aria-describedby="TelpMahasiswaContoh" value="<?=$Data['Telephone']?>">
                    <div id="TelpMahasiswaContoh" class="form-text">
                        Format No.Telephone harus seperti ini : 0812-3456-7890
                    </div>
                </div>
                <input type="submit" class="btn btn-md btn-warning float-end btn-block w-100" name="update">
            </form>
        </div>
    </div>
</div>
<?php 

@$ID = $_POST['ID'];
@$Nim = $_POST['Nim'];
@$Nama = $_POST['Nama'];
@$Prodi = $_POST['Prodi'];
@$JenisKelamin = $_POST['Jenis_Kelamin'];
@$Telephone = $_POST['Telp'];

if (isset($_POST['update'])) {

    $myQuery = "UPDATE mahasiswa SET Nim = '$Nim',
                                     Nama = '$Nama',
                                     Prodi = '$Prodi',
                                     Jenis_Kelamin = '$JenisKelamin',
                                     Telephone = '$Telephone' WHERE ID = '$_GET[ID]'";
    $Posts = $Dbh->exec($myQuery);
    if ($Posts) {
        print "<script>alert('Data berhasil diupdate !');
        window.location.href = 'index.php';
        </script>";
    }
}
?>