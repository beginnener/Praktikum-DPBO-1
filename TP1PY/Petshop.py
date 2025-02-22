class Petshop:
    NextID = 1  # variabel statis untuk autoincrement id

    def __init__(self, produk="", kategori="", harga=0):
        self.ID = Petshop.NextID
        Petshop.NextID += 1
        self.produk = produk
        self.kategori = kategori
        self.harga = harga

    def get_ID(self):
        return self.ID
    
    def get_produk(self):
        return self.produk
    
    def set_produk(self, produk):
        self.produk = produk
    
    def get_kategori(self):
        return self.kategori
    
    def set_kategori(self, kategori):
        self.kategori = kategori
    
    def get_harga(self):
        return self.harga
    
    def set_harga(self, harga):
        self.harga = harga

    def display(self):
        print(f"{self.ID}. {self.produk} {self.kategori} Rp{self.harga}")

    @staticmethod
    def add_attribute(attributes, produk, kategori, harga):
        attributes.append(Petshop(produk, kategori, harga))
        print("Atribut berhasil ditambahkan.")

    @staticmethod
    def display_attributes(attributes):
        if not attributes:
            print("Petshop butuh supply :,(")
            return

        print("=============================")
        print("         PETSHOP DPBO        ")
        print("=============================")
        
        for attribute in attributes:
            print(f"{attribute.get_ID()}. {attribute.get_produk()} {attribute.get_kategori()} {attribute.get_harga()}")

    @staticmethod
    def update_attribute(attributes, id, new_produk, new_kategori, new_harga):
        for attribute in attributes:
            if attribute.get_ID() == id:
                updated = False
                if new_produk != "-":
                    attribute.set_produk(new_produk)
                    updated = True
                if new_kategori != "-":
                    attribute.set_kategori(new_kategori)
                    updated = True
                if new_harga >= 0:
                    attribute.set_harga(new_harga)
                    updated = True
                
                if updated:
                    print("Atribut berhasil diupdate.")
                else:
                    print("Atribut tidak berhasil di update.")
                return
        print("Atribut tidak ditemukan.")

    @staticmethod
    def delete_attribute(attributes, id):
        for i, attribute in enumerate(attributes):
            if attribute.get_ID() == id:
                del attributes[i]
                print("Atribut berhasil dihapus dari list.")
                return
        print("Atribut tidak ditemukan.")
