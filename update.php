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
$update = $_POST['update'];

$statement = $connection -> prepare("UPDATE `buku` SET `isbn` = '$isbn', `judul` = '$judul', `pengarang` = '$pengarang', `jumlah` = '$jumlah', `tanggal` = '$tanggal', `abstrak` = '$abstrak' WHERE `buku`.`isbn` = '$update'");

$statement -> execute();
$response =[];

if ($statement) {
    $response['status']='succcess';
    $response['message']='Berhasil update data';
}

else {
    $response['status']='failed';
    $response['message']='Gagal update data';
}

header('Content-Type: application/json');
echo json_encode($response,JSON_PRETTY_PRINT);