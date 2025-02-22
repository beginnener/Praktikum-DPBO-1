import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        ArrayList<Petshop> petshopList = new ArrayList<>(); // inisialisasi list
        Scanner scanner = new Scanner(System.in);
        int pilih;

        do {
            System.out.println("\n===== MENU PETSHOP DPBO =====");
            System.out.println("1. Tambah Produk");
            System.out.println("2. Tampilkan Produk");
            System.out.println("3. Update Produk");
            System.out.println("4. Hapus Produk");
            System.out.println("5. Keluar");
            System.out.print("Masukkan pilihan (contoh: 1): ");
            pilih = scanner.nextInt();
            scanner.nextLine(); // hapus newline dari buffer

            switch (pilih) {
                case 1: {
                    System.out.print("Masukkan Nama Produk: ");
                    String produk = scanner.nextLine();
                    System.out.print("Masukkan Kategori Produk: ");
                    String kategori = scanner.nextLine();
                    System.out.print("Masukkan Harga Produk: ");
                    int harga = scanner.nextInt();
                    Petshop.addAttributes(petshopList, produk, kategori, harga);
                    break;
                }
                case 2:
                    Petshop.displayAttributes(petshopList);
                    break;
                case 3: {
                    System.out.print("Masukkan ID Produk yang ingin diupdate: ");
                    int id = scanner.nextInt();
                    scanner.nextLine();
                    System.out.print("Masukkan Nama Produk baru (kosongkan jika tidak ingin diubah): ");
                    String produk = scanner.nextLine();
                    System.out.print("Masukkan Kategori Produk baru (kosongkan jika tidak ingin diubah): ");
                    String kategori = scanner.nextLine();
                    System.out.print("Masukkan Harga Produk baru (kosongkan jika tidak ingin diubah, gunakan -1 untuk melewati): ");
                    int harga = scanner.nextInt();
                    Petshop.updateAttribute(petshopList, id, produk, kategori, harga);
                    break;
                }
                case 4: {
                    System.out.print("Masukkan ID Produk yang ingin dihapus: ");
                    int id = scanner.nextInt();
                    Petshop.deleteAttribute(petshopList, id);
                    break;
                }
                case 5:
                    System.out.println("Keluar dari program...");
                    break;
                default:
                    System.out.println("Pilihan tidak valid!");
            }
        } while (pilih != 5);

        scanner.close();
    }
}