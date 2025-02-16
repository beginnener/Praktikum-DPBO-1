// #include <iostream>
// #include <list>
#include "Petshop.cpp"

// using namespace std;

int Petshop::NextID = 1; // inisialisasi variabel statis

int main() {
    list<Petshop> petshopList; // inisialisasi list petshop
    int pilih;
    do {
        cout << "\n===== MENU PETSHOP DPBO =====" << endl;
        cout << "1. Tambah Produk" << endl;
        cout << "2. Tampilkan Produk" << endl;
        cout << "3. Update Produk" << endl;
        cout << "4. Hapus Produk" << endl;
        cout << "5. Keluar" << endl;
        cout << "Masukkan pilihan (contoh: 1): ";
        cin >> pilih;
        cin.ignore();

        switch (pilih) {
            case 1: {
                string produk, kategori;
                int harga;
                cout << "Masukkan Nama Produk: ";
                getline(cin, produk);
                cout << "Masukkan Kategori Produk: ";
                getline(cin, kategori);
                cout << "Masukkan Harga Produk: ";
                cin >> harga;
                Petshop::addAttribute(petshopList, produk, kategori, harga);
                break;
            }
            case 2:
                Petshop::displayAttributes(petshopList);
                break;
            case 3: {
                int id, harga;
                string produk, kategori;
                cout << "Masukkan ID Produk yang ingin diupdate: ";
                cin >> id;
                cin.ignore();
                cout << "Masukkan Nama Produk baru (kosongkan jika tidak ingin diubah): ";
                getline(cin, produk);
                cout << "Masukkan Kategori Produk baru (kosongkan jika tidak ingin diubah): ";
                getline(cin, kategori);
                cout << "Masukkan Harga Produk baru (kosongkan jika tidak ingin diuabah): ";
                cin >> harga;
                Petshop::updateAttribute(petshopList, id, produk, kategori, harga);
                break;
            }
            case 4: {
                int id;
                cout << "Masukkan ID Produk yang ingin dihapus: ";
                cin >> id;
                Petshop::deleteAttribute(petshopList, id);
                break;
            }
            case 5:
                cout << "Keluar dari program..." << endl;
                break;
            default:
                cout << "Pilihan tidak valid!" << endl;
        }
    } while (pilih != 5);
    
    return 0;
}
