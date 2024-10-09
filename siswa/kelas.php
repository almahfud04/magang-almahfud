<?php

include_once "../connection.php";

$sql = "SELECT * FROM kelas";
$result2 = $conn->query($sql);

$dataKelas = [];
if ($result2->num_rows > 0) {
    // output data of each row
    while ($row = $result2->fetch_assoc()) {
        $dataKelas[] = [
            'nama_kelas' => $row['nama_kelas'],
            'jenjang' => $row['jenjang'],
            'kapasitas' => $row['kapasitas'],
        ];
    }
} 
$conn->close();
