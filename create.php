<?php
include_once 'koneksi.php';
/**
 * @var $connection PDO
 */

$isbn = $_POST['isbn'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];
$abstrak = $_POST['abstrak'];

$query = "INSERT INTO `buku` (`isbn`, `judul`, `pengarang`, `jumlah`, `tanggal`, `abstrak`) VALUES ('$isbn','$judul','$pengarang','$jumlah','$tanggal','$abstrak')";
$result = $connection -> exec($query);
$response =[];

if ($result) {
    $response['status']='succcess';
    $response['message']='Berhasil mengisi data buku';
}

else {
    $response['status']='failed';
    $response['message']='Gagal mengisi data buku';
}

header('Content-Type: application/json');
echo json_encode($response,JSON_PRETTY_PRINT);