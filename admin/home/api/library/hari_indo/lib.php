<?php
    function hariIndo($hariInggris) {
    switch ($hariInggris) {
        case 'Sunday':
        return 'Minggu';
        case 'Monday':
        return 'Senin';
        case 'Tuesday':
        return 'Selasa';
        case 'Wednesday':
        return 'Rabu';
        case 'Thursday':
        return 'Kamis';
        case 'Friday':
        return 'Jumat';
        case 'Saturday':
        return 'Sabtu';
        default:
        return 'hari tidak valid';
        }
    }

    $tgl = date('Y-m-d');
    $convert_tgl = DateTime::createFromFormat('Y-m-d', $tgl);
    $hari = $convert_tgl->format('l');
?>