<div class="container">
    <div class="content mb-5">
        <div class="row mb-3">
            <div class="col-12">
                <h1>Data Mahasiswa</h1>
                <hr class="w-25">
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12">
                <button class="float-end btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Mahasiswa
                </button>
            </div>
        </div>
        <div class="row data-table">
            <div class="col-md-12">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Jenis Kelamin</th>
                        <th>Telephone</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?=$Mahasiswa->TampilData(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Mahasiswa -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Mahasiswa</h1>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="form-data">
                    <div class="mb-3">
                        <label for="IDMahasiswa">
                            Kode Mahasiswa
                        </label>
                        <input type="text" name="ID" id="IDMahasiswa" class="form-control" value="<?=$Mahasiswa->KodeOtomatis();?>" required disabled>
                    </div>
                    <div class="mb-3">
                        <label for="NimMahasiswa">
                            Nim
                        </label>
                        <input type="text" name="Nim" id="NimMahasiswa" class="form-control" required autocomplete="off" maxlength="35" placeholder="Masukan nim anda...">
                    </div>
                    <div class="mb-3">
                        <label for="NamaMahasiswa">
                            Nama
                        </label>
                        <input type="text" name="Nama" id="NamaMahasiswa" class="form-control" required autocomplete="off" maxlength="35" placeholder="Masukan nama anda...">
                    </div>
                    <div class="mb-3">
                        <label for="ProdiMahasiswa">
                            Prodi
                        </label>
                        <select name="Prodi" id="ProdiMahasiswa" class="form-select" required>
                            <option selected>-- Pilih program studi anda --</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Manajemen Informatika">Manajemen Informatika</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="JenisKelaminMahasiswa">
                            Jenis Kelamin
                        </label>
                        <select name="Jenis_Kelamin" id="JenisKelaminMahasiswa" class="form-select" required>
                            <option selected>-- Pilih jenis kelamin anda --</option>
                            <option value="Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="TelpMahasiswa">
                            No. Telephone
                        </label>
                        <input type="tel" name="Telp" id="TelpMahasiswa" class="form-control" required autocomplete="off" placeholder="Masukan No.Telp anda..." aria-describedby="TelpMahasiswaContoh">
                        <div id="TelpMahasiswaContoh" class="form-text">
                            Format No.Telephone harus seperti ini : 0812-3456-7890
                        </div>
                    </div>
                    <button class="btn btn-md btn-success float-end" onclick="submitData('insert');">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Tambah Mahasiswa -->