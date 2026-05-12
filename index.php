<?php include 'konversi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projek Akhir - Konversi Suhu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
    <h2>Konverter Suhu</h2>
    
    <form method="POST">
        <label>Suhu (Celsius)</label>
        <input type="number" step="any" name="suhu" placeholder="Contoh: 30" required>
        
        <label>Konversi ke:</label>
        <select name="unit">
            <option value="F">Fahrenheit</option>
            <option value="R">Reamur</option>
            <option value="K">Kelvin</option>
        </select>
        
        <button type="submit" name="submit">Hitung </button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $inputSuhu = $_POST['suhu'];
        $unitTujuan = $_POST['unit'];
        
        $hasilAkhir = hitungSuhu($inputSuhu, $unitTujuan);
        
        echo "<div class='result'>";
        echo "Hasil: $hasilAkhir";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>