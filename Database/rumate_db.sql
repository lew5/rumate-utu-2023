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
    estado_persona ENUM('Activo', 'Inactivo') DEFAULT 'Activo' NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla USUARIOS
CREATE TABLE USUARIOS (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    username_usuario VARCHAR(40) UNIQUE NOT NULL,
    password_usuario VARCHAR(255) NOT NULL,
    email_usuario VARCHAR(40) UNIQUE NOT NULL,
    tipo_usuario ENUM('ROOT', 'ADMINISTRADOR', 'CLIENTE','PROVEEDOR','REMATADOR') DEFAULT 'CLIENTE' NOT NULL
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
    estado_remate ENUM('Pendiente','Rematando','Finalizado') DEFAULT 'Pendiente' NOT NULL
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
