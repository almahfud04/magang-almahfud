<?php
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nama_kelas = isset($_POST['nama_kelas']) ? $_POST['nama_kelas'] : null;
    $jenjang = isset($_POST['jenjang']) ? $_POST['jenjang'] : null;
    $kapasitas = isset($_POST['kapasitas']) ? $_POST['kapasitas'] : null;

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO kelas (nama_kelas, jenjang, kapasitas) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $nama_kelas, $jenjang, $kapasitas);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<div class='container mt-5'><div class='alert alert-success'>Kelas berhasil ditambahkan.</div><a href='index.php' class='btn btn-primary'>Kembali</a></div>";
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
