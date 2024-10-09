<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: /magang/admin/login.php");
    exit;
}
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nama_kelas = $_POST['nama_kelas'];
    $Jenjang = $_POST['jenjang'];
    $Kapasitas = $_POST['kapasitas'];

    $sql = "INSERT INTO kelas (nama_kelas, jenjang, kapasitas) VALUES ('$Nama_kelas', '$Jenjang', '$Kapasitas')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Kelas</h2>
        <form action="skrip.php" method="POST">
            <div class="form-group">
                <label for="nama_kelas">Nama Kelas:</label>
                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
            </div>
            <div class="form-group">
                <label for="jenjang">Jenjang:</label>
                <input type="text" class="form-control" id="jenjang" name="jenjang" required>
            </div>
            <div class="form-group">
                <label for="kapasitas">Kapasitas:</label>
                <input type="number" class="form-control" id="kapasitas" name="kapasitas" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Kelas</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
