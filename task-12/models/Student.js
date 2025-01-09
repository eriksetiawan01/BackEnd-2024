import db from "../config/database.js"; // Gunakan import jika menggunakan ES6 modules
import students from "../data/students.js";

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


    static find(id) {
        return new Promise((resolve, reject) => {
            const sql = "SELECT * FROM students WHERE id = ?";
            db.query(sql, id, (err, results) => {
                // destructing array
                const [student] = results;
                resolve(student);
             });
        });
    }

    // Method untuk menambahkan student baru
    static async create(data) {
        // melakukan insert data ke database
        const id = await new Promise((resolve, reject) => {
            const sql = "INSERT INTO students SET ?";
            db.query(sql, data, (err, results) => {
                resolve(results.insertId);
            });
        });

        const students = this.find(id);
        return students;
    }

    static find(id) {
        return new Promise((resolve, reject) => {
            const sql = "SELECT * FROM students WHERE id = ?";
            db.query(sql, id, (err, results) => {
                // Destructing array
                const [student] = results;
                resolve(student);
            });
        });
    }

    static async update(id, data) {
        await new Promise((resolve, reject) => {
            const sql = "UPDATE students SET ? WHERE id = ?";
            db.query(sql, [data, id], (err, results) => {
                resolve(results);
            });
        });

        // mencari data yang baru di update
        const students = await this.find(id);
        return students;
    }

    static delete(id) {
        return new Promise((resolve, reject) => {
            const sql = "DELETE FROM students WHERE id = ?";
            db.query(sql, id, (err, results) => {
                resolve(results);
            });
        });
    }
}

export default Student;  // Gunakan export default
