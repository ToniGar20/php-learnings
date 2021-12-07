CREATE DATABASE phonebook_practice;

CREATE TABLE IF NOT EXISTS phonebook (
    'id' int(11) NOT NULL,
    'first_name' varchar(50) NOT NULL,
    'last_name' varchar(50) NOT NULL,
    'phone' int NOT NULL,
    'phone-type' varchar(50) NOT NULL,
    'created_at' DATETIME DEFAULT CURRENT_TIMESTAMP,
    'updated_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY ('id')
    );

INSERT INTO phonebook
    (id, first_name, last_name, phone, phone_type)
VALUES
    (1,'Admin', 'Admin', 666999333, 'Casa'),
    (2,'El Increíble', 'Hulk', 785222771, 'Móvil'),
    (3,'Josep', 'Pedrerol', 666999333, 'Chiringito'),
    (4, 'Arturo', 'Pérez-Reverte', 654321987 ,'Móvil'),
    (5,'Toni', 'García', 662426246, 'Móvil');