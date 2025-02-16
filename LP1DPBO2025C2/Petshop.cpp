#include <iostream>
#include <string>
#include <list>

using namespace std;
class Petshop{
    private :
    static int NextID; // static untuk otomasi id
    int ID;
    string produk;
    string kategori;
    int harga;

    public:
    Petshop(){
        this->produk = "";
        this->kategori = '-';
        this->harga = 0;
    }

    Petshop(string produk, string kategori, int harga) : ID(NextID++), produk(produk), kategori(kategori), harga(harga) {}

    // getter setter
    int get_ID()const { return this->ID; }
    void set_ID(int ID) { this->ID = ID; }
    
    string get_produk() const{ return this->produk; }
    void set_produk(string produk){ this->produk = produk; }
    
    string get_kategori() const { return this->kategori; }
    void set_kategori(string kategori){ this->kategori = kategori; }
    
    int get_harga() const { return this->harga; }
    void set_harga(int harga){ this->harga = harga; }

    // method untuk menampilkan isi petshop
    void display() const {
        cout << ID << ". " << produk << kategori << "Rp" << harga << endl;
    }

    // CRUD petshop dengan list
    static void addAttribute(list<Petshop> &Attributes, string produk, string kategori, int harga) {
        Attributes.emplace_back(produk, kategori, harga); // Use emplace_back for list efficiency
        cout << "Atribut berhasil ditambahkan.\n";
    }

    static void displayAttributes(const list<Petshop> &Attributes) {
        if (Attributes.empty()) {
            cout << "Petshop butuh supply :,(\n";
            return;
        }

        cout << "=============================\n";
        cout << "         PETSHOP DPBO        \n";
        cout << "=============================\n";

        for (list<Petshop>::const_iterator it = Attributes.begin(); it != Attributes.end(); ++it) {
            cout << it->get_ID() << "." << it->get_produk() << it->get_kategori() << it->get_harga() << endl;
            cout << "+---------------------------+\n";
        }
    }

    static void updateAttribute(list<Petshop> &Attributes, int id, string newProduk, string newKategori, int newHarga = 0) {
        for (auto &Attribute : Attributes) {
            bool updated = false;
            if (Attribute.get_ID() == id) {
                if(!newProduk.empty()){
                    Attribute.set_produk(newProduk);
                    updated = true;
                }
                if(!newKategori.empty()){
                    Attribute.set_kategori(newKategori);
                    updated = true;
                }
                if(newHarga > 0){
                    Attribute.set_harga(newHarga);
                    updated = true;
                }
                if (updated == true) cout << "Atribut berhasil diupdate.\n";
                else cout << "Atribut tidak berhasil di update";
                return;
            }
        }
        cout << "Atribut tidak ditemukan.\n";
    }

    static void deleteAttribute(list<Petshop> &Attributes, int id) {
        for (auto it = Attributes.begin(); it != Attributes.end(); ++it) {
            if (it->get_ID() == id) {
                Attributes.erase(it);  // hapus atribut dari list
                cout << "Atribut berhasil dihapus dari list.\n";
                return;
            }
        }
        cout << "Atribut tidak ditemukan.\n";
    }

};
