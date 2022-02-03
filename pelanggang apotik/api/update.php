<?php

include "../config/koneksi.php";

$nama_pelanggan = @$_POST['nama_pelanggan'];
$jenis_kelamin= @$_POST['jenis_kelamin'];
$alamat = @$_POST['alamat'];

$data = [];

$query = mysqli_query($kon, "UPDATE `pelanggan_apotik` SET
`id`='". $id."',
`nama_pelanggan` = '". $nama_pelanggan."',
`jenis_kelamin` = '". $jenis_kelamin."',
`alamat` = '". $alamat."',
WHERE  `id` = '". $id ."'");

if($query){
    $status = true;
       $pesan = "request success";
       $data[]= $query;
}else{
    $status = false;
    $pesan = "request failed";
}

$json = [
   "status" => $status,
   "pesan" => $pesan,
   "data" => $data,
];

header("Content-Type: application/json");
echo json_encode($json);

?>