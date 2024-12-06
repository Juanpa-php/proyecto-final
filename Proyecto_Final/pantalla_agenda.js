import React, { useState, useEffect } from 'react';

function Agenda() {
    const [citas, setCitas] = useState([]);
    const [fecha, setFecha] = useState('');

    useEffect(() => {
        if (fecha) {
            fetch(`/api/citas/${fecha}`)
                .then(res => res.json())
                .then(data => setCitas(data));
        }
    }, [fecha]);

    return (
        <div>
            <h1>Agenda del Consultorio Dental</h1>
            <input
                type="date"
                value={fecha}
                onChange={e => setFecha(e.target.value)}
            />
            <table>
                <thead>
                    <tr>
                        <th>Hora</th>
                        <th>Paciente</th>
                        <th>dentista</th>
                        <th>Tratamiento</th>
                    </tr>
                </thead>
                <tbody>
                    {citas.map(cita => (
                        <tr key={cita.id}>
                            <td>{cita.hora}</td>
                            <td>{cita.paciente_nombre}</td>
                            <td>{cita.dentista}</td>
                            <td>{cita.tratamiento}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
}

export default Agenda;
