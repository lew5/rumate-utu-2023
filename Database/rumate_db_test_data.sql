-- Datos de prueba para la tabla PERSONAS
INSERT INTO PERSONAS (nombre_persona, apellido_persona, ci_persona, barrio_persona, calle_persona, numero_persona, telefono_persona, tipo_persona)
VALUES
    ('Juan', 'Perez', '1234567', 'Centro', 'Calle 123', '123', '555-1234', 'ADMINISTRADOR'),
    ('María', 'González', '7654321', 'Barrio Norte', 'Calle 456', '456', '555-5678', 'CLIENTE'),
    ('Pedro', 'Ramírez', '9876543', 'Barrio Sur', 'Calle 789', '789', '555-7890', 'PROVEEDOR');

-- Datos de prueba para la tabla USUARIOS
INSERT INTO USUARIOS (username_usuario, password_usuario, email_usuario)
VALUES
    ('juan123', 'password1', 'juan@example.com'),
    ('maria456', 'password2', 'maria@example.com'),
    ('pedro789', 'password3', 'pedro@example.com');

-- Asociar usuarios a personas
INSERT INTO USUARIOS_DE_PERSONAS (username_usuario_usuarios_de_personas, id_persona_usuarios_de_persona)
VALUES
    ('juan123', 1),
    ('maria456', 2),
    ('pedro789', 3);

-- Datos de prueba para la tabla CLIENTES
INSERT INTO CLIENTES (id_persona_cliente, estado_cliente)
VALUES
    (2, 'ACTIVO'),
    (3, 'ACTIVO');

-- Datos de prueba para la tabla REMATES
INSERT INTO REMATES (img_remate, titulo_remate, fecha_remate, hora_remate, estado_remate)
VALUES
    (NULL, 'Remate de Vacas 1', '2023-09-20', '14:00:00', 'FINALIZADO'),
    (NULL, 'Remate de Vacas 2', '2023-09-25', '15:30:00', 'PENDIENTE'),
    (NULL, 'Remate de Vacas 3', '2023-10-05', '16:15:00', 'PENDIENTE');

-- Datos de prueba para la tabla LOTES
INSERT INTO LOTES (precio_base_lote, precio_final_lote, id_cliente_lote)
VALUES
    (1500.00, 1700.00, 3),
    (1800.00, 2000.00, 3),
    (1600.00, 1800.00, 3);

-- Datos de prueba para la tabla MULTIMEDIAS
INSERT INTO MULTIMEDIAS (contenido_multimedia)
VALUES
    (NULL),
    (NULL),
    (NULL);

-- Asociar lotes con multimedia
INSERT INTO LOTE_MULTIMEDIA (id_lote_lote_multimedia, id_multimedia_lote_multimedia)
VALUES
    (1, 1),
    (2, 2),
    (3, 3);

-- Datos de prueba para la tabla LOTES_POSTULAN_REMATES
INSERT INTO LOTES_POSTULAN_REMATES (id_remate_lote_postula_remate, id_lote_lote_postula_remate)
VALUES
    (1, 1),
    (2, 2),
    (3, 3);

-- Datos de prueba para la tabla PUJAS
INSERT INTO PUJAS (monto_puja)
VALUES
    (1750.00),
    (1950.00),
    (1850.00);

-- Datos de prueba para la tabla PUJAS_DE_CLIENTES
INSERT INTO PUJAS_DE_CLIENTES (id_puja_puja_de_cliente, id_cliente_puja_de_cliente)
VALUES
    (1, 2),
    (2, 3),
    (3, 2);

-- Datos de prueba para la tabla PUJAS_DE_REMATES
INSERT INTO PUJAS_DE_REMATES (id_puja_puja_de_remate, id_remate_puja_de_remate, id_lote_puja_de_remate, fecha_puja_de_remate, hora_puja_de_remate)
VALUES
    (1, 1, 1, '2023-09-20', '14:30:00'),
    (2, 2, 2, '2023-09-25', '15:45:00'),
    (3, 3, 3, '2023-10-05', '16:30:00');

-- Datos de prueba para la tabla CATEGORIAS
INSERT INTO CATEGORIAS (nombre_categoria)
VALUES
    ('Terneros'),
    ('Vaquillonas'),
    ('Novillos');

-- Asociar lotes con categorías
INSERT INTO LOTES_CATEGORIZADOS (id_lote_lote_categorizado, id_categoria_lote_categorizado)
VALUES
    (1, 1),
    (2, 2),
    (3, 3);

-- Datos de prueba para la tabla FICHAS
INSERT INTO FICHAS (peso_ficha, cantidad_ficha, raza_ficha, descripcion_ficha)
VALUES
    (500.00, 10, 'Holstein', 'Lote de vacas Holstein de alta producción de leche.'),
    (450.00, 8, 'Angus', 'Lote de vacas Angus criadas para carne de alta calidad.'),
    (550.00, 12, 'Jersey', 'Lote de vacas Jersey ideales para la producción de queso.');

-- Asociar fichas con lotes
INSERT INTO LOTES_DESCRITOS_POR_FICHAS (id_ficha_lote_descrito_por_ficha, id_lote_lote_descrito_por_ficha)
VALUES
    (1, 1),
    (2, 2),
    (3, 3);
