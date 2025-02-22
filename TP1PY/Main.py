from Petshop import Petshop

def main():
    petshop_list = []
    while True:
        print("\n===== MENU PETSHOP DPBO =====")
        print("1. Tambah Produk")
        print("2. Tampilkan Produk")
        print("3. Update Produk")
        print("4. Hapus Produk")
        print("5. Keluar")
        
        pilihan = input("Masukkan pilihan (contoh: 1): ")
        
        if pilihan == "1":
            produk = input("Masukkan Nama Produk: ")
            kategori = input("Masukkan Kategori Produk: ")
            harga = int(input("Masukkan Harga Produk: "))
            Petshop.add_attribute(petshop_list, produk, kategori, harga)
        elif pilihan == "2":
            Petshop.display_attributes(petshop_list)
        elif pilihan == "3":
            id_produk = int(input("Masukkan ID Produk yang ingin diupdate: "))
            produk = input("Masukkan Nama Produk baru (kosongkan jika tidak ingin diubah): ")
            kategori = input("Masukkan Kategori Produk baru (kosongkan jika tidak ingin diubah): ")
            harga = input("Masukkan Harga Produk baru (kosongkan jika tidak ingin diubah): ")
            
            new_harga = int(harga) if harga.isdigit() else 0
            Petshop.update_attribute(petshop_list, id_produk, produk, kategori, new_harga)
        elif pilihan == "4":
            id_produk = int(input("Masukkan ID Produk yang ingin dihapus: "))
            Petshop.delete_attribute(petshop_list, id_produk)
        elif pilihan == "5":
            print("Keluar dari program...")
            break
        else:
            print("Pilihan tidak valid!")


if __name__ == "__main__":
    main()
