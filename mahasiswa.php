<?php

class Mahasiswa
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function createMahasiswa($nim, $nama, $prodi)
    {
        if (empty($nim) || empty($nama) || empty($prodi)) {
            echo '<div class="mb-2 w-full rounded overflow-hidden shadow-lg bg-red-100">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Error!</div>
                <p class="text-gray-700 text-base">
                    Mohon lengkapi semua data.
                </p>
            </div>
        </div>';
            return;
        }

        $sql = "INSERT INTO datamahasiswa (nim, nama, prodi) VALUES ('$nim', '$nama', '$prodi')";
        if ($this->db->query($sql) === TRUE) {
            echo '<div class="mb-2 w-full rounded overflow-hidden shadow-lg bg-blue-100">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Sukses!</div>
                <p class="text-gray-700 text-base">
                    Data mahasiswa berhasil ditambahkan.
                </p>
            </div>
        </div>';
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error;
        }
    }

    public function readMahasiswa($nim)
    {
        $sql = "SELECT * FROM datamahasiwa WHERE nim='$nim'";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="mb-2 w-full rounded overflow-hidden shadow-lg bg-yellow-100">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Read!</div>
                <p class="text-gray-700 text-base">
                NIM: ' . $row['nim'] . ' - Nama: ' . $row['nama'] . ' - prodi: ' . $row['prodi'] . '<br>
                </p>
            </div>
        </div>';
            }
        } else {
            echo '<div class="mb-2 w-full rounded overflow-hidden shadow-lg bg-red-100">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Error!</div>
                <p class="text-gray-700 text-base">
                Data mahasiswa tidak ditemukan.
                </p>
            </div>
        </div>';
        }
    }

    public function updateMahasiswa($nim, $nama, $prodi)
    {
        $sql = "UPDATE datamahasiswa SET nama='$nama', prodi='$prodi' WHERE nim='$nim'";
        if ($this->db->query($sql) === TRUE) {
            echo '<div class="mb-2 w-full rounded overflow-hidden shadow-lg bg-green-100">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Sukses!</div>
                <p class="text-gray-700 text-base">
                Data mahasiswa berhasil diperbarui.
                </p>
            </div>
        </div>';
        } else {
            echo "Error updating record: " . $this->db->error;
        }
    }

    public function deleteMahasiswa($nim)
    {
        $sql = "DELETE FROM datamahasiswa WHERE nim='$nim'";
        if ($this->db->query($sql) === TRUE) {
            echo '<div class="mb-2 w-full rounded overflow-hidden shadow-lg bg-red-100">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Sukses!</div>
                <p class="text-gray-700 text-base">
                Data mahasiswa berhasil dihapus.
                </p>
            </div>
        </div>';
        } else {
            echo "Error deleting record: " . $this->db->error;
        }
    }
}