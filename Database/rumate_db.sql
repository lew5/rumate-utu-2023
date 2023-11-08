
-- SCRIPT PARA LA CREACIÓN DE LA BASE DE DATOS E INSERCIÓN DE DATOS DE PRUEBA


-- Crear la base de datos rumate_db con cotejamiento utf8mb4_unicode_ci y motor InnoDB
CREATE DATABASE rumate_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Usar la base de datos rumate_db
USE rumate_db;

-- Crear la tabla PERSONAS
CREATE TABLE PERSONAS (
    id_persona INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nombre_persona VARCHAR(40) NOT NULL,
    apellido_persona VARCHAR(40) NOT NULL,
    ci_persona VARCHAR(40) UNIQUE NOT NULL,
    barrio_persona VARCHAR(40),
    calle_persona VARCHAR(40),
    numero_persona VARCHAR(40),
    telefono_persona VARCHAR(20) NOT NULL,
    estado_persona ENUM('Activo', 'Inactivo') DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla USUARIOS
CREATE TABLE USUARIOS (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    username_usuario VARCHAR(40) UNIQUE NOT NULL,
    password_usuario VARCHAR(255) NOT NULL,
    email_usuario VARCHAR(40) UNIQUE NOT NULL,
    imagen_usuario VARCHAR(2),
    tipo_usuario ENUM('ROOT', 'ADMINISTRADOR', 'CLIENTE','PROVEEDOR') DEFAULT 'CLIENTE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla USUARIOS_DE_PERSONAS
CREATE TABLE USUARIOS_DE_PERSONAS (
    id_usuario_usuarios_de_personas INT NOT NULL,
    id_persona_usuarios_de_persona INT UNIQUE NOT NULL,
    PRIMARY KEY (id_usuario_usuarios_de_personas, id_persona_usuarios_de_persona),
    FOREIGN KEY (id_usuario_usuarios_de_personas) REFERENCES USUARIOS(id_usuario),
    FOREIGN KEY (id_persona_usuarios_de_persona) REFERENCES PERSONAS(id_persona)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla FICHAS
CREATE TABLE FICHAS (
    id_ficha INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    peso_ficha DECIMAL(10, 2) NOT NULL,
    cantidad_ficha INT NOT NULL,
    raza_ficha VARCHAR(40) NOT NULL,
    descripcion_ficha TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla CATEGORIAS
CREATE TABLE CATEGORIAS (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nombre_categoria VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla REMATES
CREATE TABLE REMATES (
    id_remate INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    titulo_remate VARCHAR(40) NOT NULL,
    imagen_remate VARCHAR(255),
    fecha_inicio_remate DATETIME NOT NULL,
    fecha_final_remate DATETIME NOT NULL,
    estado_remate ENUM('Pendiente','Rematando','Finalizado') DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla LOTES
CREATE TABLE LOTES (
    id_lote INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    imagen_lote VARCHAR(255),
    precio_base_lote DECIMAL(10, 2) NOT NULL,
    mejor_oferta_lote DECIMAL(10, 2) NOT NULL,
    id_proveedor_lote INT NOT NULL,
    id_ficha_lote INT UNIQUE NOT NULL,
    id_categoria_lote INT NOT NULL,
    FOREIGN KEY (id_proveedor_lote) REFERENCES PERSONAS(id_persona),
    FOREIGN KEY (id_ficha_lote) REFERENCES FICHAS(id_ficha),
    FOREIGN KEY (id_categoria_lote) REFERENCES CATEGORIAS(id_categoria)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla LOTES_POSTULAN_REMATES
CREATE TABLE LOTES_POSTULAN_REMATES (
    id_remate_lote_postula_remate INT NOT NULL,
    id_lote_lote_postula_remate INT NOT NULL,
    PRIMARY KEY (id_remate_lote_postula_remate, id_lote_lote_postula_remate),
    FOREIGN KEY (id_remate_lote_postula_remate) REFERENCES REMATES(id_remate),
    FOREIGN KEY (id_lote_lote_postula_remate) REFERENCES LOTES(id_lote)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla PUJAS
CREATE TABLE PUJAS (
    id_puja INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    monto_puja DECIMAL(10, 2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla PUJAS_DE_PERSONAS
CREATE TABLE PUJAS_DE_PERSONAS (
    id_puja_puja_de_persona INT NOT NULL,
    id_persona_puja_de_persona INT NOT NULL,
    PRIMARY KEY (id_puja_puja_de_persona, id_persona_puja_de_persona),
    FOREIGN KEY (id_puja_puja_de_persona) REFERENCES PUJAS(id_puja),
    FOREIGN KEY (id_persona_puja_de_persona) REFERENCES PERSONAS(id_persona)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla PUJAS_DE_REMATES
CREATE TABLE PUJAS_DE_REMATES (
    id_puja_puja_de_remate INT NOT NULL,
    id_remate_puja_de_remate INT NOT NULL,
    id_lote_puja_de_remate INT NOT NULL,
    PRIMARY KEY (id_puja_puja_de_remate, id_remate_puja_de_remate, id_lote_puja_de_remate),
    FOREIGN KEY (id_puja_puja_de_remate) REFERENCES PUJAS(id_puja),
    FOREIGN KEY (id_remate_puja_de_remate) REFERENCES REMATES(id_remate),
    FOREIGN KEY (id_lote_puja_de_remate) REFERENCES LOTES(id_lote)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

USE rumate_db;

-- Insertar datos de prueba en la tabla PERSONAS
INSERT INTO PERSONAS (nombre_persona, apellido_persona, ci_persona, barrio_persona, calle_persona, numero_persona, telefono_persona, estado_persona)
VALUES
    ('Juan', 'Pérez', '12345678', 'Barrio A', 'Calle 1', '123', '1234567890', 'Activo'),
    ('María', 'López', '23456789', 'Barrio B', 'Calle 2', '456', '2345678901', 'Activo'),
    ('Pedro', 'Gómez', '34567890', 'Barrio C', 'Calle 3', '789', '3456789012', 'Activo'),
    ('Ana', 'Rodríguez', '45678901', 'Barrio D', 'Calle 4', '101', '4567890123', 'Activo'),
    ('Luis', 'Martínez', '56789012', 'Barrio E', 'Calle 5', '234', '5678901234', 'Activo'),
    ('Elena', 'Fernández', '67890123', 'Barrio F', 'Calle 6', '567', '6789012345', 'Activo'),
    ('Carlos', 'Sánchez', '78901234', 'Barrio G', 'Calle 7', '890', '7890123456', 'Activo'),
    ('Laura', 'Ramírez', '89012345', 'Barrio H', 'Calle 8', '1234', '8901234567', 'Activo'),
    ('José', 'González', '90123456', 'Barrio I', 'Calle 9', '5678', '9012345678', 'Activo'),
    ('Sofía', 'Hernández', '01234567', 'Barrio J', 'Calle 10', '9012', '0123456789', 'Activo'),
    ('Diego', 'Luna', '11223344', 'Barrio K', 'Calle 11', '1122', '1122334455', 'Activo'),
    ('Valentina', 'Cruz', '22334455', 'Barrio L', 'Calle 12', '2233', '2233445566', 'Activo'),
    ('Andrés', 'Paredes', '33445566', 'Barrio M', 'Calle 13', '3344', '3344556677', 'Activo'),
    ('Isabella', 'Ortega', '44556677', 'Barrio N', 'Calle 14', '4455', '4455667788', 'Activo'),
    ('Gabriel', 'Torres', '55667788', 'Barrio O', 'Calle 15', '5566', '5566778899', 'Activo'),
    ('Camila', 'López', '66778899', 'Barrio P', 'Calle 16', '6677', '6677889900', 'Activo'),
    ('David', 'Silva', '77889900', 'Barrio Q', 'Calle 17', '7788', '7788990011', 'Activo'),
    ('Mariana', 'Mendoza', '88990011', 'Barrio R', 'Calle 18', '8899', '8899001122', 'Activo'),
    ('Simón', 'Gómez', '99001122', 'Barrio S', 'Calle 19', '9900', '9900112233', 'Activo'),
    ('Luisa', 'Martínez', '00112233', 'Barrio T', 'Calle 20', '0011', '0011223344', 'Activo');

-- Insertar datos en la tabla USUARIOS
INSERT INTO USUARIOS (username_usuario, password_usuario, email_usuario, imagen_usuario, tipo_usuario)
VALUES
    ('root', '$2y$10$C0bPJ9Itstkm4eDlsd52QuVDkR4oH3gPVgdp0usmS81qho8YSxOTi', 'juan@example.com', FLOOR(1 + RAND() * 12), 'ROOT'),
    ('maria123', '$2y$10$FCUwepcEewj6WTI6agC.ZesmC2CGoEQurXvigQv6l3xB4apN9KiCu', 'maria@example.com', FLOOR(1 + RAND() * 12), 'ADMINISTRADOR'),
    ('pedro123', '$2y$10$FCUwepcEewj6WTI6agC.ZesmC2CGoEQurXvigQv6l3xB4apN9KiCu', 'pedro@example.com', FLOOR(1 + RAND() * 12), 'ADMINISTRADOR'),
    ('ana123', '$2y$10$FCUwepcEewj6WTI6agC.ZesmC2CGoEQurXvigQv6l3xB4apN9KiCu', 'ana@example.com', FLOOR(1 + RAND() * 12), 'ADMINISTRADOR'),
    ('luis123', '$2y$10$FCUwepcEewj6WTI6agC.ZesmC2CGoEQurXvigQv6l3xB4apN9KiCu', 'luis@example.com', FLOOR(1 + RAND() * 12), 'ADMINISTRADOR'),
    ('elena123', '$2y$10$FCUwepcEewj6WTI6agC.ZesmC2CGoEQurXvigQv6l3xB4apN9KiCu', 'elena@example.com', FLOOR(1 + RAND() * 12), 'ADMINISTRADOR'),
    ('carlos123', '$2y$10$FCUwepcEewj6WTI6agC.ZesmC2CGoEQurXvigQv6l3xB4apN9KiCu', 'carlos@example.com', FLOOR(1 + RAND() * 12), 'CLIENTE'),
    ('laura123', '$2y$10$FCUwepcEewj6WTI6agC.ZesmC2CGoEQurXvigQv6l3xB4apN9KiCu', 'laura@example.com', FLOOR(1 + RAND() * 12), 'CLIENTE'),
    ('jose123', '$2y$10$FCUwepcEewj6WTI6agC.ZesmC2CGoEQurXvigQv6l3xB4apN9KiCu', 'jose@example.com', FLOOR(1 + RAND() * 12), 'CLIENTE'),
    ('sofia123', '$2y$10$FCUwepcEewj6WTI6agC.ZesmC2CGoEQurXvigQv6l3xB4apN9KiCu', 'sofia@example.com', FLOOR(1 + RAND() * 12), 'CLIENTE'),
    ('diego123', '$2y$10$FCUwepcEewj6WTI6agC.ZesmC2CGoEQurXvigQv6l3xB4apN9KiCu', 'diego@example.com', FLOOR(1 + RAND() * 12), 'CLIENTE'),
    ('valentina123', '$2y$10$FCUwepcEewj6WTI6agC.ZesmC2CGoEQurXvigQv6l3xB4apN9KiCu', 'valentina@example.com', FLOOR(1 + RAND() * 12), 'PROVEEDOR'),
    ('andres123', '$2y$10$FCUwepcEewj6WTI6agC.ZesmC2CGoEQurXvigQv6l3xB4apN9KiCu', 'andres@example.com', FLOOR(1 + RAND() * 12), 'PROVEEDOR'),
    ('isabella123', '$2y$10$FCUwepcEewj6WTI6agC.ZesmC2CGoEQurXvigQv6l3xB4apN9KiCu', 'isabella@example.com', FLOOR(1 + RAND() * 12), 'PROVEEDOR'),
    ('gabriel123', '$2y$10$FCUwepcEewj6WTI6agC.ZesmC2CGoEQurXvigQv6l3xB4apN9KiCu', 'gabriel@example.com', FLOOR(1 + RAND() * 12), 'PROVEEDOR'),
    ('camila123', '$2y$10$FCUwepcEewj6WTI6agC.ZesmC2CGoEQurXvigQv6l3xB4apN9KiCu', 'camila@example.com', FLOOR(1 + RAND() * 12), 'CLIENTE'),
    ('david123', '$2y$10$FCUwepcEewj6WTI6agC.ZesmC2CGoEQurXvigQv6l3xB4apN9KiCu', 'david@example.com', FLOOR(1 + RAND() * 12), 'CLIENTE'),
    ('mariana123', '$2y$10$FCUwepcEewj6WTI6agC.ZesmC2CGoEQurXvigQv6l3xB4apN9KiCu', 'mariana@example.com', FLOOR(1 + RAND() * 12), 'CLIENTE'),
    ('simon123', '$2y$10$FCUwepcEewj6WTI6agC.ZesmC2CGoEQurXvigQv6l3xB4apN9KiCu', 'simon@example.com', FLOOR(1 + RAND() * 12), 'PROVEEDOR'),
    ('luisa123', '$2y$10$FCUwepcEewj6WTI6agC.ZesmC2CGoEQurXvigQv6l3xB4apN9KiCu', 'luisa@example.com', FLOOR(1 + RAND() * 12), 'CLIENTE');


-- Asignar personas a usuarios
INSERT INTO USUARIOS_DE_PERSONAS (id_usuario_usuarios_de_personas, id_persona_usuarios_de_persona) 
VALUES 
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 7),
    (8, 8),
    (9, 9),
    (10, 10),
    (11, 11),
    (12, 12),
    (13, 13),
    (14, 14),
    (15, 15),
    (16, 16),
    (17, 17),
    (18, 18),
    (19, 19),
    (20, 20);

-- Insertar 6 remates
INSERT INTO REMATES (titulo_remate, imagen_remate, fecha_inicio_remate, fecha_final_remate, estado_remate)
VALUES
('Subasta de Caballos y Yeguas', 'imagen_remate2.jpg', '2023-11-12 10:00:00', '2023-11-13 18:00:00', 'Pendiente'),
('Remate de Ovejas', 'imagen_remate3.jpg', '2023-11-15 08:00:00', '2023-11-16 16:00:00', 'Pendiente'),
('Subasta de Potros Pura Sangre', 'imagen_remate5.jpg', '2023-11-22 10:15:00', '2023-11-23 18:15:00', 'Pendiente'),
('Gran Remate de Vacas Holstein', 'imagen_remate7.jpg', '2023-11-28 08:30:00', '2023-11-29 16:30:00', 'Pendiente'),
('Subasta de Ovejas', 'imagen_remate8.jpg', '2023-12-02 10:45:00', '2023-12-03 18:45:00', 'Pendiente'),
('Venta de Ovejas Suffolk', 'imagen_remate9.jpg', '2023-12-05 07:30:00', '2023-12-06 15:30:00', 'Pendiente');

INSERT INTO CATEGORIAS (nombre_categoria)
VALUES
    ('Caballo'),
    ('Potro'),
    ('Oveja'),
    ('Ternero'),
    ('Vaquillona'),
    ('Vaca'),
    ('Novillito'),
    ('Novillo'),
    ('Toro');



-- Fichas
INSERT INTO FICHAS (peso_ficha, cantidad_ficha, raza_ficha, descripcion_ficha)
VALUES
    (350.5, 10, 'Ganado Hereford', 'Excelente calidad de Ganado Hereford para la gran subasta de ganado.'),
    (450.2, 8, 'Ganado Charolais', 'Ganado Charolais listo para la subasta.'),
    (280.7, 15, 'Ganado Angus', 'Ganado Angus en condiciones óptimas para la subasta.'),
    (320.8, 12, 'Ganado Simmental', 'Ganado Simmental disponible para la subasta.'),
    (400.3, 9, 'Ganado Limousin', 'Ganado Limousin de gran calidad listo para la subasta.'),
    (550.6, 5, 'Caballos Criollos', 'Caballos Criollos disponibles para la subasta de caballos y yeguas.'),
    (480.4, 7, 'Yeguas Appaloosa', 'Yeguas Appaloosa de diferentes edades listas para la subasta.'),
    (600.2, 6, 'Caballos Cuarto de Milla', 'Caballos Cuarto de Milla en condiciones óptimas para la subasta.'),
    (420.1, 5, 'Yeguas Pura Sangre', 'Yeguas Pura Sangre listas para la subasta.'),
    (510.8, 8, 'Caballos Árabes', 'Caballos Árabes de gran calidad para la subasta.'),
    (75.3, 20, 'Ovejas Merino', 'Ovejas Merino en excelente estado para el remate de ovejas.'),
    (90.5, 15, 'Ovejas Corriedale', 'Ovejas Corriedale de alta calidad listas para la subasta.'),
    (80.1, 18, 'Ovejas Suffolk', 'Ovejas Suffolk de calidad para la subasta.'),
    (70.2, 10, 'Ovejas Romney', 'Ovejas Romney en condiciones óptimas para el remate.'),
    (85.6, 12, 'Ovejas Border Leicester', 'Ovejas Border Leicester disponibles para el remate.'),
    (360.5, 11, 'Ganado Angus', 'Ganado Angus de alto rendimiento para el gran remate.'),
    (310.2, 13, 'Ganado Hereford', 'Ganado Hereford en excelente estado.'),
    (400.6, 8, 'Ganado Charolais', 'Ganado Charolais listo para el remate.'),
    (375.4, 10, 'Ganado Limousin', 'Ganado Limousin en condiciones óptimas para la subasta.'),
    (410.7, 12, 'Ganado Simmental', 'Ganado Simmental disponible para el remate.'),
    (395.3, 9, 'Potros Pura Sangre Cuarto de Milla', 'Potros Cuarto de Milla de gran potencial para la subasta.'),
    (430.6, 7, 'Potros Pura Sangre Árabe', 'Potros Árabe de alto rendimiento.'),
    (410.8, 5, 'Potros Pura Sangre Appaloosa', 'Potros Appaloosa en excelente estado para la subasta.'),
    (380.1, 6, 'Potros Pura Sangre Paint', 'Potros Paint disponibles para la subasta.'),
    (450.9, 8, 'Potros Pura Sangre Morgan', 'Potros Morgan en condiciones óptimas para la subasta.'),
    (85.7, 16, 'Ovejas Dorper', 'Ovejas Dorper en excelente estado para la venta.'),
    (95.2, 14, 'Ovejas Merino', 'Ovejas Merino de gran calidad listas para la subasta.'),
    (90.3, 18, 'Ovejas Corriedale', 'Ovejas Corriedale disponibles para la subasta.'),
    (88.6, 12, 'Ovejas Suffolk', 'Ovejas Suffolk en condiciones óptimas para la subasta.'),
    (100.1, 15, 'Ovejas Romney', 'Ovejas Romney de calidad listas para la venta.');


-- Insertar 30 lotes
INSERT INTO LOTES (imagen_lote, precio_base_lote, mejor_oferta_lote, id_proveedor_lote, id_ficha_lote, id_categoria_lote)
VALUES
('imagen_lote1.jpg', '550.00', '0.00', 12, 6, 1),
('imagen_lote2.jpg', '800.00', '0.00', 12, 7, 1),
('imagen_lote3.jpg', '620.00', '0.00', 12, 8, 1),
('imagen_lote4.jpg', '460.00', '0.00', 12, 9, 1),
('imagen_lote5.jpg', '700.00', '0.00', 12, 10, 1),

('imagen_lote6.jpg', '580.00', '0.00', 12, 1, 3),
('imagen_lote7.jpg', '420.00', '0.00', 12, 2, 3),
('imagen_lote8.jpg', '750.00', '0.00', 12, 3, 3),
('imagen_lote9.jpg', '670.00', '0.00', 12, 4, 3),
('imagen_lote10.jpg', '480.00', '0.00', 13, 5, 3),

('imagen_lote11.jpg', '620.00', '0.00', 13, 21, 2),
('imagen_lote12.jpg', '540.00', '0.00', 13, 22, 2),
('imagen_lote13.jpg', '410.00', '0.00', 13, 23, 2),
('imagen_lote14.jpg', '680.00', '0.00', 13, 24, 2),
('imagen_lote15.jpg', '590.00', '0.00', 13, 25, 2),

('imagen_lote16.jpg', '450.00', '0.00', 14, 16, 6),
('imagen_lote17.jpg', '720.00', '0.00', 14, 17, 6),
('imagen_lote18.jpg', '630.00', '0.00', 14, 18, 6),
('imagen_lote19.jpg', '430.00', '0.00', 14, 19, 6),
('imagen_lote20.jpg', '770.00', '0.00', 14, 20, 6),

('imagen_lote21.jpg', '690.00', '0.00', 14, 11, 3),
('imagen_lote22.jpg', '490.00', '0.00', 14, 12, 3),
('imagen_lote23.jpg', '610.00', '0.00', 14, 13, 3),
('imagen_lote24.jpg', '550.00', '0.00', 14, 14, 3),
('imagen_lote25.jpg', '420.00', '0.00', 14, 15, 3),

('imagen_lote26.jpg', '720.00', '0.00', 14, 26, 3),
('imagen_lote27.jpg', '620.00', '0.00', 14, 27, 3),
('imagen_lote28.jpg', '440.00', '0.00', 14, 28, 3),
('imagen_lote29.jpg', '780.00', '0.00', 14, 29, 3),
('imagen_lote30.jpg', '670.00', '0.00', 14, 30, 3);

-- Lotes postulados
INSERT INTO LOTES_POSTULAN_REMATES (id_remate_lote_postula_remate, id_lote_lote_postula_remate)
VALUES
    (1, 1),
    (1, 2),
    (1, 3),
    (1, 4),
    (1, 5),

    (2, 6),
    (2, 7),
    (2, 8),
    (2, 9),
    (2, 10),

    (3, 11),    
    (3, 12),    
    (3, 13),    
    (3, 14),    
    (3, 15),   

    (4, 16),
    (4, 17),
    (4, 18),
    (4, 19),
    (4, 20),

    (5, 21),
    (5, 22),    
    (5, 23),    
    (5, 24),    
    (5, 25),

    (6, 26),
    (6, 27),    
    (6, 28),    
    (6, 29),    
    (6, 30);

