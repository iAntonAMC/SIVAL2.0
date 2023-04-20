-- --- General functionality tables ---

DROP TABLE IF EXISTS periods;
CREATE TABLE periods(
    period_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    period_name VARCHAR(10) NOT NULL,
    date_start DATE NOT NULL,
    date_finish DATE NOT NULL
)ENGINE=INNODB;


DROP TABLE IF EXISTS students;
CREATE TABLE students(
    student_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    enrollment VARCHAR(11) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    career VARCHAR(50) NOT NULL,
    grade INTEGER NOT NULL CHECK (grade BETWEEN 0 AND 10),
    class VARCHAR(10) NOT NULL,
    period_name VARCHAR(10) NOT NULL,
    qr_data VARCHAR(150) NOT NULL
)ENGINE=INNODB;

CREATE UNIQUE INDEX student ON students(enrollment, first_name, last_name, career, grade, period_name);


DROP TABLE IF EXISTS visitors;
CREATE TABLE visitors(
    visitor_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    visitor_fname VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    ocupation VARCHAR(100) NOT NULL,
    visit_area VARCHAR(150) NOT NULL,
    reason VARCHAR(100) NOT NULL,
    qr_data VARCHAR(150) NOT NULL,
    qr_pic VARCHAR(250) NOT NULL,
    qr_status VARCHAR(50) NOT NULL DEFAULT 'pendient' CHECK (qr_status = 'active' OR qr_status  = 'expired' OR qr_status = 'pendient')
)ENGINE=INNODB;

CREATE UNIQUE INDEX visitor ON visitors(visitor_fname, last_name, ocupation, reason, qr_data);
CREATE INDEX visitor_data ON visitors(visitor_id, visitor_fname, qr_status);


DROP TABLE IF EXISTS laboratories;
CREATE TABLE laboratories(
    lab_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    lab_name VARCHAR (50) NOT NULL,
    building VARCHAR(6) NOT NULL,
    floor VARCHAR(1) NOT NULL CHECK (floor = "H" OR floor = "G"), -- H is for high-plant & G stands for ground-plant
    capacity INTEGER DEFAULT 0 CHECK (capacity BETWEEN 0 AND 100)
)ENGINE=INNODB;

CREATE INDEX laboratory ON laboratories(lab_name, building, floor);


DROP TABLE IF EXISTS entrances;
CREATE TABLE entrances(
    entry_num INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    student_id INTEGER DEFAULT NULL,
    visitor_id INTEGER DEFAULT NULL,
    entry_date DATE NOT NULL DEFAULT CURRENT_DATE CHECK (entry_date BETWEEN '2000-01-01' AND '2025-01-01'),
    entry_time TIME NOT NULL DEFAULT CURRENT_TIME,
    exit_time TIME DEFAULT NULL,
    FOREIGN KEY (student_id) REFERENCES students(student_id),
    FOREIGN KEY (visitor_id) REFERENCES visitors(visitor_id)
)ENGINE=INNODB;

CREATE INDEX entry_log ON entrances(entry_num, entry_date, entry_time);
CREATE INDEX exit_log ON entrances(entry_num, entry_date, exit_time);


DROP TABLE IF EXISTS labs_entrances;
CREATE TABLE labs_entrances(
    entry_num INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    student_id INTEGER DEFAULT NULL,
    visitor_id INTEGER DEFAULT NULL,
    lab_id INTEGER NOT NULL,
    entry_date DATE NOT NULL DEFAULT CURRENT_DATE CHECK(entry_date BETWEEN '2000-01-01' AND '2025-01-01'),
    entry_time TIME NOT NULL DEFAULT CURRENT_TIME,
    exit_time DATE DEFAULT NULL,
    FOREIGN KEY (student_id) REFERENCES students(student_id),
    FOREIGN KEY (visitor_id) REFERENCES visitors(visitor_id),
    FOREIGN KEY (lab_id) REFERENCES laboratories(lab_id)
)ENGINE=INNODB;

CREATE INDEX labs_log ON labs_entrances(entry_num, student_id, entry_date, entry_time);
CREATE INDEX labs_exits ON labs_entrances(entry_num, student_id, entry_date, exit_time);



-- --- Users module tables ---

DROP TABLE IF EXISTS users;
CREATE TABLE users(
    uid INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(150) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    charge VARCHAR(1) NOT NULL CHECK (charge = 'A' OR charge = 'C' OR charge = 'P'), -- A is for ADMIN or AUTHORITY, C stands for COORDINATOR & P is for PROFESSOR
    area VARCHAR(100) NOT NULL,
    username TEXT(32) NOT NULL,
    passwd TEXT(32) NOT NULL,
    status INTEGER NOT NULL DEFAULT 1 CHECK(status = 1 OR status = 0)
)ENGINE=INNODB;

