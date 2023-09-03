-- Creación de la base de datos
CREATE DATABASE db_rumate;

-- Usar la base de datos
USE db_rumate;

-- Establecer el motor de almacenamiento InnoDB
SET default_storage_engine = 'InnoDB';


-- Creación de las tablas

CREATE TABLE PERSONAS (
    idPersona INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    apellido VARCHAR(255),
    ci VARCHAR(20),
    barrio VARCHAR(255),
    calle VARCHAR(255),
    numero VARCHAR(20),
    telefono VARCHAR(20)
) ENGINE=InnoDB;

CREATE TABLE USUARIOS (
    username VARCHAR(50) PRIMARY KEY,
    password VARCHAR(255),
    email VARCHAR(255),
    idPersona_usuario INT,
    FOREIGN KEY (idPersona_usuario) REFERENCES PERSONAS(idPersona)
) ENGINE=InnoDB;

CREATE TABLE CLIENTES_PROVEEDORES (
    idPersona_clienteProveedor INT PRIMARY KEY,
    estado_cliente_proveedor VARCHAR(255)
) ENGINE=InnoDB;

CREATE TABLE PERMISOS (
    idPermiso INT PRIMARY KEY AUTO_INCREMENT,
    nombre_permiso VARCHAR(255)
) ENGINE=InnoDB;

CREATE TABLE EMPLEADOS (
    idPersona_empleado INT PRIMARY KEY,
    idPermiso_empleado INT,
    FOREIGN KEY (idPersona_empleado) REFERENCES PERSONAS(idPersona),
    FOREIGN KEY (idPermiso_empleado) REFERENCES PERMISOS(idPermiso)
) ENGINE=InnoDB;

CREATE TABLE REMATES (
    idRemate INT PRIMARY KEY AUTO_INCREMENT,
    idEmpleado_remate INT,
    estado_remate VARCHAR(255),
    FOREIGN KEY (idEmpleado_remate) REFERENCES EMPLEADOS(idPersona_empleado)
) ENGINE=InnoDB;

CREATE TABLE LOTES (
    idLote INT PRIMARY KEY AUTO_INCREMENT,
    idEmpleado_lote INT,
    precio_base_lote DECIMAL(10, 2),
    precio_final_lote DECIMAL(10, 2),
    FOREIGN KEY (idEmpleado_lote) REFERENCES EMPLEADOS(idPersona_empleado)
) ENGINE=InnoDB;

CREATE TABLE LOTES_POSTULAN_REMATES (
    idRemate_lotePostulaRemate INT,
    idLote_lotePostulaRemate INT,
    idEmpleado_lotePostulaRemate INT,
    fecha DATE,
    PRIMARY KEY (idRemate_lotePostulaRemate, idLote_lotePostulaRemate),
    FOREIGN KEY (idRemate_lotePostulaRemate) REFERENCES REMATES(idRemate),
    FOREIGN KEY (idLote_lotePostulaRemate) REFERENCES LOTES(idLote),
    FOREIGN KEY (idEmpleado_lotePostulaRemate) REFERENCES EMPLEADOS(idPersona_empleado)
) ENGINE=InnoDB;

CREATE TABLE ANIMALES (
    idAnimal INT PRIMARY KEY AUTO_INCREMENT,
    idClienteProveedor_animal INT,
    idLote_animal INT,
    sexo_animal VARCHAR(20),
    raza_animal VARCHAR(255),
    edad_animal_animal INT,
    peso_animal DECIMAL(10, 2),
    especie_animal VARCHAR(255),
    FOREIGN KEY (idClienteProveedor_animal) REFERENCES CLIENTES_PROVEEDORES(idPersona_clienteProveedor),
    FOREIGN KEY (idLote_animal) REFERENCES LOTES(idLote)
) ENGINE=InnoDB;

CREATE TABLE ANIMALES_INGRESADOS (
    idAnimal_animalIngresado INT,
    idEmpleado_animalIngresado INT,
    PRIMARY KEY (idAnimal_animalIngresado),
    FOREIGN KEY (idAnimal_animalIngresado) REFERENCES ANIMALES(idAnimal),
    FOREIGN KEY (idEmpleado_animalIngresado) REFERENCES EMPLEADOS(idPersona_empleado)
) ENGINE=InnoDB;

CREATE TABLE PUJAS (
    idPuja INT PRIMARY KEY AUTO_INCREMENT,
    monto_puja DECIMAL(10, 2)
) ENGINE=InnoDB;

CREATE TABLE PUJAS_DE_REMATES (
    idPujaDeRemate_puja INT,
    idRemate_pujasDeRemate INT,
    idLote_pujasDeRemate INT,
    idEmpleado INT,
    fecha_puja_de_remate DATETIME,
    PRIMARY KEY (idPujaDeRemate_puja),
    FOREIGN KEY (idRemate_pujasDeRemate) REFERENCES REMATES(idRemate),
    FOREIGN KEY (idLote_pujasDeRemate) REFERENCES LOTES(idLote),
    FOREIGN KEY (idEmpleado) REFERENCES EMPLEADOS(idPersona_empleado)
) ENGINE=InnoDB;

CREATE TABLE PUJAS_DE_CLIENTES_PROVEEDORES (
    idPujaDeRemate_pujaDeClienteProveedor INT,
    idClienteProveedor_pujaDeClienteProveedor INT,
    PRIMARY KEY (idPujaDeRemate_pujaDeClienteProveedor),
    FOREIGN KEY (idClienteProveedor_pujaDeClienteProveedor) REFERENCES CLIENTES_PROVEEDORES(idPersona_clienteProveedor)
) ENGINE=InnoDB;
