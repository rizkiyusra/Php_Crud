<?php
include_once 'koneksi.php';
/**
 * @var $connection PDO
 */

$delete = $_POST['delete'];

$statement = $connection -> prepare("DELETE FROM `buku` WHERE `buku`.`isbn` = '$delete'");
$statement -> execute();
$response =[];

if ($statement) {
    $response['status']='succcess';
    $response['message']='Berhasil menghapus data';
}

else {
    $response['status']='failed';
    $response['message']='Gagal menghapus data';
}

header('Content-Type: application/json');
echo json_encode($response,JSON_PRETTY_PRINT);