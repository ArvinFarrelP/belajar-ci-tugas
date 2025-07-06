# 🛍️ Toko Online CI4 — Final Project UAS PWL

Aplikasi **Toko Online** berbasis **CodeIgniter 4** yang mendukung katalog produk, keranjang belanja, sistem diskon harian, checkout, hingga dashboard monitoring berbasis API.

🧾 Dibuat sebagai tugas **Ujian Akhir Semester** untuk mata kuliah **Pemrograman Web Lanjut**.

---

## 🔧 Fitur Utama

| Fitur                | Keterangan                                            |
| -------------------- | ----------------------------------------------------- |
| 🔐 Autentikasi       | Login dengan session dan role (`admin` / `user`)      |
| 🛒 Keranjang         | Tambah, edit, hapus item; hitung otomatis total harga |
| 📦 Produk & Kategori | Manajemen produk dan kategori via panel admin         |
| 🏷️ Diskon Harian     | Diskon otomatis berdasarkan tanggal login             |
| 💳 Checkout          | Input alamat & ongkir, simpan transaksi               |
| 📤 Export PDF        | Produk bisa diunduh ke PDF (admin only)               |
| 📊 API Webservice    | Endpoint JSON transaksi (untuk dashboard eksternal)   |

---

## 🖥️ Teknologi

- ✅ PHP 8.2+
- ✅ CodeIgniter 4.6
- ✅ MySQL (phpMyAdmin)
- ✅ Bootstrap 5 + NiceAdmin
- ✅ GuzzleHTTP (untuk konsumsi API)
- ✅ DomPDF (export PDF)
- ✅ CI4 Cart Library (keranjang berbasis session)

---

## 📁 Struktur Utama

```

projectci/
├── app/
│ ├── Controllers/
│ ├── Models/
│ ├── Views/
│ ├── Filters/
│ ├── Config/
│ └── Database/
├── public/
│ └── dashboard-toko/

```

---

## 🚀 Cara Instalasi

### 📦 1. Clone & Masuk ke Proyek

```bash
git clone https://github.com/ArvinFarrelP/belajar-ci-tugas.git
cd projectci
```

### 🧩 2. Install Dependensi

```bash
composer install
```

### ⚙️ 3. Setup `.env`

Salin file `.env`:

```bash
cp env .env
```

Lalu sesuaikan:

```env
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost:8080'

database.default.hostname = localhost
database.default.database = db_ci4
database.default.username = root
database.default.password = [isi password kamu]

API_KEY = random123678abcghi
COST_KEY = your_rajaongkir_key
```

### 🗂️ 4. Buat Database

Buat database `db_ci4` di phpMyAdmin.

### 🏗️ 5. Migrasi & Seeder

```bash
php spark migrate
php spark db:seed ProductSeeder
php spark db:seed UserSeeder
```

### ▶️ 6. Jalankan Server

```bash
php spark serve
```

Akses aplikasi di `http://localhost:8080`

---

## 🔐 Login Default

| Role  | Username | Password |
| ----- | -------- | -------- |
| Admin | empluk00 | 1234567  |
| User  | briyanti | 1234567  |

---

## 🌐 API Endpoint (Webservice)

### 🔗 Endpoint

```
GET /api
```

### 🔐 Header yang Diperlukan

```
Key: random123678abcghi
```

### 📘 Contoh Response JSON

```json
{
  "results": [
    {
      "id": "1",
      "username": "empluk00",
      "total_harga": "10924000",
      "alamat": "jl. Imam Bonjol 207",
      "ongkir": "25000",
      "status": "0",
      "created_at": "2025-06-20 06:01:46",
      "updated_at": "2025-06-20 06:01:46",
      "details": [
        {
          "id": "1",
          "transaction_id": "1",
          "product_id": "1",
          "jumlah": "1",
          "diskon": "0",
          "subtotal_harga": "10899000",
          "created_at": "2025-06-20 06:01:46",
          "updated_at": "2025-06-20 06:01:46"
        }
      ]
    }
  ],
  "status": {
    "code": 200,
    "description": "OK"
  }
}
```

### 🧾 Penjelasan Struktur JSON

#### 🔹 Transaksi (`results[]`)

| Field         | Keterangan                       |
| ------------- | -------------------------------- |
| `id`          | ID transaksi                     |
| `username`    | Username pembeli                 |
| `total_harga` | Total harga + ongkir             |
| `alamat`      | Alamat pengiriman                |
| `ongkir`      | Biaya kirim                      |
| `status`      | Status transaksi (`0` = pending) |
| `created_at`  | Tanggal transaksi dibuat         |
| `updated_at`  | Tanggal terakhir diubah          |

#### 🔸 Detail Transaksi (`details[]`)

| Field            | Keterangan                      |
| ---------------- | ------------------------------- |
| `product_id`     | ID produk yang dibeli           |
| `jumlah`         | Jumlah unit                     |
| `diskon`         | Diskon per item                 |
| `subtotal_harga` | Total harga item setelah diskon |

---

## 📊 Dashboard Viewer

📄 File: `public/dashboard-toko/index.php`
📌 Fitur:

- Menampilkan data dari endpoint `/api`
- Hitung total item otomatis
- Tabel Bootstrap yang responsif

---

## 👤 Pengembang

- **Nama**: Arvin Farrel Pramuditya
- **NIM** : A11.2023.15062
- **Kelas**: A11.4419
- **Matkul**: Pemrograman Web Lanjut
- **Dosen**: Aprilyani Nur Safitri, M.Kom
- **Tugas**: Ujian Akhir Semester Genap
