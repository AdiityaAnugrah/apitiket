# API PRODUK

APi sebuah tiket dengan menggunakan PHP Native OOP

untuk endpointnya :

1. Menyimpan/Mengubah Data Produk:

Endpoint: http://localhost/apitiket/api.php?action=save_or_update
Method: POST
Parameter POST: kode, nama, harga, expired_date, status
Deskripsi: Endpoint ini digunakan untuk menyimpan atau mengubah data produk ke dalam database. Jika masa expired kurang dari 10 hari dari masa simpan/ubah, produk akan mendapatkan diskon 10%. Jika sudah expired, data akan tetap tersimpan dengan status "expired". Respon sukses jika berhasil, dan gagal jika terjadi kesalahan.

2. Mengambil Data Produk Berdasarkan Kode:

Endpoint: http://localhost/apitiket/api.php?action=get_by_code&kode={kode_produk}
Method: GET
Parameter GET: kode (kode produk yang ingin dicari)
Deskripsi: Endpoint ini digunakan untuk mengambil detail data produk berdasarkan kode. Jika data ditemukan, akan mengembalikan detail produk. Jika tidak ditemukan, akan memberikan respon "Produk tidak ditemukan".

3. Mengambil Semua Data Produk (Paging):

Endpoint: http://localhost/apitiket/api.php?action=get_all_paging&page={nomor_halaman}&limit={jumlah_data_per_halaman}
Method: GET
Parameter GET: page (nomor halaman), limit (jumlah data per halaman)
Deskripsi: Endpoint ini digunakan untuk mengambil daftar semua data produk dengan sistem paging. Akan mengembalikan daftar produk sesuai dengan halaman dan batas yang ditentukan.

4. Menghapus Data Produk:

Endpoint: http://localhost/apitiket/api.php?action=delete&kode={kode_produk}
Method: GET
Parameter GET: kode (kode produk yang ingin dihapus)
Deskripsi: Endpoint ini digunakan untuk menghapus data produk berdasarkan kode. Data yang dihapus dapat direstore kembali suatu saat.

## Peringatan!

Proyek ini mengandung berbagai bagian yang mungkin diambil dari berbagai pihak, dan penggunaan materi dari sumber eksternal dapat berlaku. Harap diperhatikan bahwa:

---
