<?php
class Petshop {
    private static $NextID = 1; // Variabel statis untuk autoincrement id
    private $ID;
    private $produk;
    private $kategori;
    private $harga;
    private $foto;

    // construct dengan parameter
    public function __construct($produk, $kategori, $harga, $foto) {
        self::$NextID++; // self fungsinya supaya ketika instansiasi objek tidak mengenali variabel ini sebegai variabel yang sama dengan objek yang diinstansiasi sebelumnya (jadi kayak global var gitu) 
        $this->ID = self::$NextID; // self:: (variabel statis, sama seperti static di c++ dan java)
        $this->produk = $produk;
        $this->kategori = $kategori;
        $this->harga = $harga;
        $this->foto = $foto;
    }

    public function getID() {
        return $this->ID;
    }


    public function seID($id) {
        $this->ID = $id;
    }

    public function getProduk() {
        return $this->produk;
    }

    public function setProduk($produk) {
        $this->produk = $produk;
    }

    public function getKategori() {
        return $this->kategori;
    }

    public function setKategori($kategori) {
        $this->kategori = $kategori;
    }

    public function getHarga() {
        return $this->harga;
    }

    public function setHarga($harga) {
        $this->harga = $harga;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function display() {
        echo '<form action="process.php" method="post">';
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Produk</th><th>Kategori</th><th>Harga</th><th>Foto</th><th>action</th></tr>";
        echo "<tr>";
        echo "<td>{$this->ID}</td>";
        echo "<td>{$this->produk}</td>";
        echo "<td>{$this->kategori}</td>";
        echo "<td>Rp{$this->harga}</td>";
        echo "<td><img src='{$this->foto}' width='100'></td>";
        echo '<td><button type="submit" name="delete">Delete</button></td>';
        echo "</tr>";
        echo "</table>";
        echo "</form>";
    }

    public static function addAttribute(&$attributes, $produk, $kategori, $harga, $foto) {
        $attributes[] = new Petshop($produk, $kategori, $harga, $foto);
        echo "Atribut berhasil ditambahkan.<br>";
    }

    public static function displayAttributes($attributes) {
        if (empty($attributes)) {
            echo "Petshop butuh supply :,(<br>";
            return;
        }
        
        echo '<form action="process.php" method="post">';
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Produk</th><th>Kategori</th><th>Harga</th><th>Foto</th><th>action</th></tr>";
        foreach ($attributes as $attribute) {
            echo "<tr>";
            echo "<td>{$attribute->getID()}</td>";
            echo "<td>{$attribute->getProduk()}</td>";
            echo "<td>{$attribute->getKategori()}</td>";
            echo "<td>Rp{$attribute->getHarga()}</td>";
            echo "<td><img src='{$attribute->getFoto()}' width='100'></td>";
            echo '<td><button type="submit" name="delete">Delete</button></td>';
            echo "</tr>";
        }
        echo "</table>";
        echo "</form>";
    }

    public static function updateAttribute(&$attributes, $id, $newProduk, $newKategori, $newHarga) {
        foreach ($attributes as $attribute) {
            if ($attribute->getID() == $id) {
                $updated = false;
                if ($newProduk !== "-") {
                    $attribute->setProduk($newProduk);
                    $updated = true;
                }
                if ($newKategori !== "-") {
                    $attribute->setKategori($newKategori);
                    $updated = true;
                }
                if ($newHarga >= 0) {
                    $attribute->setHarga($newHarga);
                    $updated = true;
                }
                
                if ($updated) {
                    echo "Atribut berhasil diupdate.<br>";
                } else {
                    echo "Atribut tidak berhasil diupdate.<br>";
                }
                return;
            }
            else echo "Atribut tidak ditemukan.<br>";
        }
        Petshop::displayAttributes($attributes);
    }

    public static function findAttribute(&$attributes, $produk){
        foreach($attributes as $key => $attribute){
            if($attribute->getProduk() == $produk){
                $attribute->display();
            }
        }
    }

    public static function deleteAttribute(&$attributes, $id) {
        foreach ($attributes as $key => $attribute) {
            if ($attribute->getID() == $id) {
                unset($attributes[$key]);
                // $attributes = array_values($attributes); // Reindex array
                echo "Atribut berhasil dihapus dari list.<br>";
                Petshop::displayAttributes($attributes);
                return;
            }
            echo "Atribut tidak ditemukan.<br>";
        }
    }
}