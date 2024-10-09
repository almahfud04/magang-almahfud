<?php
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama_kelas = $_POST['nama_kelas'];
    $jenjang = $_POST['jenjang'];
    $kapasitas = $_POST['kapasitas'];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE kelas SET nama_kelas=?, jenjang=?, kapasitas=? WHERE id=?");
    $stmt->bind_param("ssii", $nama_kelas, $jenjang, $kapasitas, $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<div class='container mt-5'><div class='alert alert-success'>Kelas berhasil diperbarui.</div><a href='index.php' class='btn btn-primary'>Kembali</a></div>";
    } else {
        echo "<div class='container mt-5'><div class='alert alert-danger'>Error: " . $stmt->error . "</div><a href='index.php' class='btn btn-primary'>Kembali</a></div>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
