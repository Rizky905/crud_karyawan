<?php
require 'function.php';

$nik = $_GET["nik"];

$karyawan = query("SELECT * FROM datakaryawan WHERE nik = $nik")[0];

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "<script>alert('Data berhasil diubah.');
        window.location='index.php';</script>";
    } else {
        die("Query gagal dijalankan: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Update data</title>
</head>

<body>
    <div class="container-lg">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">HOME</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="index.php">Data Karyawan <span class="sr-only"></span></a>
                    <a class="nav-link" href="tambah.php">Tambah Data</a>
                </div>
            </div>
        </nav>

        <h1 class="mt-4">Update data karyawan</h1>

        <form method="POST" enctype="multipart/form-data">
            <section class="base">
                <div class="form-group mt-5">
                    <input type="hidden" name="nik" value="<?= $karyawan["nik"]; ?>" />
                </div>
                <div class="form-group mt-5">
                    <label for="nama">Nama Karyawan</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $karyawan["nama"]; ?>" />
                </div>
                <div class="form-group mt-2">
                    <label for="skill">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" <?= $karyawan["nik"]; ?> />
                </div>
                <div class="form-group mt-2">
                    <label for="skill">Email</label>
                    <input type="text" class="form-control" name="email" id="email" <?= $karyawan["email"]; ?> />
                </div>
                <div class="form-group mt-2">
                    <label for="skill">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempatlahir" id="tempatlahir" <?= $karyawan["tempatlahir"]; ?> />
                </div>
                <div class="form-group mt-2">
                    <label for="skill">Tanggal Lahir</label>
                    <input type="text" class="form-control" name="tgllahir" id="tgllahir" <?= $karyawan["tgllahir"]; ?> />
                </div>
                <div class="form-group mt-2">
                    <label for="skill">Gender</label>
                    <input type="text" class="form-control" name="gender" id="gender" <?= $karyawan["gender"]; ?> />
                </div>
                <div class="form-group mt-2">
                    <label for="skill">Keahlian</label>
                    <input type="text" class="form-control" name="keahlian" id="keahlian" <?= $karyawan["keahlian"]; ?> />
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-dark" type="submit" name="submit">Simpan</button>
                </div>
            </section>
        </form>
    </div>
</body>

</html>