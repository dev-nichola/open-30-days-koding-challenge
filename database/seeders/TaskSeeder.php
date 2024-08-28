<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $tasks = [
            [
                'title' => 'Day 1: Membuat CRUD Laravel Simple',
                'goal' => 'Membangun aplikasi sederhana dengan fungsi CRUD (Create, Read, Update, Delete) menggunakan Laravel.',
                'task' => 'Mulailah dengan membuat project Laravel baru, lalu buat model, migration, controller, dan views untuk mengelola data produk.'
            ],
            [
                'title' => 'Day 2: Menambahkan Relasi One-to-Many',
                'goal' => 'Memahami dan mengimplementasikan relasi one-to-many dalam Laravel.',
                'task' => 'Buat tabel kategori dan hubungkan dengan produk menggunakan relasi one-to-many. Implementasikan relasi ini di model dan tampilkan data terkait di halaman produk.'
            ],
            [
                'title' => 'Day 3: Menambahkan Relasi Many-to-Many',
                'goal' => 'Memahami dan mengimplementasikan relasi many-to-many dalam Laravel.',
                'task' => 'Buat tabel tags dan hubungkan dengan produk menggunakan relasi many-to-many. Buat interface untuk mengelola tags pada produk.'
            ],
            [
                'title' => 'Day 4: Slicing Admin Panel',
                'goal' => 'Membuat layout dasar untuk admin panel dengan menggunakan template Bootstrap.',
                'task' => 'Integrasikan template admin panel dengan Laravel. Buat header, sidebar, dan footer yang konsisten di setiap halaman.'
            ],
            [
                'title' => 'Day 5: Menambahkan Autentikasi User',
                'goal' => 'Mengimplementasikan sistem autentikasi user (manual jangan pakai breeze atau fortify)',
                'task' => 'Instalasi dan konfigurasi kemudian buat halaman login, register, dan reset password poin plus'
            ],
            [
                'title' => 'Day 6: Implementasi Middleware untuk Auth',
                'goal' => 'Menggunakan middleware untuk membatasi akses ke beberapa bagian aplikasi berdasarkan status autentikasi.',
                'task' => 'Buat middleware baru untuk membatasi akses ke halaman admin hanya untuk user yang telah login. Terapkan middleware ini pada route yang sesuai.'
            ],
            [
                'title' => 'Day 7: Validasi Formulir',
                'goal' => 'Menambahkan validasi data pada formulir dengan menggunakan fitur validasi Laravel.',
                'task' => 'Tambahkan validasi pada formulir pendaftaran dan edit data. Tampilkan pesan kesalahan validasi jika data tidak sesuai.'
            ],
            [
                'title' => 'Day 8: Mengimplementasikan Pagination',
                'goal' => 'Menerapkan pagination pada daftar data untuk meningkatkan performa dan pengalaman pengguna.',
                'task' => 'Tambahkan pagination pada halaman daftar produk. Gunakan fitur pagination Laravel untuk membagi data menjadi beberapa halaman.'
            ],
            [
                'title' => 'Day 9: Menggunakan Query Builder',
                'goal' => 'Mengoptimalkan query database dengan Query Builder Laravel.',
                'task' => 'Gunakan Query Builder untuk menampilkan data produk dengan filter, sorting, dan pencarian. Implementasikan fitur pencarian di halaman daftar produk.'
            ],
            [
                'title' => 'Day 10: Menambahkan Fitur Upload File',
                'goal' => 'Mengimplementasikan fitur upload file untuk produk atau user profile.',
                'task' => 'Tambahkan fungsionalitas upload file untuk gambar produk atau profil pengguna. Tampilkan gambar yang diunggah di halaman detail produk atau profil.'
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
