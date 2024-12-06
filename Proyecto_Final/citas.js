app.post('/citas', (req, res) => {
    const { paciente_id, fecha, hora, detista, tratamiento } = req.body;
    // Lógica para insertar la cita en la base de datos
    db.query(
        'INSERT INTO citas (paciente_id, fecha, hora, odontologo, tratamiento) VALUES (?, ?, ?, ?, ?)',
        [paciente_id, fecha, hora, dentista, tratamiento],
        (err, result) => {
            if (err) return res.status(500).json({ error: err.message });
            res.status(201).json({ id: result.insertId, mensaje: 'Cita agendada' });
        }
    );
});
app.get('/citas/:fecha', (req, res) => {
    const { fecha } = req.params;
    db.query(
        'SELECT * FROM citas WHERE fecha = ?',
        [fecha],
        (err, result) => {
            if (err) return res.status(500).json({ error: err.message });
            res.json(result);
        }
    );
});
app.put('/citas/:id', (req, res) => {
    const { id } = req.params;
    const { estado } = req.body;
    db.query(
        'UPDATE citas SET estado = ? WHERE id = ?',
        [estado, id],
        (err, result) => {
            if (err) return res.status(500).json({ error: err.message });
            res.json({ mensaje: 'Cita actualizada' });
        }
    );
});
