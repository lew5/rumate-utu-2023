-- Insertar datos en la tabla PERSONAS
INSERT INTO PERSONAS (nombre_persona, apellido_persona, ci_persona, barrio_persona, calle_persona, numero_persona, telefono_persona, estado_persona) 
VALUES
    ('Juan', 'Perez', '12345678', 'Barrio A', 'Calle 1', '123', '123-456-789', 'Activo'),
    ('María', 'López', '87654321', 'Barrio B', 'Calle 2', '456', '987-654-321', 'Inactivo'),
    ('Pedro', 'García', '55555555', 'Barrio C', 'Calle 3', '789', '555-555-555', 'Activo'),
    ('Laura', 'Gómez', '98765432', 'Barrio D', 'Calle 4', '567', '222-333-444', 'Activo'),
    ('Carlos', 'López', '12344321', 'Barrio E', 'Calle 5', '678', '999-888-777', 'Inactivo');

-- Insertar datos en la tabla USUARIOS
INSERT INTO USUARIOS (username_usuario, password_usuario, email_usuario, tipo_usuario) 
VALUES
    ('root', '$2y$10$C0bPJ9Itstkm4eDlsd52QuVDkR4oH3gPVgdp0usmS81qho8YSxOTi', 'root@example.com', 'ROOT'),
    ('admin', '$2y$10$hbjEYjPcKVQ2.IIX4DWk5eJGEOIDAZx.vaf39ILQ1iEFwmBtMSCPi', 'admin@example.com', 'ADMINISTRADOR'),
    ('cliente', '$2y$10$xoTV71k203SRSjR/B1zkPurXezKwWExF8Vt4rXKF7vyzo1YjVj1d6', 'cliente@example.com', 'CLIENTE'),
    ('proveedor', '$2y$10$Bpjp/rLggmhvv1wwHv.7C.kyb2dT/Gf3qMR3.oUQskEjGP3xrxrhi', 'proveedor@example.com', 'PROVEEDOR'),
    ('rematador', '$2y$10$E/loDqHzCjJ1X13oR6FIuOxELntpmwGWmUrzsVbOYYnwG1t8ULxhG', 'rematador@example.com', 'REMATADOR');

-- Insertar datos en la tabla USUARIOS_DE_PERSONAS
INSERT INTO USUARIOS_DE_PERSONAS (id_usuario_usuarios_de_personas, id_persona_usuarios_de_persona)
VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5);

-- Insertar datos en la tabla FICHAS
INSERT INTO FICHAS (peso_ficha, cantidad_ficha, raza_ficha, descripcion_ficha)
VALUES
    (250.00, 10, 'Angus', 'Lotes de terneros Angus de excelente calidad.'),
    (300.00, 5, 'Hereford', 'Vaquillonas Hereford, 2 años de edad.'),
    (500.00, 2, 'Holstein', 'Vacunas Holstein en buen estado.');

-- Insertar datos en la tabla CATEGORIAS
INSERT INTO CATEGORIAS (nombre_categoria)
VALUES
    ('Ternero'),
    ('Vaquillona'),
    ('Vaca'),
    ('Novillito'),
    ('Novillo'),
    ('Toro');

-- Insertar datos en la tabla REMATES
INSERT INTO REMATES (titulo_remate, fecha_inicio_remate, fecha_final_remate)
VALUES
    ('Remate 1', '2023-10-20 10:00:00', '2023-10-21 14:00:00'),
    ('Remate 2', '2023-10-22 09:00:00', '2023-10-23 15:00:00');

-- Insertar datos en la tabla LOTES
INSERT INTO LOTES (imagen_lote, precio_base_lote, mejor_oferta_lote, id_proveedor_lote, id_ficha_lote, id_categoria_lote)
VALUES
    ('lote1.jpg', 1000.00, 1200.00, 4, 1, 1),
    ('lote2.jpg', 800.00, 900.00, 4, 2, 2),
    ('lote3.jpg', 1500.00, 1600.00, 4, 3, 3);

-- Insertar datos en la tabla LOTES_POSTULAN_REMATES
INSERT INTO LOTES_POSTULAN_REMATES (id_remate_lote_postula_remate, id_lote_lote_postula_remate)
VALUES
    (1, 1),
    (1, 2),
    (2, 3);

-- Insertar datos en la tabla PUJAS
INSERT INTO PUJAS (monto_puja)
VALUES
    (1100.00),
    (1000.00),
    (1600.00);

-- Insertar datos en la tabla PUJAS_DE_PERSONAS
INSERT INTO PUJAS_DE_PERSONAS (id_puja_puja_de_persona, id_persona_puja_de_persona)
VALUES
    (1, 3),
    (2, 3),
    (3, 3);

-- Insertar datos en la tabla PUJAS_DE_REMATES
INSERT INTO PUJAS_DE_REMATES (id_puja_puja_de_remate, id_remate_puja_de_remate, id_lote_puja_de_remate)
VALUES
    (1, 1, 1),
    (2, 1, 2),
    (3, 2, 3);
