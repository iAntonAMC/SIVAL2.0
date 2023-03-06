-- ----------------------------------------------------------------------------------------------------
-- Tablas para el módulo de funciones generales
DROP TABLE IF EXISTS periodos;
CREATE TABLE periodos(
    id_periodo INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    periodo VARCHAR(10) NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_final DATE NOT NULL
)ENGINE=INNODB;


DROP TABLE IF EXISTS alumnos_inscritos;
CREATE TABLE alumnos_inscritos(
    id_alumno INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    matricula VARCHAR(10) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellido_paterno VARCHAR(100) NOT NULL,
    apellido_materno VARCHAR(100),
    carrera VARCHAR(50) NOT NULL,
    cuatrimestre INTEGER(1) NOT NULL CHECK(cuatrimestre BETWEEN 1 AND 11),
    grupo VARCHAR(10) NOT NULL,
    periodo VARCHAR(10) NOT NULL,
    qr_data VARCHAR(150) NOT NULL,
)ENGINE=INNODB;

CREATE UNIQUE INDEX alumno_inscrito ON alumnos_inscritos(matricula, nombre, apellido_paterno, apellido_materno, periodo);


DROP TABLE IF EXISTS visitantes;
CREATE TABLE visitantes(
    id_visitante INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellido_paterno VARCHAR(100) NOT NULL,
    apellido_materno VARCHAR(100),
    ocupacion VARCHAR(100) NOT NULL,
    motivo_visita VARCHAR(100) NOT NULL,
    qr_data VARCHAR(150) NOT NULL,
    qr_status VARCHAR(50) NOT NULL CHECK(qr_status = 'active' OR qr_status  = 'expired' OR qr_status = 'pendient')
)ENGINE=INNODB;


DROP TABLE IF EXISTS laboratorios;
CREATE TABLE laboratorios(
    id_laboratorio INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR (50) NOT NULL,
    edificio VARCHAR(6) NOT NULL,
    planta VARCHAR(2) NOT NULL CHECK(planta = "PB" OR planta="PA"),  -- PB es para 'Planta Baja' y PA para 'Planta Alta'
    aforo_max INTEGER DEFAULT 0 CHECK(aforo_max>=0),
)ENGINE=INNODB;

CREATE INDEX indx_laboratorios ON laboratorios(id_laboratorio, nombre, edificio);


DROP TABLE IF EXISTS registros_accesos;
CREATE TABLE registros_accesos(
    no_registro INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_acceso INTEGER NOT NULL,
    fecha DATE NOT NULL DEFAULT CURRENT_DATE CHECK(fecha BETWEEN '2000-01-01' AND '2025-01-01'),
    hora_entrada TIME NOT NULL DEFAULT CURRENT_TIME,
    hora_salida TIME DEFAULT NULL,
    FOREIGN KEY (id_acceso) REFERENCES alumnos_inscritos(id_alumno),
    FOREIGN KEY (id_acceso) REFERENCES visitantes(id_visitante)
)ENGINE=INNODB;

CREATE INDEX entradas_utec ON registros_dias(no_registro, id_acceso, fecha, hora_entrada);
CREATE INDEX salidas_utec ON registros_dias(no_registro, id_acceso, fecha, hora_salida);


DROP TABLE IF EXISTS registros_labs;
CREATE TABLE registros_labs(
    no_registro INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_acceso INTEGER NOT NULL,
    id_laboratorio INTEGER NOT NULL,
    fecha DATE NOT NULL DEFAULT CURRENT_DATE CHECK(fecha BETWEEN '2000-01-01' AND '2025-01-01'),
    hora_entrada TIME NOT NULL DEFAULT CURRENT_TIME,
    hora_salida DATE DEFAULT NULL,
    FOREIGN KEY (id_acceso) REFERENCES alumnos_inscritos(id_alumno),
    FOREIGN KEY (id_laboratorio) REFERENCES laboratorios(id_laboratorio)
)ENGINE=INNODB;

CREATE INDEX entradas_lab ON registros_labs(id_acceso, id_laboratorio, fecha_registro, hora_entrada);
CREATE INDEX salidas_lab ON registros_labs(id_acceso, id_laboratorio, fecha_registro, hora_salida);



-- ----------------------------------------------------------------------------------------------------
-- Tablas para el módulo de usuario (roles)
DROP TABLE IF EXISTS admins;
CREATE TABLE admins (
    id_admin INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(150) NOT NULL,
    apellido_paterno VARCHAR(100) NOT NULL,
    apellido_materno VARCHAR(100),
    username TEXT(50) NOT NULL,
    passwd TEXT(32) NOT NULL,
    status INTEGER NOT NULL CHECK(status = 1 OR status = 0)  -- Status 1 : Activo y Status 0 : Inactivo
)ENGINE=INNODB;

