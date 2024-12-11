/**
 * TODO 3:
 * - import fruits dari data/fruits.js
 * - refactor variabel ke ES6 variable
 */
const fruits = require('../data/fruits.js');

/**
 * TODO 4:
 * - Buat method index.
 * - Refactor function ke ES6 Arrow Function
 * - Tampilkan data fruits.
 *
 * @hint - Gunakan looping for of
 */
const index = () => {
    for (const fruit of fruits) {
        console.log(fruit);
    }
};

/**
 * TODO 5:
 * - Buat method store.
 * - Refactor function ke ES6 Arrow Function
 * - Menambahkan data baru ke array fruits.
 *
 * @param {string} name - Nama buah.
 *
 * @hint - Gunakan method push
 */
const store = (name) => {
    fruits.push(name);
    console.log(`Buah "${name}" berhasil ditambahkan!`);
    index();
};

/**
 * TODO 6:
 * - Buat method update.
 * - Refactor function ke ES6 Arrow Function
 * - Memperbarui data fruits.
 *
 * @param {number} position - Posisi atau index yang ingin diupdate.
 * @param {string} name - Nama buah yang baru.
 */
const update = (position, name) => {
    if (position < 0 || position >= fruits.length) {
        console.log('Posisi tidak valid! Silakan masukkan indeks yang benar.');
        return;
    }
    const oldName = fruits[position];
    fruits[position] = name; // Memperbarui nama buah pada indeks tertentu
    console.log(`Buah "${oldName}" pada posisi ${position} berhasil diperbarui menjadi "${name}".`);
    index(); // Memanggil fungsi index untuk menampilkan daftar buah terkini
};

/**
 * TODO 7:
 * - Buat method destroy.
 * - Refactor function ke ES6 Arrow Function
 * - Menghapus data fruits.
 *
 * @param {number} position - Posisi atau index yang ingin dihapus
 *
 * @hint - Gunakan method splice
 */
const destroy = (position) => {
    if (position < 0 || position >= fruits.length) {
        console.log('Posisi tidak valid! Silakan masukkan indeks yang benar.');
        return;
    }
    const removed = fruits.splice(position, 1); // Menghapus elemen pada posisi tertentu
    console.log(`Buah "${removed}" pada posisi ${position} berhasil dihapus.`);
    index(); // Memanggil fungsi index untuk menampilkan daftar buah terkini
};

/**
 * TODO 8: export method index, store, update, dan destroy
 */
module.exports = { index, store, update, destroy };
