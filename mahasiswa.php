<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2>Daftar Nilai Mahasiswa</h2>

    <table>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Nilai</th>
        </tr>
        <?php
        $mahasiswa = [
            ["nim" => "2510077", "nama" => "Jatra", "nilai" => 85],
            ["nim" => "22510068", "nama" => "Ahmad", "nilai" => 90],
            ["nim" => "2510056", "nama" => "Meylani", "nilai" => 75],
            ["nim" => "2510078", "nama" => "Cahaya", "nilai" => 60],
            ["nim" => "2510061", "nama" => "Rina", "nilai" => 95]
        ];

        $totalNilai = 0;
        $jumlahData = count($mahasiswa);

        foreach ($mahasiswa as $index => $mhs) {
            $totalNilai += $mhs['nilai'];
            echo "<tr>";
            echo "<td>" . ($index + 1) . "</td>";
            echo "<td>" . $mhs['nim'] . "</td>";
            echo "<td>" . $mhs['nama'] . "</td>";
            echo "<td>" . $mhs['nilai'] . "</td>";
            echo "</tr>";
        }

        $rataRata = $totalNilai / $jumlahData;
        ?>
    </table>

    <h3>Rata-rata Nilai: <?php echo number_format($rataRata, 2); ?></h3>

</body>
</html>