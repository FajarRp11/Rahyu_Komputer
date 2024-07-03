-- Membuat Tabel Customer
CREATE TABLE tabel_customer (
    Id_Customer CHAR(5) PRIMARY KEY,
    Nama_Customer VARCHAR(50),
    Telepon_Customer INT,
    Alamat_Customer VARCHAR(50)
);

-- Membuat Tabel Kasir
CREATE TABLE tabel_kasir (
    Id_Kasir CHAR(5) PRIMARY KEY,
    Nama_Kasir VARCHAR(50),
    Telepon_kasir INT
);

-- Membuat Tabel Barang
CREATE TABLE tabel_barang (
    Id_Barang CHAR(5) PRIMARY KEY,
    Nama_Barang VARCHAR(50),
    Harga INT
);

-- Membuat Tabel Header Transaksi
CREATE TABLE tabel_header_transaksi (
    Id_Invoice CHAR(5) PRIMARY KEY,
    Tanggal DATE,
    Id_Customer CHAR(5),
    Id_Kasir CHAR(5),
    FOREIGN KEY (Id_Customer) REFERENCES Tabel_Customer(Id_Customer),
    FOREIGN KEY (Id_Kasir) REFERENCES Tabel_Kasir(Id_Kasir)
);

-- Membuat Tabel Detail Transaksi
CREATE TABLE tabel_detail_transaksi (
    Id_Invoice CHAR(5),
    Id_Barang CHAR(5),
    Jumlah_Barang INT,
    PRIMARY KEY (Id_Invoice, Id_Barang),
    FOREIGN KEY (Id_Invoice) REFERENCES Tabel_Header_Transaksi(Id_Invoice),
    FOREIGN KEY (Id_Barang) REFERENCES Tabel_Barang(Id_Barang)
);

-- Menambahakn data ke Tabel Customer
INSERT INTO tabel_customer (Id_Customer, Nama_Customer,Telepon_Customer, Alamat_Customer) VALUES
('CUST1', 'Adam', '8123456789', 'Jl. Khatib Sulaiman, Lolong Belanti'),
('CUST2', 'SMK N 1 Padang', '8123456789', 'Jl. Ahmad Yunus, Anduring'),
('CUST3', 'Bayu', '8123456789', 'Padang Utara')
;

-- Menambahkan data ke Tabel Kasir
INSERT INTO tabel_kasir (Id_Kasir, Nama_Kasir, Telepon_kasir) VALUES
('KSR1', 'Dani', '8123456789'),
('KSR2', 'Iqbal', '8123456789')
;

-- Menambahkan data ke Tabel Barang
INSERT INTO tabel_barang (Id_Barang, Nama_Barang, Harga) VALUES
('B1', 'Asus Vivobook 14X', '8000000'),
('B2', 'Logitech G203', '270000'),
('B3', 'Kabel LAN 1 meter', '25000'),
('B4', 'Gamen Titan Elite Keyboard', '250000')
;

-- Menambahkan data ke Tabel Header Transaksi
INSERT INTO tabel_header_transaksi (Id_Invoice, Tanggal, Id_Customer, Id_Kasir) VALUES
('Inv_1', NOW(), 'CUST1', 'KSR1'),
('Inv_2', NOW(), 'CUST2', 'KSR2'),
('Inv_3', NOW(), 'CUST3', 'KSR1')
;

-- Menambahkan data ke Tabel Detail Transaksi
INSERT INTO tabel_detail_transaksi (Id_Invoice, Id_Barang, Jumlah_Barang) VALUES
('Inv_1', 'B1', 1),
('Inv_1', 'B2', 1),
('Inv_2', 'B3', 10),
('Inv_3', 'B4', 1)
;