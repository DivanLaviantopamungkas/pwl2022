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
    <div class="container">
        <?php

        include "koneksi.php";

        function input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if (isset($_GET['id_anggota'])) {
            $id_anggota = input($_GET["id_anggota"]);

            $sql = "SELECT * FROM anggota where id_anggota=$id_anggota";
            $hasil = mysqli_query($koneksi, $sql);
            $data = mysqli_fetch_assoc($hasil);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id_anggota = htmlspecialchars($_POST["id_anggota"]);
            $username = Input($_POST["username"]);
            $nama = Input($_POST["nama"]);
            $alamat = input($_POST["alamat"]);
            $email = input($_POST["email"]);
            $no_hp = input($_POST["no_hp"]);

            $sql = "update anggota set
            username ='$username',
            nama = '$nama',
            email = '$email',
            no_hp = '$no_hp'
            where id_anggota=$id_anggota";

            $hasil = mysqli_query($koneksi, $sql);

            if ($hasil) {
                header("location:index.php");
            }
        }

        ?>
        <h2>Update Data</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" placeholder="Masukan Username" required />
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nmaa" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Masukan Nama" required />
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea type="text" name="alamat" class="form-control" placeholder="Masukan alamat" required /><?php echo $data['alamat'] ?></textarea>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" placeholder="Masukan email" required />
            </div>
            <div class="form-group">
                <label>No Handphone</label>
                <input type="text" name="no_hp" class="form-control" value="<?php echo $data['no_hp']; ?>" placeholder="Masukan Nomor" required />
            </div>
            <BR></BR>
            <input type="hidden" name="id_anggot" value="<?php echo $data['id_anggota']; ?>" />

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>