<?php
include_once 'koneksi.php';

/**
 * @var $connection PDO
 */

$delete = $_POST['delete'];

$check = $connection -> query("SELECT * FROM `buku` WHERE `isbn` = '$delete'");
$check -> setFetchMode(PDO::FETCH_ASSOC);
$result = $check -> fetchAll();
$response =[];

if (count($result) > 0) {
    $statement = $connection -> prepare("DELETE FROM `buku` WHERE `buku`.`isbn` = '$delete'");
    $statement -> execute();
    $response['status']='success';
    $response['message']='Berhasil menghapus data';
}

else {
    $response['status']='failed';
    $response['message']='Data buku tidak ditemukan';
}

header('Content-Type: application/json');
echo json_encode($response,JSON_PRETTY_PRINT);