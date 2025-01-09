import mysql from "mysql";
import dotenv from "dotenv";

// Load konfigurasi dari file .env
dotenv.config();

const {
  DB_HOST,
  DB_USERNAME,
  DB_PASSWORD,
  DB_DATABASE,
} = process.env;

// Konfigurasi koneksi database
const db = mysql.createConnection({
  host: DB_HOST,
  user: DB_USERNAME,
  password: DB_PASSWORD,
  database: DB_DATABASE,
});

// Koneksi ke database
db.connect((err) => {
  if (err) {
    console.log("Error Connecting: " + err.stack);
    return;
  } else {
    console.log("Connected to database");
  }
});

export default db;
