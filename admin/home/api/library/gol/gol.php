<?php
    function golongan($numGolongan) {
    switch ($numGolongan) {
        case '1':
        return 'I/a';
        case '2':
        return 'I/b';
        case '3':
        return 'I/c';
        case '4':
        return 'II/a';
        case '5':
        return 'II/b';
        case '6':
        return 'II/c';
        case '7':
        return 'III/a';
        case '8':
        return 'III/b';
        case '9':
        return 'III/c';
        case '10':
        return 'IV/a';
        case '11':
        return 'IV/b';
        case '12':
        return 'IV/c';
        default:
        return '';
        }
    }
?>