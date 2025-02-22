// import java.util.ArrayList; //mengimpor arraylist (supaya bisa dinamis) 
import java.util.List; //interface dalam java supaya memudahkan penggunaan list (arraylist, linkedlist, vector)
import java.util.Iterator; //interface dalam java supaya memudahkan penggunaan list (arraylist, linkedlist, vector)

public class Petshop {
    private static int nextID = 1; //
    private int ID;
    private String produk;
    private String kategori;
    private int harga;

    //konstruktor dengan parameter
    public Petshop(int id, String prod, String cat, int price){
        this.ID = id;
        this.produk = prod;
        this.kategori = cat;
        this.harga = price;
    }

    // getter setter untuk class Petshop
    public int get_ID(){return ID;}
    public void set_ID(int id){ this.ID = id;}
    
    public String get_produk(){return produk;}
    public void set_produk(String prod){ this.produk = prod;}
    
    public String get_kategori(){return kategori;}
    public void set_kategori(String cat){ this.kategori = cat;}
    
    public int get_harga(){return harga;}
    public void set_harga(int price){ this.harga = price;}

    // method untuk melakukan print
    public final void print(){ // menggunakan non-access modifier final supaya variabel yang akan diakses tidak dapat dioverride secara sengaja atau tidak sengaja
        System.out.println(ID + ". " + produk + " " + kategori + " Rp" + harga); //print dengan concantentation
    }

    //CRUD untuk class petshop
    // seluruh method dibuat static karena hanya mengakses objek (kelas) pada list saja, bukan atribut dalam suatu kelas secara spesifik (mengosongkan kelas)
    public static void addAttributes(List<Petshop> petshops, String produk, String kategori, int harga){
        Petshop newAttribute = new Petshop(nextID++, produk, kategori, harga); //instansiasi objek
        petshops.add(newAttribute); // menambahkan objek ke list       
    }

    public static void displayAttributes(List<Petshop> petshops){
        if(petshops.isEmpty()){
            System.out.println("Petshop butuh supply :,(");
            return;
        }

        System.out.println("=============================");
        System.out.println("        PETSHOP DPBO         ");
        System.out.println("=============================");

        for (Petshop p:petshops){ // print dengan menggunakan enhanced forloop, dimana kita melakukan instansiasi class Petshop dengan nama p dan setiap iterasi program akan membaca isi dari list dan memasukannya kedalam p lalu di print
            p.print();
        }
    }

    public static void updateAttribute(List<Petshop> petshops, int id, String newProduk, String newKategori, int newHarga){
        boolean updated = false;
        for(Petshop p:petshops){
            if(p.get_ID() == id){
                if(!newProduk.equals("-")){
                    p.set_produk(newProduk);
                    updated = true;
                }   
                if(!newKategori.equals("-")){
                    p.set_kategori(newKategori);
                    updated = true;
                }   
                if(newHarga >= 0){
                    p.set_harga(newHarga);
                    updated = true;
                }
            }
        }
        if(updated == true){
            System.out.println("Atribut berhasil diupdate.");
            displayAttributes(petshops);
        } 
        else System.out.println("Atribut tidak ditemukan.");
    }

    public static void deleteAttribute(List<Petshop> petshops, int id){
        Iterator<Petshop> iterator = petshops.iterator(); // looping menggunakan iterator supaya loop lebih efisien dan aman
        int flag = 0;

        while (iterator.hasNext() && flag == 0) {
            Petshop p = iterator.next();
            if (p.get_ID() == id) {
                iterator.remove(); // hapus elemen dari list
                flag = 1;
                System.out.println("Atribut berhasil dihapus dari list.");
                return; 
            }
        }
        
        System.out.println("Atribut dengan id" + id + "tidak ditemukan.");
        displayAttributes(petshops); // tampilkan atribut yang tersedia
    }

}
