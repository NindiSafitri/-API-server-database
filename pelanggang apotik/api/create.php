<?php

include "../config/koneksi.php";

$nama_pelanggan = @$_POST['nama_pelanggan'];
$jenis_kelamin= @$_POST['jenis_kelamin'];
$alamat = @$_POST['alamat'];
$data = [];

$query = mysqli_query($kon, "INSERT INTO  `pelanggan_apotik`
  ( `nama_pelanggan`,`jenis_kelamin`,`alamat`
    )
   VALUES
   ('". $nama_pelanggan ."','". $jenis_kelamin ."','". $alamat ."')");

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