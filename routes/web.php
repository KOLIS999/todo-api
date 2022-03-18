<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded  N by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Web.php
 * 
 * Digunakan untuk mendaftarkan route, route adalah format endpoint untuk melakukan
 * akses kedalam website, contoh: http://localhost:8000/login & http://localhost:8000/register.
 * 
 * Kalau kita belum melakukan pendaftaran route disini (contoh seperti di bawah), maka Laravel
 * akan menampilkan error 404. Jadi setiap kali kita mau buat halaman baru, harus di daftarin dulu
 * di sini (atau di api.php kalau develop API).
 * 
 * Di Laravel, ada beberapa jenis route, yakni:
 * 
 * Route::get
 * -> Digunakan untuk menampilkan halaman yang ingin di tuju.
 * 
 * Route::post
 * -> Digunakan untuk memasukkan/menginput data ke database.
 * 
 * Route::put
 * -> Digunakan untuk melakukan update data secara keseluruhan dari database.
 *   -> Contoh:
 *      Di database ada data, formatnya { id: 1, nama: "Andre", email: "andre@gmail.com" }
 *      Kalau pakai put, kita harus update semua, PUT - http://localhost:8000/users/1 - { nama: "Alex", email: "alex@gmail.com" }
 *      Script [PUT -]  artinya kita mau akses data user dengan ID 1, kemudian kita mau update semua datanya jadi Alex
 * 
 * Route::patch
 * -> Digunakan untuk melakukan update data secara spesifik dari database.
 *   -> Contoh:
 *      Di database ada data, formatnya { id: 1, nama: "Thomas", email: "thomas@gmail.com" }
 *      Kalau pakai patch, kita bisa mengabaikan yang lainnya, misalkan mau update nama nya aja, PATCH - http://localhost:8000/users/1 - { nama: "Yoga" }
 *      Nanti di database hasilnya jadi { id: 1, nama: "Yoga", email "thomas@gmail.com" }
 * 
 * Route::delete
 * -> Digunakan untuk melakukan penghapusan data dari database.
 *   -> Contoh:
 *     Di database ada data, formatnya { id: 1, nama: "Adrian", email: "adrian@gmail.com" }
 *     Kita bisa hapus data itu pakai metode delete, DELETE - http://localhost:8000/users/1
 *     Nanti di database, user dengan ID 1 bakal kehapus.
 * 
 * [CATATAN]
 * Route get, post, put, patch & delete ini, di pakai juga di [api.php],
 * fungsinya sama persis seperti diatas, bedanya, kalau di [api.php], metode [get],
 * dia gk nampilin HTML.
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return "<h6>halo dari /login</h6>";
});

Route::get('/register', function () {
    return "halo dari /register";
});


// Sistem wildcard "/route/{variabel}"
//
// Wildcard ini digunakan untuk menampilkan data secara dinamis,
// disini kasusnya, kita mau nampilin user yang ID nya di pilih
// dari browser.
//
// Kita pake "/users/{id}", "{id}" ini akan ngikutin apapun yang
// kita tulis setelah "/user/".
//
// "{id}" ini penamaannya bebas, nggak harus id, selama di dalam
// "function (..)", namanya sama. misal:
//
// Route::get('/users/{email}', function ($email) {
//    ..
// });
//
// 
// [ERROR - Karena {email} tidak sama dengan $password (ketika pakai controller)]
// Route::get('/users/{email}', function ($password) {
//    ..
// });
//
Route::get('/users/{id}', function ($id) {
    return "User dengan ID " . $id;
});