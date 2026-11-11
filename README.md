# ⚔️ CV RPG Website - Interactive Curriculum Vitae

> Website CV interaktif bertema RPG Fantasy Game, dibangun dengan Laravel 12 dan MySQL.

---

## 🎮 Tentang Project

Website ini adalah CV digital pribadi dengan konsep **RPG Fantasy Adventure**. Halaman publik menampilkan informasi CV layaknya Character Sheet dalam game RPG, sementara halaman admin memungkinkan pengelolaan seluruh konten secara dinamis.

**Dibeveloped by:** Gisaldapa  
**NIM:** 2430511023  
**Tech Stack:** Laravel 12 | PHP 8.3 | MySQL | Tailwind CSS | Alpine.js

---

## 🖥️ Halaman Utama

| URL | Keterangan |
|-----|-----------|
| `/` | Halaman beranda (Character Introduction) |
| `/profile` | Profil lengkap (Character Sheet) |
| `/education` | Riwayat pendidikan (Adventure Timeline) |
| `/skills` | Daftar keahlian (Skill Tree) |
| `/experience` | Pengalaman kerja (Adventure Log) |
| `/certificates` | Sertifikat (Achievement Collection) |
| `/hobbies` | Hobi (Side Quests) |
| `/contact` | Kontak (Communication Hub) |
| `/admin/login` | Halaman login admin |
| `/admin/dashboard` | Dashboard admin |

---

## 📋 Persyaratan Sistem

- **PHP:** 8.2 atau lebih baru
- **Composer:** 2.x
- **Node.js:** 18.x atau lebih baru
- **npm:** 8.x atau lebih baru
- **MySQL:** 8.0 atau lebih baru
- **Laravel:** 12.x

---

## ⚙️ Instalasi di Localhost

### 1. Clone / Unduh Project

```bash
git clone <repo-url> cv_gisaldapa_2430511023
cd cv_gisaldapa_2430511023
```

Atau ekstrak ZIP ke folder web server (misalnya `c:\laragon\www\cv_gisaldapa_2430511023`).

### 2. Install Dependencies PHP

```bash
composer install
```

### 3. Install Dependencies JavaScript

```bash
npm install
```

### 4. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
# atau di Windows:
copy .env.example .env
```

Edit file `.env`:

```env
APP_NAME="CV RPG Website"
APP_ENV=local
APP_KEY=                   # Akan digenerate otomatis
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cv_rpg_website
DB_USERNAME=root
DB_PASSWORD=               # Sesuaikan dengan password MySQL Anda
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Buat Database MySQL

Buka MySQL dan jalankan:

```sql
CREATE DATABASE cv_rpg_website CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Atau via command line:

```bash
mysql -u root -p -e "CREATE DATABASE cv_rpg_website CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

### 7. Jalankan Migration

```bash
php artisan migrate
```

### 8. Jalankan Seeder (Buat Admin + Data Awal)

```bash
php artisan db:seed
```

> **Akun Admin Default:**  
> Email: `admin@cvgisaldapa.com`  
> Password: `admin123`  
> ⚠️ **Segera ganti password setelah login pertama!**

### 9. Buat Symbolic Link Storage

```bash
php artisan storage:link
```

### 10. Build Assets

```bash
# Development
npm run dev

# Production (untuk hosting)
npm run build
```

### 11. Jalankan Server

```bash
php artisan serve
```

Buka browser: `http://localhost:8000`

---

## 🌐 Deployment ke Hosting

### A. Shared Hosting (cPanel)

1. **Upload file project** ke folder `public_html` atau subdomain, **kecuali** folder `public`. Isi folder `public` dipindah ke `public_html`.

2. **Pindahkan isi folder `public`:**
   ```
   public_html/index.php       ← dari public/index.php
   public_html/assets/         ← dari public/assets/
   public_html/.htaccess       ← dari public/.htaccess
   ```

3. **Edit `public_html/index.php`**, ubah path ke application:
   ```php
   require __DIR__.'/../laravel/vendor/autoload.php';
   $app = require_once __DIR__.'/../laravel/bootstrap/app.php';
   ```
   > Sesuaikan path `../laravel/` dengan lokasi folder project Anda.

4. **Buat database** via cPanel → MySQL Databases.

5. **Upload file SQL** atau jalankan migration via SSH:
   ```bash
   php artisan migrate --seed
   ```

