// controllers/StudentController.js
import students from '../data/students.js';

class StudentController {
  index(req, res) {
    const data = {
      message: "Menampilkan semua students",
      data: students,  // Menampilkan data students
    };
    res.json(data);
  }

  store(req, res) {
    const { name } = req.body;

    const newStudent = {
      id: students.length + 1,  // ID baru berdasarkan jumlah students yang ada
      name: name,
    };

    students.push(newStudent);  // Menambahkan student baru ke dalam array

    const data = {
      message: `Menambahkan data student : ${name}`,
      data: newStudent,
    };

    res.json(data);
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
