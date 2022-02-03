<?php

include "../config/koneksi.php";
$nama_pelanggan = @$_POST['nama_pelanggan'];
$jenis_kelamin= @$_POST['jenis_kelamin'];
$alamat = @$_POST['alamat'];
$data = [];

$query = mysqli_query($kon, "SELECT * FROM `pelanggan_apotik` ORDER BY id DESC");
  if($query){
      $status = true;
      $pesan = "reaquest success";
      while($row = mysqli_fetch_assoc($query)){
          array_push($data, $row);
      }
  }else{
      $status = false;
      $pesan = "reaquest failed";
  }

   $json = [
       "status" => $status,
       "pesan" => $pesan,
       "data" => $data,
   ];

   header("Content-Type: application/json");
   echo json_encode($json);
   
   ?>