CREATE INDEX admins ON admins(id_admin, nombre, estado);
CREATE INDEX admins_user_passwd ON admins(username, passwd);


DROP TABLE IF EXISTS autoridades;
CREATE TABLE autoridades (
    id_autoridad INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(150) NOT NULL,
    apellido_paterno VARCHAR(100) NOT NULL,
    apellido_materno VARCHAR(100),
    cargo INTEGER(1) NOT NULL CHECK (cargo = 1 OR cargo = 2)  -- Rol 1 : Coordinador y Rol 2 : Profesor
    area TEXT(100) NOT NULL,
    username TEXT(32) NOT NULL,
    passwd TEXT(32) NOT NULL,
    status INTEGER NOT NULL CHECK(status = 1 OR status = 0)
)ENGINE=INNODB;

CREATE INDEX coordis ON coordinadores(id_autoridad, nombre, area, estado);
CREATE INDEX coordis_user_passwd ON coordinadores(username, passwd);



-- ----------------------------------------------------------------------------------------------------
-- Insertar registros en Tabla 'Periodos'
INSERT INTO periodos (periodo, fecha_inicio, fecha_final) VALUES
    ('EA2022', '2022-01-01', '2022-04-15'),
    ('MA2022', '2022-05-01', '2022-08-19'),
    ('SD2022', '2022-09-01', '2022-12-19');


-- ----------------------------------------------------------------------------------------------------
-- Insertar registros en Tabla 'Alumnos_Inscritos'
INSERT INTO alumnos_inscritos(matricula, nombres, apellido_p, apellido_m, carrera, cuatrimestre, grupo, turno, periodo, qr_code) VALUES
    ("1721110125", "Jesús Antonio", "Torres", "Fernández", "Ing. Software", 3, "TI31", 1, "MA2022", "1721110125&periodo=MAYO-AGOSTO2022&nombre=JESÃSANTONIOTORRESFERNÃNDEZ"),
    ("1721110895", "José Rolando", "Granados", "Rivera", "Ing. Software", 3, "TI31", 1, "MA2022", "1721110895&periodo=MAYO-AGOSTO2022&nombre=JOSÃROLANDOGRANADOSRIVERA"),
    ("1720110605", "Yessica Saraí", "Torres", "Fernández", "Ing. Nanotecnología", 6, "NANO61", 2, "MA2022", "1720110605&periodo=MAYO-AGOSTO2022&nombre=YESSICASARAÃTORRESFERNÃNDEZ"),
    ("1721110069", "Cristian Daniel", "Valeriano", "Hernández", "Ing. Software", 3, "TI31", 1, "MA2022", "1721110069&periodo=MAYO-AGOSTO2022&nombre=CRISTIANDANIELVALERIANOHERNANDEZ"),
    ("1721110477", "Fernando Majin", "Sampayo", "Pérez", "Ing. Software", 3, "TI31", 1, "MA2022", "1721110477&periodo=MAYO-AGOSTO2022&nombre=FERNANDOMAJINSAMPAYOPEREZ");


-- ----------------------------------------------------------------------------------------------------
-- Insertar registros en Tabla 'Laboratorios'
INSERT INTO laboratorios(nombre, edificio, planta, aforo_max) VALUES
    ("Química 1", "B", "PB", "20"),
    ("Centro Desarrollo 1", "B", "PB", "15"),
    ("Desarrollo PLM 1", "B", "PB", "15"),
    ("Desarrollo PLM 2", "B", "PB", "15"),
    ("Electromecánica", "B", "PB", "20"),
    ("Caracter Materiales", "F", "PB", "15"),
    ("Procesos Productivos", "F", "PB", "15"),
    ("Centro Metrología", "F", "PB", "15"),
    ("Maquinas y Herramientas", "F", "PB", "15"),
    ("Laboratorio Cómputo 1", "G", "PB", "20"),
    ("Laboratorio Cómputo 2", "G", "PB", "20"),
    ("Laboratorio Cómputo 3", "G", "PB", "20"),
    ("Laboratorio Cómputo 4", "G", "PB", "20"),
    ("Laboratorio Cómputo 5", "G", "PB", "20"),
    ("Laboratorio Cómputo 6", "G", "PB", "20"),
    ("Taller Unicel", "H", "PB", "20"),
    ("Desarrollo Energías Renovables", "H", "PB", "20"),
    ("Taller TaeKwonDo", "H", "PB", "20"),
    ("Salón Baile", "H", "PB", "20"),
    ("Cabina de Radio", "H", "PB", "10"),
    ("Salón Baile 2", "H", "PB", "20"),
    ("Desarrollo Robótica", "H", "PA", "20"),
    ("Valoración Fisioterapeuta", "J", "PB", "20"),
    ("Terapia Ocupacional", "J", "PB", "20"),
    ("Balones Suizos", "J", "PB", "20"),
    ("Electroterapia 1", "J", "PB", "15"),
    ("Electroterapia 2", "J", "PB", "15"),
    ("Terapia Física 1", "J", "PB", "20"),
    ("Terapia Física 2", "J", "PB", "15"),
    ("Química J", "J", "PA", "15"),
    ("Anatomía y Fisiología", "J", "PA", "10"),
    ("Unidad Docencia K1", "K", "PB", "20"),
    ("Unidad Docencia K2", "K", "PB", "20");


