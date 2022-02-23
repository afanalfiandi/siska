<?php
    function jabatan($numJabatan) {
    switch ($numJabatan) {
        case '1':
        return 'Pembina';
        case '2':
        return 'Pembina Tingkat I';
        case '3':
        return 'Penata Tingkat I';
        case '4':
        return 'Penata';
        case '5':
        return 'Penata Muda Tingkat I';
        case '6':
        return 'Guru';  
        case '7':
        return 'Penata Muda';
        case '8':
        return 'Pembina Utama Muda'; 
        case '9':
        return 'Pembina Utama Madya';    
        case '10':
        return 'Pembina Utama'; 
        default:
        return '';
        }
    }
?>