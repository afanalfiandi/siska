<?php
error_reporting(0);

header('Content-Type:application/json;charset=utf8');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:GET,PUT,POST,DELETE,OPTIONS');
header('Access-Control-Allow-Headers:Content-Range,Content-Disposition,Content-Description');

include '../../../conn.php';

$sql = "SELECT * FROM siswa ORDER BY nama ASC";

$query = mysqli_query($conn, $sql);
$result['siswa'] = array();

while ($data = mysqli_fetch_array($query)) {
    $res['id_siswa'] = $data['id_siswa'];
    $res['nis'] = $data['nis'];
    $res['nama'] = $data['nama'];
    $res['password'] = $data['password'];
    $res['id_jurusan_detail'] = $data['id_jurusan_detail'];
    $res['id_kelas_detail'] = $data['id_kelas_detail'];
    $res['img'] = $data['img'];
    array_push($result['siswa'], $res);
}
echo json_encode($result);