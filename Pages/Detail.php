<?php 
if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    $Query = $Dbh->prepare("SELECT * FROM mahasiswa WHERE ID = :ID");
    $Query->bindParam(":ID", $ID);
    $Query->execute();
    if ($Query->rowCount() > 0) {
        $Data = $Query->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="container">
            <div class="row mt-5">
                <div class="col-12">
                    <h1>Detail Mahasiswa</h1>
                    <hr class="w-25">
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12">
                    <a href="?" class="btn btn-danger float-end">
                        <i class="fa-solid fa-arrow-left"></i>
                        Kembali
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-detail">
                        <tr align="left p-5">
                            <td>Kode Mahasiswa</td>
                            <td>:</td>
                            <td><?=$Data['ID']?></td>
                        </tr>
                        <tr align="left">
                            <td>Nim Mahasiswa</td>
                            <td>:</td>
                            <td><?=$Data['Nim']?></td>
                        </tr>
                        <tr align="left">
                            <td>Nama Mahasiswa</td>
                            <td>:</td>
                            <td><?=$Data['Nama']?></td>
                        </tr>
                        <tr align="left">
                            <td>Prodi Mahasiswa</td>
                            <td>:</td>
                            <td><?=$Data['Prodi']?></td>
                        </tr>
                        <tr align="left">
                            <td>Nim Mahasiswa</td>
                            <td>:</td>
                            <td><?=$Data['Nim']?></td>
                        </tr>
                        <tr align="left">
                            <td>Jenis Kelamin Mahasiswa</td>
                            <td>:</td>
                            <td><?=$Data['Jenis_Kelamin']?></td>
                        </tr>
                        <tr align="left">
                            <td>No. Telephone Mahasiswa</td>
                            <td>:</td>
                            <td><?=$Data['Telephone']?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <?php
    } else {
        print "<script>alert('Tidak ada data yang ditampilkan !')</script>";
        header("Location: index.php");
    }
}
?>