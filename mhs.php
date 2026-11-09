<?php
// Konfigurasi Koneksi Database dengan PDO
$host = "localhost";
$dbname = "kampus";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Proses jika form disubmit
    if (isset($_POST['tambah'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];

        // Prepared statement untuk keamanan
        $sql = "INSERT INTO mahasiswa (nim, nama) VALUES (:nim, :nama)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nim' => $nim,
            ':nama' => $nama
        ]);

        echo "<p style='color: green;'>Data mahasiswa berhasil ditambahkan!</p>";
    }
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah & Daftar Mahasiswa</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2>Form Tambah Mahasiswa</h2>
    <form method="POST">
        NIM: <input type="text" name="nim" required><br><br>
        Nama: <input type="text" name="nama" required><br><br>
        <button type="submit" name="tambah">Simpan</button>
    </form>

    <h2>Daftar Mahasiswa</h2>
    <table>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
        </tr>
        <?php
        // Ambil data dari database
        $stmt = $pdo->query("SELECT * FROM mahasiswa");
        $no = 1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>