<?php
    function kompetensiKeahlian($numKK) {
    switch ($numKK) {
        case '1':
        return 'Munaswil';
        case '2':
        return 'Otomatisasi dan Tata Kelola Perkantoran';
        case '3':
        return 'Bisnis Daring dan Pemasaran';
        case '4':
        return 'Bimbingan Konseling';
        case '5':
        return 'Akuntansi Keuangan Lembaga';
        case '6':
        return 'Farmasi Klinis dan Kesehatan';
        case '7':
        return 'Multimedia';
        case '8':
        return 'Perbankan Syariah';
        case '9':
        return 'Rekayasa Perangkat Lunak';
        case '10':
        return 'Teknik Komputer Jaringan';
        default:
        return '';
        }
    }
?>