CREATE INDEX user ON users(uid, first_name, area, status);
CREATE INDEX user_credentials ON users(username, passwd);



-- --- Insert data into tables ---

-- Periods:
INSERT INTO periods(period_name, date_start, date_finish) VALUES
    ('EA2022', '2022-01-01', '2022-04-15'),
    ('MA2022', '2022-05-01', '2022-08-19'),
    ('SD2022', '2022-09-01', '2022-12-19'),
    ('EA2023', '2023-04-04', '2023-04-15');


-- Students:
INSERT INTO students(enrollment, first_name, last_name, career, grade, class, period_name, qr_data) VALUES
    ('1721', 'Juan', 'Perez', 'TI', 1, 'TI11', 'EA2022', 'adg4dg'),
    ('1722', 'Majin', 'Sampayo', 'NANO', 1, 'NANO11', 'EA2022', 'gs4fdd'),
    ('1723', 'Fernando', 'Fernandez', 'BUSINESS', 2, 'DN21', 'EA2022', 'Aggsd4'),
    ('1724', 'Daniel', 'Valeriano', 'NANO', 2, 'NANO21', 'EA2022', '123456'),
    ('1725', 'Rolando', 'Granados', 'TI', 3, 'TI31', 'EA2022', '123456'),
    ('1726', 'Juan', 'Perez', 'TF', 3, 'TF31', 'MA2022', '123456'),
    ('1727', 'Majin', 'Sampayo', 'NURSE', 4, 'NURSE41', 'MA2022', '123456'),
    ('1728', 'Fernando', 'Fernandez', 'TI', 4, 'TI41', 'MA2022', '123456'),
    ('1721110125', 'Jesus', 'Torres', 'TI', 5, 'TI51', 'MA2023', 'TOFJ990923'),
    ('1721110895', 'Rolando', 'Rivera', 'TI', 5, 'TI51', 'MA2023', 'ROLA04124');


-- Laboratories:
INSERT INTO laboratories(lab_name, building, floor, capacity) VALUES
    ("Química 1", "B", "G", "20"),
    ("Centro Desarrollo 1", "B", "G", "15"),
    ("Desarrollo PLM 1", "B", "G", "15"),
    ("Desarrollo PLM 2", "B", "G", "15"),
    ("Electromecánica", "B", "H", "20"),
    ("Caracter Materiales", "F", "G", "15"),
    ("Procesos Productivos", "F", "G", "15"),
    ("Centro Metrología", "F", "G", "15"),
    ("Maquinas y Herramientas", "F", "G", "15"),
    ("Laboratorio Cómputo 1", "G", "G", "20"),
    ("Laboratorio Cómputo 2", "G", "G", "20"),
    ("Laboratorio Cómputo 3", "G", "G", "20"),
    ("Laboratorio Cómputo 4", "G", "G", "20"),
    ("Laboratorio Cómputo 5", "G", "G", "20"),
    ("Laboratorio Cómputo 6", "G", "G", "20");


-- Users:
INSERT INTO users(first_name, last_name, charge, area, username, passwd, status) VALUES
    ("root", "root", 'A', "root", "root", "123", 1),
    ("José Rolando", "Granados", 'A', "TIC", "Rolax", "123", 1),
    ("Jesús Antonio", "Torres", 'A', "TIC", "iAntonAMC", "123", 1);


-- University Student Entries with specific dates:
INSERT INTO entrances(student_id, entry_date) VALUES
    (1, '2023-04-01'),
    (2, '2023-04-02'),
    (3, '2023-04-04'),
    (4, '2023-04-04'),
    (5, '2023-04-05'),
    (6, '2023-04-06'),
    (7, '2023-04-07'),
    (8, '2023-04-08'),
    (9, '2023-04-09'),
    (10, '2023-04-10');


-- University Student Entries:
INSERT INTO entrances(student_id) VALUES
    (1), (9);


-- Laboratories' Student Entries with specific dates:
INSERT INTO labs_entrances (student_id, lab_id, entry_date) VALUES
    (1, 1, '2023-04-01'),
    (1, 2, '2023-04-02'),
    (1, 3, '2023-04-04'),
    (1, 4, '2023-04-04'),
    (1, 5, '2023-04-05');


-- Labs' Student Entries:
INSERT INTO labs_entrances(student_id, lab_id) VALUES
    (1, 1), (1, 2), (2, 1), (2, 2), (3, 1), (3, 2), (4, 1), (4, 2), (5, 1), (5, 2),
    (6, 1), (6, 2), (7, 1), (7, 2), (8, 1), (8, 2), (9, 1), (9, 2), (10, 1), (10, 2);
