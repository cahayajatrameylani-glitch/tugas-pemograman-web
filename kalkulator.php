<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator PHP</title>
</head>
<body>

    <h2>Kalkulator Sederhana</h2>

    <form method="POST">
        Angka pertama:
        <input type="number" name="angka1" required><br><br>

        Operator:
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select><br><br>

        Angka kedua:
        <input type="number" name="angka2" required><br><br>

        <button type="submit" name="hitung">Hitung</button>
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        $angka1 = $_POST['angka1'];
        $angka2 = $_POST['angka2'];
        $operator = $_POST['operator'];
        $hasil = 0;

        if ($operator == '+') {
            $hasil = $angka1 + $angka2;
        } elseif ($operator == '-') {
            $hasil = $angka1 - $angka2;
        } elseif ($operator == '*') {
            $hasil = $angka1 * $angka2;
        } elseif ($operator == '/') {
            if ($angka2 != 0) {
                $hasil = $angka1 / $angka2;
            } else {
                $hasil = "Error: Pembagian dengan nol";
            }
        }

        echo "<h3>Hasil: $hasil</h3>";
    }
    ?>

</body>
</html>