6. **Konfigurasi `.env`** di server:
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://domain-anda.com
   
   DB_HOST=localhost
   DB_DATABASE=nama_database
   DB_USERNAME=username_db
   DB_PASSWORD=password_db
   ```

7. **Storage link:**
   ```bash
   php artisan storage:link
   ```
   
   Jika SSH tidak tersedia, buat symlink manual atau gunakan `.htaccess` redirect.

8. **Build assets** sebelum upload:
   ```bash
   npm run build
   ```
   Upload folder `public/build` ke server.

9. **Set permissions:**
   ```bash
   chmod -R 755 storage bootstrap/cache
   chmod -R 644 .env
   ```

### B. VPS / Cloud Server

1. Install LEMP/LAMP stack + PHP 8.2+, Composer, Node.js.

2. Clone project:
   ```bash
   git clone <repo> /var/www/cv-rpg
   cd /var/www/cv-rpg
   composer install --optimize-autoloader --no-dev
   npm install && npm run build
   ```

3. Configure `.env` untuk production.

4. Setup Nginx/Apache virtual host dengan document root ke `/var/www/cv-rpg/public`.

5. Run migrations:
   ```bash
   php artisan migrate --seed
   php artisan storage:link
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

6. Set permissions:
   ```bash
   chown -R www-data:www-data /var/www/cv-rpg
   chmod -R 755 /var/www/cv-rpg/storage /var/www/cv-rpg/bootstrap/cache
   ```

---

## 🔧 Konfigurasi `.env` untuk Production

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domain-anda.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username_database
DB_PASSWORD=password_database

FILESYSTEM_DISK=public
```

---

## 🛡️ Keamanan

- Semua password di-hash menggunakan `bcrypt`
- CSRF protection aktif di semua form
- Middleware `auth` melindungi seluruh route admin
- Validasi input di semua form
- Upload file divalidasi (jpg, jpeg, png, webp, max 2MB)

---

## 🖼️ Mengatasi Masalah Gambar

Jika gambar tidak tampil:

1. Pastikan storage link sudah dibuat:
   ```bash
   php artisan storage:link
   ```

2. Di shared hosting tanpa SSH, buat symlink manual:
   - Buat folder `public/storage`
   - Arahkan ke `storage/app/public`
   
3. Atau gunakan `.htaccess` di `public/storage`:
   ```apache
   # Redirect to actual storage
   ```

---

## 👤 Manajemen Admin

### Buat Admin Baru via Artisan:
```bash
php artisan tinker
# Lalu:
App\Models\User::create(['name' => 'Admin', 'email' => 'admin@email.com', 'password' => Hash::make('password123')]);
```

### Reset Password:
```bash
php artisan tinker
App\Models\User::where('email', 'admin@email.com')->update(['password' => Hash::make('newpassword')]);
```

---

## 📁 Struktur Folder Penting

```
cv_gisaldapa_2430511023/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          ← Controller admin
│   │   └── Public/         ← Controller halaman publik
│   └── Models/             ← Eloquent models
├── database/
│   ├── migrations/         ← Struktur database
│   └── seeders/            ← Data awal
├── resources/
│   ├── css/app.css         ← RPG theme CSS
│   ├── js/app.js           ← JavaScript
│   └── views/
│       ├── layouts/        ← Template layouts
│       ├── public/         ← Halaman publik
│       └── admin/          ← Halaman admin
├── routes/web.php          ← Definisi routes
├── storage/app/public/     ← Folder upload gambar
└── .env                    ← Konfigurasi environment
```

---

## ❓ FAQ

**Q: Halaman publik tidak menampilkan data?**  
A: Pastikan seeder sudah dijalankan (`php artisan db:seed`) dan data sudah diisi melalui admin dashboard.

**Q: Upload gambar gagal?**  
A: Pastikan `storage:link` sudah dijalankan dan folder `storage/app/public` memiliki permission write.

**Q: CSS/JS tidak loading?**  
A: Jalankan `npm run build` dan pastikan file di `public/build` sudah ada.

**Q: Tidak bisa login admin?**  
A: Pastikan seeder sudah dijalankan. Email: `admin@cvgisaldapa.com`, Password: `admin123`.

---

## 📄 Lisensi

Project ini dibuat untuk keperluan akademik. Hak cipta © 2024 Gisaldapa.
