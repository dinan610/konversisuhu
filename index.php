<?php 
include 'koneksi.php'; 

$hasil_tampil = "";

if (isset($_POST['hitung'])) {
    $suhu = $_POST['suhu'];
    $unit = $_POST['unit'];

    if ($unit == "F") {
        $res = (9/5 * $suhu) + 32;
        $label = "Fahrenheit";
    } elseif ($unit == "R") {
        $res = (4/5 * $suhu);
        $label = "Reamur";
    } elseif ($unit == "K") {
        $res = $suhu + 273.15;
        $label = "Kelvin";
    }

    $hasil_tampil = round($res, 2) . " °" . $label;

   
    mysqli_query($conn, "INSERT INTO riwayat_konversi (suhu_awal, unit_tujuan, hasil_teks) 
                         VALUES ('$suhu', '$unit', '$hasil_tampil')");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Suhu Converter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">
    <h2>Konversi Suhu (C)</h2>
    <form method="POST">
        <input type="number" step="any" name="suhu" placeholder="Input Celsius..." required>
        <select name="unit">
            <option value="F">Fahrenheit</option>
            <option value="R">Reamur</option>
            <option value="K">Kelvin</option>
        </select>
        <button name="hitung">GAS HITUNG</button>
    </form>

    <?php if ($hasil_tampil != ""): ?>
        <div class="output"><?= $hasil_tampil ?></div>
    <?php endif; ?>
</div>

<div class="table-area">
    <p>Riwayat Terakhir:</p>
    <table>
        <tr>
            <th>C°</th>
            <th>Hasil Konversi</th>
            <th>Jam</th>
        </tr>
        <?php
        $data = mysqli_query($conn, "SELECT * FROM riwayat_konversi ORDER BY id DESC LIMIT 5");
        while($row = mysqli_fetch_assoc($data)) {
            echo "<tr>
                    <td>{$row['suhu_awal']}</td>
                    <td>{$row['hasil_teks']}</td>
                    <td>".date('H:i', strtotime($row['tanggal']))."</td>
                  </tr>";
        }
        ?>
    </table>
</div>

</body>
</html>