// app.js
import express from 'express'; 
import router from './routes/api.js'; 

const app = express();


app.use(express.json());  
app.use(express.urlencoded({ extended: true }));  

// Menggunakan routing
app.use(router);

// Mendefinisikan port
const port = 3000;
app.listen(port, () => {
  console.log(`Server berjalan di http://localhost:${port}`);
});
