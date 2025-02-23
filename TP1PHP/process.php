<?php
require_once 'Petshop.php';
session_start();

if (!isset($_SESSION['attributes'])) {
    $_SESSION['attributes'] = [];
}
// else {
//     // Unserialize setiap elemen dalam array sesi
//     $_SESSION['attributes'] = array_map('unserialize', $_SESSION['attributes']);
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $produk = $_POST['produk'] ?? "";
    $kategori = $_POST['kategori'] ?? "";
    $harga = $_POST['harga'] ?? 0;
    $gambar = "";

    // Menangani upload gambar
    if (!empty($_FILES['gambar']['name'])) {
        $targetDir = "images/"; //store target directory
        $targetFile = $targetDir . basename($_FILES["gambar"]["name"]); // concatenate nama file dengan nama directory
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)); // convert kedalam huruf kecil supaya lebih mudah 
        $allowedTypes = ["jpg", "jpeg", "png", "gif"]; //tipe yang diiszinkan

        if (in_array($imageFileType, $allowedTypes) && move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
            $gambar = $targetFile;
        } else {
            echo "Gagal mengunggah gambar. Pastikan formatnya jpg, jpeg, png, atau gif.<br>";
        }
    }

    if (isset($_POST['add'])) {
        Petshop::addAttribute($_SESSION['attributes'], $produk, $kategori, $harga, $gambar);
    } 
    if (isset($_POST['delete'])) {
        Petshop::deleteAttribute($_SESSION['attributes'], $id);
    } 

    // Hanya serialisasi objek
    $_SESSION['attributes'] = array_map(function($attr) {
        return serialize($attr);
    }, $_SESSION['attributes']);

}

header("Location: index.php");
exit();