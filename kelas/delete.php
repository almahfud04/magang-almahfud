<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'magang');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil ID dari URL
$id = $_GET['id'];

// Query untuk menghapus data kelas
$sql = "DELETE FROM kelas WHERE id=$id";
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'magang');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
// Ambil ID dari URL
$id = $_GET['id'];

// Query untuk menghapus data kelas
$sql = "DELETE FROM kelas WHERE id=$id";

// Eksekusi query delete
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapus!";
    header('Location: index.php'); // Redirect ke halaman utama
    exit; // Tambahkan exit setelah redirect untuk memastikan kode tidak dilanjutkan
} else {
    echo "Error: " . $conn->error;
}

// Tutup koneksi
$conn->close();
?>


// Eksekusi query delete
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapus!";
    header('Location: index.php'); // Redirect ke halaman utama
}
?>