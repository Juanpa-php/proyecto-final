CREATE DATABASE consultorio_dental;
USE consultorio_dental;

CREATE TABLE pacientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    edad INT NOT NULL,
    correo VARCHAR(255) NOT NULL
);


CREATE TABLE dentistas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    especialidad VARCHAR(100),
    telefono VARCHAR(15),
    email VARCHAR(100)
);
CREATE TABLE citas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT,
    dentista_id INT,
    fecha DATE,
    hora TIME,
    tratamiento VARCHAR(255),
    FOREIGN KEY (paciente_id) REFERENCES pacientes(id),
    FOREIGN KEY (dentista_id) REFERENCES dentistas(id)
);

CREATE TABLE tratamientos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT,
    dentista_id INT,
    tratamiento VARCHAR(255),
    fecha DATE,
    costo DECIMAL(10, 2),
    FOREIGN KEY (paciente_id) REFERENCES pacientes(id),
    FOREIGN KEY (dentista_id) REFERENCES dentistas(id)
);

create table login(
	Usuario varchar(50) primary key,
    Contraseña varchar(50)
);