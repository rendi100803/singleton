<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Mahasiswa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container p-3 mx-auto">
        <div class="w-full mb-2 mx-auto rounded overflow-hidden shadow-lg bg-white">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Data Mahasiswa</div>
                <p class="text-gray-700 text-base">
                <p>Nama: Rendi Hidayat</p>
                <p>Kelas: D4RPL2B</p>
                <p>Prodi: Rekayasa Perangkat Lunak</p>
                <p>Matkul: Desain Perangkat Lunak 2</p>
                </p>
            </div>
        </div>
        <?php
        require_once 'Database.php';
        require_once 'Mahasiswa.php';

        $mahasiswa = new Mahasiswa();

        if (isset($_POST['create'])) {
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $prodi = $_POST['prodi'];
            $mahasiswa->createMahasiswa($nim, $nama, $prodi);
        }

        if (isset($_POST['update'])) {
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $prodi = $_POST['prodi'];
            $mahasiswa->updateMahasiswa($nim, $nama, $prodi);
        }

        if (isset($_POST['read'])) {
            $nim = $_POST['nim'];
            $mahasiswa->readMahasiswa($nim);
        }

        if (isset($_POST['delete'])) {
            $nim = $_POST['nim'];
            $mahasiswa->deleteMahasiswa($nim);
        }
        ?>
            <div class="w-full mx-auto bg-white p-6 rounded-lg shadow-xl">
                <h1 class="text-3xl mb-6">CRUD Mahasiswa</h1>
                <form method="post">
                    <div class="mb-4">
                        <label for="nim" class="block text-gray-700">NIM:</label>
                        <input type="text" id="nim" name="nim" class="w-full rounded border-gray-300">
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700">Nama:</label>
                        <input type="text" id="nama" name="nama" class="w-full rounded border-gray-300">
                    </div>
                    <div class="mb-4">
                        <label for="prodi" class="block text-gray-700">prodi:</label>
                        <input type="text" id="prodi" name="prodi" class="w-full rounded border-gray-300">
                    </div>
                    <div class="mb-4">
                        <input type="submit" name="create" value="Tambah" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <input type="submit" name="update" value="Perbarui" class="cursor-pointer bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        <input type="submit" name="read" value="Baca" class="cursor-pointer bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        <input type="submit" name="delete" value="Hapus" class="cursor-pointer bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
