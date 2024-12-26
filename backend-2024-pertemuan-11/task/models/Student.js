import db from "../config/database.js"; // Gunakan import jika menggunakan ES6 modules

class Student {
    // Method untuk mendapatkan semua students
    static all() {
        const query = "SELECT * FROM students";
        
        // Menggunakan Promise untuk menangani query asinkron
        return new Promise((resolve, reject) => {
            db.query(query, (err, results) => {
                if (err) {
                    reject(err); // Jika ada error, reject Promise
                } else {
                    resolve(results); // Jika berhasil, resolve dengan hasil query
                }
            });
        });
    }

    // Method untuk menambahkan student baru
    static create(name) {
        const query = "INSERT INTO students (name) VALUES (?)";

        return new Promise((resolve, reject) => {
            db.query(query, [name], (err, results) => {
                if (err) {
                    reject(err);  // Jika ada error, reject Promise
                } else {
                    resolve(results);  // Jika berhasil, resolve dengan hasil query
                }
            });
        });
    }
}

export default Student;  // Gunakan export default
