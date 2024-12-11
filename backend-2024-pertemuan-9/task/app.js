/**
 * TODO 9:
 * - Import semua method FruitController
 * - Refactor variable ke ES6 Variable
 *
 * @hint - Gunakan Destructing Object
 */

const { index, store, update, destroy } = require('./Controller/FruitController.js');

/**
 * NOTES:
 * - Fungsi main tidak perlu diubah
 * - Jalankan program: node app.js
 */
const main = () => {
  console.log("Method index - Menampilkan Buah");
  index();
  console.log("\nMethod store - Menambahkan buah Mangga");
  store("mango");
  console.log("\nMethod update - Update data 0 menjadi Coconut");
  update(0, "coconut");
  console.log("\nMethod destroy - Menghapus data 0");
  destroy(0);
};

main();
