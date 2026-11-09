<!DOCTYPE html>
<html>
<head>
    <title>Konversi Nilai</title>
</head>
<body>

    <h2>Cek Konversi Nilai</h2>

    <form method="POST">
        Masukkan Nilai (0-100): 
        <input type="number" name="nilai" min="0" max="100" required>
        <button type="submit" name="cek">Konversi</button>
    </form>

    <?php
    function konversiNilai(int $nilai): string {
        if ($nilai >= 81 && $nilai <= 100) {
            return "A";
        } elseif ($nilai >= 76 && $nilai <= 80) {
            return "B";
        } elseif ($nilai >= 61 && $nilai <= 75) {
            return "C";
        } elseif ($nilai >= 36 && $nilai <= 60) {
            return "D";
        } elseif ($nilai >= 0 && $nilai <= 35) {
            return "E";
        } else {
            return "Nilai tidak valid";
        }
    }

    if (isset($_POST['cek'])) {
        $nilaiInput = (int) $_POST['nilai'];
        $hasilHuruf = konversiNilai($nilaiInput);
        echo "<h3>Nilai Huruf untuk angka $nilaiInput adalah: $hasilHuruf</h3>";
    }
    ?>

</body>
</html>