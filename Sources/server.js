const express = require('express');
const cors = require('cors');
const mysql = require('mysql');

const app = express();
const port = 3000;

const corsOptions = {
  origin: 'http://localhost/Webprog2_Hulladekkezeles',
  methods: 'GET,HEAD,PUT,PATCH,POST,DELETE',
  credentials: true,
  optionsSuccessStatus: 204,
};

app.use(cors());
app.use(express.json());

const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'hulladek',
});

db.connect((err) => {
  if (err) {
    console.error('Database connection error: ' + err.stack);
    return;
  }
  console.log('Connected to database as id ' + db.threadId);
});

// GET all entries
app.get('/szolgaltatas', (req, res) => {
  db.query('SELECT * FROM szolgaltatas', (err, results) => {
    if (err) throw err;
    res.json(results);
  });
});

// GET a specific entry by ID
app.get('/szolgaltatas/:id', (req, res) => {
  const id = req.params.id;
  db.query('SELECT * FROM szolgaltatas WHERE id = ?', [id], (err, results) => {
    if (err) throw err;
    res.json(results[0]);
  });
});

// POST a new entry
app.post('/szolgaltatas', (req, res) => {
  const { tipus, jelentes } = req.body;
  db.query(
    'INSERT INTO szolgaltatas (tipus, jelentes) VALUES (?, ?)',
    [tipus, jelentes],
    (err, result) => {
      if (err) throw err;
      res.json({ id: result.insertId, tipus, jelentes });
    }
  );
});

// PUT update an existing entry
app.put('/szolgaltatas/:id', (req, res) => {
  const id = req.params.id;
  const { tipus, jelentes } = req.body;
  db.query(
    'UPDATE szolgaltatas SET tipus = ?, jelentes = ? WHERE id = ?',
    [tipus, jelentes, id],
    (err, result) => {
      if (err) throw err;
      res.json({ id, tipus, jelentes });
    }
  );
});

// DELETE an entry
app.delete('/szolgaltatas/:id', (req, res) => {
  const id = req.params.id;
  db.query('DELETE FROM szolgaltatas WHERE id = ?', [id], (err, result) => {
    if (err) throw err;
    res.json({ message: 'Deleted', id });
  });
});

app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
