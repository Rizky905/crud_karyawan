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
                    <input type="hidden" name="id" value="<?= $karyawan["nik"]; ?>" />
                </div>
                <div class="form-group mt-5">
                    <label for="nama">Nama Karyawan</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $karyawan["nama"]; ?>" />
                </div>
                <div class="form-group mt-2">
                    <label for="skill">Skill Karyawan</label>
                    <input type="text" class="form-control" name="skill" id="skill" value="<?= $karyawan["skill"]; ?>" />
                </div>
                <div class="form-group mt-4">
                    <label for="foto">Upload foto</label>
                    <input type="file" class="form-control-file" name="foto" id="foto" value="<?= $karyawan["foto"]; ?>" />
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-dark" type="submit" name="submit">Simpan</button>
                </div>
            </section>
        </form>
    </div>
</body>

</html>