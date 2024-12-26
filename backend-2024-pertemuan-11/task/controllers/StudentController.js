import Student from "../models/Student.js"; 

// controllers/StudentController.js
import students from '../data/students.js'; 

class StudentController {
  async index(req, res) {
    try {
      const students = await Student.all();  // Menggunakan await untuk menangani Promise
      const data = {
        message: "Menampilkan semua students",
        data: students,  // Menampilkan data students
      };
      res.json(data);
    } catch (err) {
      res.status(500).json({ message: "Terjadi kesalahan", error: err.message });
    }
  }

  // Menambahkan data student baru
  async store(req, res) {
    const { name } = req.body;

    if (!name) {
        return res.status(400).json({ message: "Nama siswa wajib diisi" });
    }

    try {
        // Menambahkan student baru
        const result = await Student.create(name);

        const data = {
            message: `Menambahkan data student: ${name}`,
            data: { id: result.insertId, name },  // Mengembalikan id dan name siswa
        };

        res.status(201).json(data);
    } catch (err) {
        res.status(500).json({ message: "Gagal menambahkan student", error: err.message });
    }
}

  update(req, res) {
    const { id } = req.params;
    const { name } = req.body;

    const student = students.find(student => student.id === parseInt(id));

    if (student) {
      student.name = name;  // Mengupdate nama student

      const data = {
        message: `Mengedit student id ${id}, nama menjadi ${name}`,
        data: student,
      };

      res.json(data);
    } else {
      res.status(404).json({ message: `Student dengan id ${id} tidak ditemukan` });
    }
  }

  destroy(req, res) {
    const { id } = req.params;

    const studentIndex = students.findIndex(student => student.id === parseInt(id));

    if (studentIndex !== -1) {
      const deletedStudent = students.splice(studentIndex, 1);

      const data = {
        message: `Menghapus student id ${id}`,
        data: deletedStudent,
      };

      res.json(data);
    } else {
      res.status(404).json({ message: `Student dengan id ${id} tidak ditemukan` });
    }
  }
}

const object = new StudentController();
export default object;
