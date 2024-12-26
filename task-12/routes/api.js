// routes/api.js
import express from 'express';  
import StudentController from '../controllers/StudentController.js';  

const router = express.Router();

router.get("/", (req, res) => {
  res.send("Hello Express");
});

router.get("/students", StudentController.index);  // Menampilkan semua data students
router.post("/students", StudentController.store);  // Menambahkan data student baru
// router.put("/students/:id", StudentController.update);  // Mengupdate data student
// router.delete("/students/:id", StudentController.destroy);  // Menghapus data student

export default router;  
