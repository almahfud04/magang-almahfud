<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: /magang/admin/login.php");
    exit;
}

$sql = new mysqli("localhost", "root", "", "magang");

if ($sql->connect_error) {
    echo "Failed to connet to Mysqli: " . $sql->connect_error;
    exit();
}
$result = $sql->query("SELECT * FROM kelas");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Data Kelas</h2>
        <a href="create.php" class="btn btn-primary mb-3">Tambah Kelas</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nama Kelas</td>
                    <td>Jenjang</td>
                    <td>Kapasitas</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nama_kelas']}</td>
                        <td>{$row['jenjang']}</td>
                        <td>{$row['kapasitas']}</td>
                        <td>
                           <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                           <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin mengahpus?\")'>Hapus</a>
                        </td>
                    </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <a class="btn btn-warning" href="/magang/siswa/index.php">Kembali ke halaman siswa</a>
</body>
</html>