<?php
    require_once 'Petshop.php';
    session_start();
    
    if (!isset($_SESSION['attributes'])) {
        $_SESSION['attributes'] = [];
    }
    // Hanya unserialize jika data berupa string dan class Petshop tersedia
    $_SESSION['attributes'] = array_map(function ($attr) {
        return is_string($attr) ? @unserialize($attr) : $attr;
    }, $_SESSION['attributes']);

?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Petshop DPBO</title>
    </head>
    <body>
        <h1>Petshop DPBO</h1>
        <form action="process.php" method="post" enctype="multipart/form-data"> <!-- gunakan enctype supaya bisa menerima inputan foto-->
            <input type="hidden" name="id" value="<?php echo count($_SESSION['attributes']) + 1; ?>">
            <label>Produk: <input type="text" name="produk" required></label><br>
            <label>Kategori: <input type="text" name="kategori" required></label><br>
            <label>Harga: <input type="number" name="harga" required></label><br>
            <label>Gambar: <input type="file" name="gambar" accept="image/*"></label><br>
            <button type="submit" name="add">Tambah Produk</button>
        </form>
        <h2>Daftar Produk</h2>
        <?php Petshop::displayAttributes($_SESSION['attributes']); ?>
    </body>
    </html>