<?php
include_once "../connection.php";

$sql = "SELECT siswa.nama, siswa.email, siswa.alamat, siswa.ttl, siswa.kelas_name FROM siswa";
$result = $conn->query($sql);

$dataSiswa = [];
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $dataSiswa[] = [
            'nama' => $row['nama'],
            'email' => $row['email'],
            'ttl' => $row['ttl'],
            'alamat' => $row['alamat'],
            'kelas_name' => $row['kelas_name'],
        ];
    }
} 
$conn->close();