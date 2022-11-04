<?php

class Mahasiswa {
    
    // public variable
    public $db;


    // Construct databases
    function __construct($db)
    {
        return $this->db = $db;
    }


    // Function untuk mengenerate kode otomatis pada input field tambah mahasiswa
    public function KodeOtomatis()
    {
        try 
        {
            $Query = $this->db->prepare("SELECT MAX(ID) AS KodeTerbesar FROM mahasiswa");
            $Query->execute();
            $Data = $Query->fetch(PDO::FETCH_ASSOC);
            $KodeMahasiswa = $Data['KodeTerbesar'];
            $Urutan = (int) substr($KodeMahasiswa, 3, 3);
            $Urutan++;
            $Huruf = "MHS";
            return $KodeMahasiswa = $Huruf . sprintf("%03s", $Urutan);
        } catch (PDOException $e)
        {
            return $e->getMessage();
        }
    }

    // Function untuk menambah data mahasiswa ke database
    public function Tambah($ID, $Nim, $Nama, $Prodi, $JenisKelamin, $Telephone)
    {
        try
        {
            $Query = $this->db->prepare("INSERT INTO mahasiswa VALUES (:ID, :Nim, :Nama, :Prodi, :Jenis_Kelamin, :Telephone)");
            $Query->bindParam(":ID", $ID);
            $Query->bindParam(":Nim", $Nim);
            $Query->bindParam(":Nama", $Nama);
            $Query->bindParam(":Prodi", $Prodi);
            $Query->bindParam(":Jenis_Kelamin", $JenisKelamin);
            $Query->bindParam(":Telephone", $Telephone);
            $Query->execute();
            return true;
        } catch (PDOException $e)
        {
            return $e->getMessage();
        }
    }

    // Function untuk mengubah data mahasiswa ke database
    public function Ubah($ID, $Nim, $Nama, $Prodi, $JenisKelamin, $Telephone)
    {
        try
        {
            $Query = $this->db->prepare("UPDATE mahasiswa SET Nim = :Nim,
                                                              Nama = :Nama,
                                                              Prodi = :Prodi,
                                                              Jenis_Kelamin = :Jenis_Kelamin,
                                                              Telephone = :Telephone WHERE ID = :ID");
            $Query->bindParam(":Nim", $Nim);
            $Query->bindParam(":Nama", $Nama);
            $Query->bindParam(":Prodi", $Prodi);
            $Query->bindParam(":Jenis_Kelamin", $JenisKelamin);
            $Query->bindParam(":Telephone", $Telephone);
            $Query->bindParam(":ID", $ID);
            $Query->execute();
            return true;
        } catch (PDOException $e)
        {
            return $e->getMessage();
        }
    }

    public function Hapus($ID)
    {
        try
        {
            $Query = $this->db->prepare("DELETE FROM mahasiswa WHERE ID = :ID");
            $Query->bindParam(":ID", $ID);
            $Query->execute();
            return true;
        } catch (PDOException $e)
        {
            return $e->getMessage();
        }
    }

    // Funtion untuk menampilkan data di table
    public function TampilData()
    {
        try
        {
            $Query = $this->db->prepare("SELECT * FROM mahasiswa");
            $Query->execute();
            if ($Query->rowCount() > 0)
            {
                $No = 1;
                foreach ($Query as $Data) {
                ?>
                    <tr>
                        <td><?=$No++?></td>
                        <td><?=$Data['ID']?></td>
                        <td><?=$Data['Nim']?></td>
                        <td><?=$Data['Nama']?></td>
                        <td><?=$Data['Prodi']?></td>
                        <td>
                            <?php 
                            if ($Data['Jenis_Kelamin'] == 'Laki')
                            {
                                print "Laki - Laki";
                            } else {
                                print $Data['Jenis_Kelamin'];
                            }
                            ?>
                        </td>
                        <td><?=$Data['Telephone']?></td>
                        <td align="center">
                            <div class="dropdown">
                                <a href="#" class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Menu Aksi
                                </a>
                                <ul class="dropdown-menu" id="dropdown">
                                    <li>
                                        <a href="?p=Detail&ID=<?=$Data['ID']?>" type="button" class="dropdown-item">
                                            <i class="fa-solid fa-circle-info text-info"></i>
                                            Detail
                                        </a>
                                    </li>
                                    <li>
                                        <a href="?p=Ubah&ID=<?=$Data['ID']?>" class="dropdown-item">
                                            <i class="fa-solid fa-pen-to-square text-warning"></i>
                                            Ubah
                                        </a>
                                    </li>
                                    <li>
                                        <button type="button" onclick="if (confirm('Apakah anda yakin ingin menghapus data ini ?')) window.location.href = '?p=Hapus&ID=<?=$Data['ID']?>' " class="dropdown-item">
                                            <i class="fa-solid fa-trash text-danger"></i>
                                            Hapus
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php
                }
            } else 
            {
            ?>    
                <td colspan="8" align="center">Tidak ada data yang ditampilkan</td>
            <?php
            }
        } catch (PDOException $e)
        {
            return $e->getMessage();
        }
    }

}

?>