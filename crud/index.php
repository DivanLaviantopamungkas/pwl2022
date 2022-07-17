<!DOCTYPE html>
<html>

<head>
    <title>NGGOTA KARANG TARUNA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootsrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- CSS Internal -->
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Karang Taruna</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#home">Home</a>
                    <a class="nav-link " aria-current="page" href="#about">About</a>
                    <a class="nav-link " aria-current="page" href="#projects">Projects</a>
                    <a class="nav-link " aria-current="page" href="#contact">Contact</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container text-center">
        <br>
        <h4>ANGGOTA KARANG TARUNA</h4>
        <?php
        include "koneksi.php";

        //cek apakah ada nilai dari method GET dengan nama id_anggota //
        if (isset($_Get['id_anggota'])) {
            $id_anggota = htmlspecialchars($_GET["id_anggota"]);

            $sql = "DELETE from anggota where id_anggota='$id_anggota'";
            $hasil = mysqli_query($koneksi, $sql);

            if ($hasil) {
                header("location:index.php");
            }
        }
        ?>
    </div>
    <table class="table table-bordered table-hover">
        <br>
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>No Hp</th>
                <th colspan="2">Opsi</th>
            </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql = "SELECT * FROM anggota order by id_anggota desc";

        $hasil = mysqli_query($koneksi, $sql);
        $no = 0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

        ?>
            <tbody>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['no_hp']; ?></td>
                    <td>
                        <a href="update.php?id_anggota=<?php echo htmlspecialchars($data["id_anggota"]); ?>" class="btn btn-warning" role="button">Update</a>
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_anggota=<?php echo $data['id_anggota']; ?>" class="btn btn-danger" role="button">Delete</a>

                    </td>
                </tr>
            </tbody>
        <?php

        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</body>

</html>