-- ----------------------------------------------------------------------------------------------------
-- Insertar registros en Tabla 'Administradores'
INSERT INTO administradores(nombres, apellido_p, apellido_m, rol, uid, passwd, estado) VALUES
    ("root", "ROOT", "SIVAL", 1, "root", "f131aa9a3c0c3d7cfce2f5f7aa3b4862", 1),
    ("José Rolando", "Granados", "Rivera", 1, "RolaX", "3899e201b0fb2d9a4646675dd75e3a1b", 1),
    ("Jesús Antonio", "Torres", "Fernández", 1, "AntonAMC", "acc2d99c2a1d1af84fa87c305903cef4", 1);


-- ----------------------------------------------------------------------------------------------------
-- Insertar registros en Tabla 'Coordinadores'
INSERT INTO coordinadores(nombres, apellido_p, apellido_m, carrera_1, carrera_2, rol, uid, passwd,estado) VALUES
    ("Rigoberto", "Garcia", "Garcia", "Ing. Software", "Diseño Digital", 2, "Rigo", "908ffce1f772d81bd842927448f5f4ad", 1),
    ("Hugo", "Villalpa", "Martinéz", "Lic. Contaduria", "Lic. Mercadotecnia", 2, "Hugo", "908ffce1f772d81bd842927448f5f4ad", 1);


-- ----------------------------------------------------------------------------------------------------
-- Insertar registros en Tabla 'Profesores'
INSERT INTO profesores(nombres, apellido_p, apellido_m, rol, uid, passwd, estado) VALUES
    ("Salvador", "Hernandez", "Garcia", 3, "SalvaHM", "23a715e49366d214390c440533a084bc", 1),
    ("Victor", "Manuel", "Garcia", 3, "VictoRS", "23a715e49366d214390c440533a084bc", 1);


-- ----------------------------------------------------------------------------------------------------
-- Insertar registros en tabla 'Vigilantes'
INSERT INTO vigilantes(nombres, apellido_p, apellido_m, turno, rol, uid, passwd, estado) VALUES
    ("Ernesto", "Garcia", "Luna", "Matutino", 4, "ErnestoG", "37fce3db9c939c61a0902387062d6294", 1),
    ("Luis", "Garcia", "Luna", "Vespertino", 4, "LuisG", "37fce3db9c939c61a0902387062d6294", 1);


-- ----------------------------------------------------------------------------------------------------
-- Insertar registros en tabla 'Registros_Dias' con fechas específicas
INSERT INTO registros_dias (id_alumno, fecha_registro) VALUES
    (1, '2022-08-01'),
    (2, '2022-08-02'),
    (3, '2022-08-03'),
    (4, '2022-08-04'),
    (5, '2022-08-05');


-- ----------------------------------------------------------------------------------------------------
-- Insertar registros en tabla 'Registros_Labs'
INSERT INTO registros_labs (id_alumno, id_laboratorio) VALUES
    (1, 2), (2, 5), (3, 1), (1, 3), (2, 4), (3, 2), (4, 8), (5, 9), (4, 1), (5, 3), (1, 5), (2, 10), (3, 15);

-- ----------------------------------------------------------------------------------------------------
-- Insertar registros en tabla 'Registros_Labs' con fechas específicas
INSERT INTO registros_labs (id_alumno, id_laboratorio, fecha_registro) VALUES
    (1, 1, '2022-08-01'),
    (2, 2, '2022-08-02'),
    (3, 3, '2022-08-03'),
    (4, 4, '2022-08-04'),
    (5, 5, '2022-08-05');
