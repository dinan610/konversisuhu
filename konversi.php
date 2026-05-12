<?php
// konversi.php

function hitungSuhu($suhu, $unit) {
    $hasil = 0;
    $label = "";

    switch ($unit) {
        case "F":
            $hasil = (9/5 * $suhu) + 32;
            $label = "Fahrenheit";
            break;
        case "R":
            $hasil = (4/5 * $suhu);
            $label = "Reamur";
            break;
        case "K":
            $hasil = $suhu + 273.15;
            $label = "Kelvin";
            break;
        default:
            return "Unit tidak dikenal";
    }

    return round($hasil, 2) . " °" . $label;
}
?>