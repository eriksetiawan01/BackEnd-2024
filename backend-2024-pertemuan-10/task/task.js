/**
 * Fungsi untuk menampilkan hasil download
 * @param {string} result - Nama file yang didownload
 */
const showDownload = (result) => {
  console.log("Download selesai");
  console.log(`Hasil Download: ${result}`);
};

/**
 * Fungsi untuk download file
 * @returns {Promise<string>} - Mengembalikan nama file yang didownload setelah delay
 */
const download = () => {
  return new Promise((resolve) => {
    setTimeout(() => {
      const result = "windows-10.exe";
      resolve(result);
    }, 3000);
  });
};

/**
 * Eksekusi menggunakan Async/Await
 */
const startDownload = async () => {
  const result = await download();
  showDownload(result);
};

startDownload();
