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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

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
        //include file koneksi, untuk koneksikan ke database //
        include "koneksi.php";

        //Fungsi unruk mencegah inputan yang tidak sesuai //
        function input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        //Cek apakah ada kiriman form dari method post //
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = input($_POST["username"]);
            $nama = input($_POST["nama"]);
            $alamat = input($_POST["alamat"]);
            $email = input($_POST["email"]);
            $no_hp = input($_POST["no_hp"]);

            //query input menginput data kedalam tabel anggota //
            $sql = "insert into anggota (username, nama, alamat, email, no_hp) values
        ('$username', '$nama', '$alamat', '$email', '$no_hp')";

            //Mengeksekusi/menjalankan query diatas //
            $hasil = mysqli_query($koneksi, $sql);

            if ($hasil) {
                header("location:index.php");
            }
        }
        ?>
        <h2>Input Data</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukan Username" required />
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nmaa" class="form-control" placeholder="Masukan Nama" required />
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea type="text" name="alamat" class="form-control" placeholder="Masukan alamat" required /></textarea>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukan email" required />
            </div>
            <div class="form-group">
                <label>No Handphone</label>
                <input type="text" name="no_hp" class="form-control" placeholder="Masukan Nomor" required />
            </div>
            <BR></BR>
            <button type="submit" name="submit" class="btn btn-primary">SAVE</button>
            <button type="cancel" name="cancel" class="btn btn-danger">CANCEL</button>
        </form>
    </div>
</body>

</html>