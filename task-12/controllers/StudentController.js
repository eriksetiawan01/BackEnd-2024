import Student from "../models/Student.js"; 

// controllers/StudentController.js
import students from '../data/students.js'; 

class StudentController {
  async index(req, res) {
    const students = await Student.all();

    // data array lebih dari o
    if (students.length > 0) {
      const data = {
        message: "Menampilkan semua data students",
        data: students,
      };

      res.status(200).json(data);
    } else {
      const data = {
        message: "Students is empty",
      };

      res.status(200).json(data);
    };
  }


  async show(req, res) {
    const { id } = req.params;
    
    const students = await Student.find(id);

    if (students) {
      const data = {
        message : `Menampilkan detail students`,
        data: students,
      };

      res.status(200).json(data);
    } else {
      const data = {
        message: `Student not found`,
      };

      res.status(404).json(data);
    }
  }

  // Menambahkan data student baru
  async store(req, res) {
    const { name, nim, email, majority } = req.body;

    if (!name || !nim || !email || !majority) {
        const data = {
          message: "Semua data harus dikirim",
        };

        return res.status(422).json(data);
    }

    // else
    const students = await Student.create(req.body);

    const data = {
      message: "Menambahkan data student",
      data: students,
    };

    return res.status(201).json(data);
}

  async update(req, res) {
    const { id } = req.params;

    const student = await Student.find(id);

    if (student) {
      const student = await Student.update(id, req.body);
      const data = {
        message : `Mengedit data students`,
        data : student,
      };
      res.json(data);
    } else {
      const data = {
        message: `Student not found`,
      };
      res.status(404).json(data);
    }
  }

  async destroy(req, res) {
    const { id } = req.params;
    const student = await Student.find(id);

    if (Student) {
      await Student.delete(id);
      const data = {
        message : `Menghapus data students`,
      };

      res.status(200).json(data);
    } else {
      const data = {
        message : `Student not found`,
      };

      res.status(404).json(data);
    }
  }
}

const object = new StudentController();
export default object;
