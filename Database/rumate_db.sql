-- Crear la base de datos
CREATE DATABASE rumate_db;

-- Usar la base de datos
USE rumate_db;

-- Tabla PERSONAS
CREATE TABLE PERSONAS (
    id_persona INT AUTO_INCREMENT PRIMARY KEY,
    nombre_persona VARCHAR(30) NOT NULL,
    apellido_persona VARCHAR(30) NOT NULL,
    ci_persona VARCHAR(15) NOT NULL,
    barrio_persona VARCHAR(30) NOT NULL,
    calle_persona VARCHAR(30) NOT NULL,
    numero_persona VARCHAR(10) NOT NULL,
    telefono_persona VARCHAR(15) NOT NULL,
    tipo_persona VARCHAR(30) NOT NULL,
    UNIQUE (ci_persona)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla USUARIOS
CREATE TABLE USUARIOS (
    username_usuario VARCHAR(8) PRIMARY KEY,
    password_usuario VARCHAR(255) NOT NULL,
    email_usuario VARCHAR(30) NOT NULL,
    UNIQUE (email_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla USUARIOS_DE_PERSONAS
CREATE TABLE USUARIOS_DE_PERSONAS (
    username_usuario_usuarios_de_personas VARCHAR(8) NOT NULL,
    id_persona_usuarios_de_persona INT NOT NULL,
    PRIMARY KEY (username_usuario_usuarios_de_personas, id_persona_usuarios_de_persona),
    FOREIGN KEY (username_usuario_usuarios_de_personas) REFERENCES USUARIOS(username_usuario),
    FOREIGN KEY (id_persona_usuarios_de_persona) REFERENCES PERSONAS(id_persona)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla CLIENTES
CREATE TABLE CLIENTES (
    id_persona_cliente INT PRIMARY KEY,
    estado_cliente VARCHAR (30) NOT NULL DEFAULT 'ACTIVO',
    FOREIGN KEY (id_persona_cliente) REFERENCES PERSONAS(id_persona)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla REMATES
CREATE TABLE REMATES (
    id_remate INT AUTO_INCREMENT PRIMARY KEY,
    img_remate MEDIUMBLOB NOT NULL,
    titulo_remate VARCHAR (30) NOT NULL,
    fecha_remate DATE NOT NULL,
    hora_remate TIME NOT NULL,
    estado_remate VARCHAR(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla LOTES
CREATE TABLE LOTES (
    id_lote INT AUTO_INCREMENT PRIMARY KEY,
    precio_base_lote DECIMAL(10, 2) NOT NULL,
    precio_final_lote DECIMAL(10, 2) NOT NULL,
    id_cliente_lote INT NOT NULL,
    FOREIGN KEY (id_cliente_lote) REFERENCES CLIENTES(id_persona_cliente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla MULTIMEDIAS
CREATE TABLE MULTIMEDIAS (
    id_multimedia INT AUTO_INCREMENT PRIMARY KEY,
    contenido_multimedia MEDIUMBLOB NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla LOTE_MULTIMEDIA
CREATE TABLE LOTE_MULTIMEDIA (
    id_lote_lote_multimedia INT NOT NULL,
    id_multimedia_lote_multimedia INT NOT NULL,
    PRIMARY KEY (id_lote_lote_multimedia, id_multimedia_lote_multimedia),
    FOREIGN KEY (id_lote_lote_multimedia) REFERENCES LOTES(id_lote),
    FOREIGN KEY (id_multimedia_lote_multimedia) REFERENCES MULTIMEDIAS(id_multimedia)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla LOTES_POSTULAN_REMATES
CREATE TABLE LOTES_POSTULAN_REMATES (
    id_remate_lote_postula_remate INT NOT NULL,
    id_lote_lote_postula_remate INT NOT NULL,
    PRIMARY KEY (id_remate_lote_postula_remate, id_lote_lote_postula_remate),
    FOREIGN KEY (id_remate_lote_postula_remate) REFERENCES REMATES(id_remate),
    FOREIGN KEY (id_lote_lote_postula_remate) REFERENCES LOTES(id_lote)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla PUJAS
CREATE TABLE PUJAS (
    id_puja INT AUTO_INCREMENT PRIMARY KEY,
    monto_puja DECIMAL(10, 2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla PUJAS_DE_CLIENTES
CREATE TABLE PUJAS_DE_CLIENTES (
    id_puja_puja_de_cliente INT PRIMARY KEY,
    id_cliente_puja_de_cliente INT NOT NULL,
    FOREIGN KEY (id_puja_puja_de_cliente) REFERENCES PUJAS(id_puja),
    FOREIGN KEY (id_cliente_puja_de_cliente) REFERENCES CLIENTES(id_persona_cliente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla PUJAS_DE_REMATES
CREATE TABLE PUJAS_DE_REMATES (
    id_puja_puja_de_remate INT PRIMARY KEY,
    id_remate_puja_de_remate INT NOT NULL,
    id_lote_puja_de_remate INT NOT NULL,
    fecha_puja_de_remate DATE NOT NULL,
    hora_puja_de_remate TIME NOT NULL,
    UNIQUE (hora_puja_de_remate),
    FOREIGN KEY (id_puja_puja_de_remate) REFERENCES PUJAS(id_puja),
    FOREIGN KEY (id_remate_puja_de_remate) REFERENCES REMATES(id_remate),
    FOREIGN KEY (id_lote_puja_de_remate) REFERENCES LOTES(id_lote)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla CATEGORIAS
CREATE TABLE CATEGORIAS (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre_categoria VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla LOTES_CATEGORIZADOS
CREATE TABLE LOTES_CATEGORIZADOS (
    id_lote_lote_categorizado INT NOT NULL,
    id_categoria_lote_categorizado INT NOT NULL,
    PRIMARY KEY (id_lote_lote_categorizado, id_categoria_lote_categorizado),
    FOREIGN KEY (id_lote_lote_categorizado) REFERENCES LOTES(id_lote),
    FOREIGN KEY (id_categoria_lote_categorizado) REFERENCES CATEGORIAS(id_categoria)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla FICHAS
CREATE TABLE FICHAS (
    id_ficha INT AUTO_INCREMENT PRIMARY KEY,
    peso_ficha DECIMAL(10, 2) NOT NULL,
    cantidad_ficha INT NOT NULL,
    raza_ficha VARCHAR(255) NOT NULL,
    descripcion_ficha TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla LOTES_DESCRITOS_POR_FICHAS
CREATE TABLE LOTES_DESCRITOS_POR_FICHAS (
    id_ficha_lote_descrito_por_ficha INT NOT NULL,
    id_lote_lote_descrito_por_ficha INT NOT NULL,
    PRIMARY KEY (id_ficha_lote_descrito_por_ficha, id_lote_lote_descrito_por_ficha),
    FOREIGN KEY (id_ficha_lote_descrito_por_ficha) REFERENCES FICHAS(id_ficha),
    FOREIGN KEY (id_lote_lote_descrito_por_ficha) REFERENCES LOTES(id_lote)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
