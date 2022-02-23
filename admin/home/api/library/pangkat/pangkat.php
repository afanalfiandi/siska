<?php
    function pangkat($numpangkat) {
    switch ($numpangkat) {
        case '1':
        return 'Pembina';
        case '2':
        return 'Pembina Tingkat I';
        case '3':
        return 'Penata Tingkat I';
        case '4':
        return 'Penata Tingkat I';
        case '5':
        return 'Penata';
        case '6':
        return 'Penata Muda Tingkat I';
        case '7':
        return 'Guru';
        default:
        return '';
        }
    }
?>