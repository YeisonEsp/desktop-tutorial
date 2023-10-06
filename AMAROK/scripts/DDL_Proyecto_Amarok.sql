-- A CONTINUACION SE REALIZA EL DDL DE LAS TABLAS PARA EL PROYECTO AMAROK --
-- 
DROP TABLE IF EXISTS detallepedido;
DROP TABLE IF EXISTS pedidoproveedor;
DROP TABLE IF EXISTS envionacional;
DROP TABLE IF EXISTS empresatransporte;
DROP TABLE IF EXISTS enviolocal;
DROP TABLE IF EXISTS redencionpuntos;
DROP TABLE IF EXISTS detalleventa;
DROP TABLE IF EXISTS venta;
DROP TABLE IF EXISTS mensajero;
DROP TABLE IF EXISTS cliente;
DROP TABLE IF EXISTS producto;
DROP TABLE IF EXISTS proveedor;
DROP TABLE IF EXISTS tipopago;
DROP TABLE IF EXISTS parametros;
DROP TABLE IF EXISTS ciudad;
DROP TABLE IF EXISTS departamento;

-- TABLA DE PARAMETROS
CREATE TABLE parametros
(
    empreNit          VARCHAR NOT NULL,                                 -- NIT DE LA EMPRESA AMAROK
    empreNom          VARCHAR NOT NULL,                                 -- NOMBRE DE LA EMPRESA AMAROK
    numFacIni         DECIMAL(5,0) NOT NULL,                            -- NÚMERO INICIAL DE LA FACTURA
    redPunDes         DECIMAL(4,0) NOT NULL,                            -- PUNTAJE MÍNIMO NECESARIO PARA REDIMIR UN DESCUENTO DEL 30%
    redPunDom         DECIMAL(4,0) NOT NULL,                            -- PUNTAJE MÍNIMO NECESARIO PARA REDIMIR UN DOMICILIO GRATIS
    adminCon          VARCHAR DEFAULT NULL,                             -- CONTRASEÑA DEL ADMIN
    usr_insert        VARCHAR NOT NULL,                                 -- USUARIO QUIEN INSERTÓ EL REGISTRO
    fec_insert        TIMESTAMP WITHOUT TIME ZONE NOT NULL,             -- FECHA EN LA QUE SE INSERTÓ EL REGISTRO
    usr_update        VARCHAR,                                          -- USUARIO QUIEN ACTUALIZÓ EL REGISTRO
    fec_update        TIMESTAMP WITHOUT TIME ZONE,                      -- FECHA EN LA QUE SE ACTUALIZÓ EL REGISTRO
    PRIMARY KEY(empreNit)
);

-- TABLA DE DEPARTAMENTOS
CREATE TABLE departamento
(
    departId        DECIMAL(2,0) NOT NULL,                              -- NÚMERO IDENTIFICADOR DEL DEPARTAMENTO
    departNom       VARCHAR NOT NULL,                                   -- NOMBRE DEL DEPARTAMENTO
    usr_insert      VARCHAR NOT NULL,                                   -- USUARIO QUIEN INSERTÓ EL REGISTRO
    fec_insert      TIMESTAMP WITHOUT TIME ZONE NOT NULL,               -- FECHA EN LA QUE SE INSERTÓ EL REGISTRO
    usr_update      VARCHAR,                                            -- USUARIO QUIEN ACTUALIZÓ EL REGISTRO
    fec_update      TIMESTAMP WITHOUT TIME ZONE,                        -- FECHA EN LA QUE SE ACTUALIZÓ EL REGISTRO
    PRIMARY KEY (departId)
);

-- TABLA DE CIUDADES
CREATE TABLE ciudad
(
    ciudadId           DECIMAL(5,0) NOT NULL,                           -- NÚMERO IDENTIFICADOR DE LA CIUDAD
    idDepart           DECIMAL(2,0) NOT NULL,                           -- FORÁNEA DEPARTAMENTO
    ciudadNom          VARCHAR NOT NULL,                                -- NOMBRE DE LA CIUDAD, SOLO SE PUEDE INCLUIR FLORIDABLANCA, GIRÓN, NORTE Y PIEDECUESTA COMO CIUDADES
    precioDom          DECIMAL(5,0) DEFAULT 0,                          -- PRECIO QUE TENDRÁ EL DOMICILIO EN BUCARAMANGA O SU ÁREA METROPOLITANA
    usr_insert         VARCHAR NOT NULL,                                -- USUARIO QUIEN INSERTÓ EL REGISTRO
    fec_insert         TIMESTAMP WITHOUT TIME ZONE NOT NULL,            -- FECHA EN LA QUE SE INSERTÓ EL REGISTRO
    usr_update         VARCHAR,                                         -- USUARIO QUIEN ACTUALIZÓ EL REGISTRO
    fec_update         TIMESTAMP WITHOUT TIME ZONE,                     -- FECHA EN LA QUE SE ACTUALIZÓ EL REGISTRO
    PRIMARY KEY (ciudadId),
    FOREIGN KEY (idDepart) REFERENCES departamento(departId)
);

-- TABLA DE LOS TIPOS DE PAGO EN LA EMRPESA
CREATE TABLE tipopago
(
    tipPagId        DECIMAL(1,0) NOT NULL,                              -- NÚMERO IDENTIFICADOR DEL TIPO DE PAGO
    tipPagNom       VARCHAR NOT NULL,                                   -- NOMBRE DEL TIPO DE PAGO
    usr_insert      VARCHAR NOT NULL,                                   -- USUARIO QUIEN INSERTÓ EL REGISTRO
    fec_insert      TIMESTAMP WITHOUT TIME ZONE NOT NULL,               -- FECHA EN LA QUE SE INSERTÓ EL REGISTRO
    PRIMARY KEY (tipPagId)
);


-- TABLA DE PROVEEDORES
CREATE TABLE proveedor
(
    proveeNit       VARCHAR NOT NULL,                                   -- NIT DEL PROVEEDOR
    idCiudad        DECIMAL(5,0) NOT NULL,                              -- FORÁNEA CÓDIGO CIUDAD 
    proveeNom       VARCHAR NOT NULL,                                   -- NOMBRE DEL PROVEEDOR
    proveeDir       VARCHAR NOT NULL,                                   -- DIRECCIÓN DEL PROVEEDOR
    proveeTel       VARCHAR NOT NULL,                                   -- TELÉFONO DEL PROVEEDOR
    proveeEma       VARCHAR NOT NULL,                                   -- CORREO/EMAIL DEL PROVEEDOR
    usr_insert      VARCHAR NOT NULL,                                   -- USUARIO QUIEN INSERTÓ EL REGISTRO
    fec_insert      TIMESTAMP WITHOUT TIME ZONE NOT NULL,               -- FECHA EN LA QUE SE INSERTÓ EL REGISTRO
    usr_update      VARCHAR,                                            -- USUARIO QUIEN ACTUALIZÓ EL REGISTRO
    fec_update      TIMESTAMP WITHOUT TIME ZONE,                        -- FECHA EN LA QUE SE ACTUALIZÓ EL REGISTRO
    PRIMARY KEY (proveeNit),
    FOREIGN KEY (idCiudad) REFERENCES ciudad(ciudadId)
);

-- TABLA DE PRODUCTOS
CREATE TABLE producto
(
    producCod          VARCHAR NOT NULL,                                -- CÓDIGO IDENTIFICADOR DEL PRODUCTO
    producNom          VARCHAR NOT NULL,                                -- NOMBRE DEL PRODUCTO
    producSto          DECIMAL(3,0) NOT NULL CHECK(producSto>=0),       -- NUMERO DE PRODUCTOS EN INVENTARIO / STOCK
    producPre          DECIMAL(7,0) NOT NULL CHECK(producPre>0),        -- VALOR UNITARIO PARA VENTA DEL PRODUCTO
    producDis          BOOLEAN NOT NULL DEFAULT TRUE,                   -- ESTADO DE DISPONIBILIDAD DEL PRODUCTO
    producAct          BOOLEAN NOT NULL DEFAULT TRUE,                   -- INDICADOR DE PRODUCTO ACTIVO TRUE O NO ACTIVO FALSE
    usr_insert         VARCHAR NOT NULL,                                -- USUARIO QUIEN INSERTÓ EL REGISTRO
    fec_insert         TIMESTAMP WITHOUT TIME ZONE NOT NULL,            -- FECHA EN LA QUE SE INSERTÓ EL REGISTRO
    usr_update         VARCHAR,                                         -- USUARIO QUIEN ACTUALIZÓ EL REGISTRO
    fec_update         TIMESTAMP WITHOUT TIME ZONE,                     -- FECHA EN LA QUE SE ACTUALIZÓ EL REGISTRO
    PRIMARY KEY (producCod)
);

-- TABLA DE CLIENTES
CREATE TABLE cliente
(
    clientDoc          VARCHAR NOT NULL,                                -- DOCUMENTO IDENTIFICADOR DEL CLIENTE. TAMBIÉN ES SU USUARIO PARA LOGEARSE
    idCiudad           DECIMAL(5,0) NOT NULL,                           -- FORÁNEA CIUDAD
    clientRol         VARCHAR NOT NULL,                                -- ROL DEL CLIENTE EN EL SISTEMA
    clientNom          VARCHAR NOT NULL,                                -- NOMBRE DEL CLIENTE
    clientDir          VARCHAR NOT NULL,                                -- DIRECCIÓN DEL CLIENTE
    clientTel          VARCHAR NOT NULL,                                -- TELÉFONO DEL CLIENTE
    clientEma          VARCHAR NOT NULL,                                -- EMAIL/ CORREO DEL CLIENTE
    clientCon          VARCHAR NOT NULL,                                -- CONTRASEÑA DEL CLIENTE PARA LOGEARSE
    clientDirDos       VARCHAR DEFAULT NULL,                            -- DIRECCIÓN ALTERNATIVA 1 DE ENVÍO DEL CLIENTE
    clientDirtres      VARCHAR DEFAULT NULL,                            -- DIRECCIÓN ALTERNATIVA 2 DE ENVÍO DEL CLIENTE
    clientTelDos       VARCHAR DEFAULT NULL,                            -- TELÉFONO ALTERNATIVO DE ENVÍO DEL CLIENTE
    clientTelTres      VARCHAR DEFAULT NULL,                            -- TELÉFONO ALTERNATIVO DE ENVÍO DEL CLIENTE
    clientPun          DECIMAL(5,0) NOT NULL DEFAULT 0,                 -- PUNTOS POR COMPRAS. POR CADA 1000 PESOS SE LE DARÁ 1 PUNTO AL CLIENTE
    clientAct          BOOLEAN NOT NULL DEFAULT TRUE,                   -- INDICADOR DE CLIENTE ACTIVO TRUE O NO ACTIVO FALSE
    usr_insert         VARCHAR NOT NULL,                                -- USUARIO QUIEN INSERTÓ EL REGISTRO
    fec_insert         TIMESTAMP WITHOUT TIME ZONE NOT NULL,            -- FECHA EN LA QUE SE INSERTÓ EL REGISTRO
    usr_update         VARCHAR,                                         -- USUARIO QUIEN ACTUALIZÓ EL REGISTRO
    fec_update         TIMESTAMP WITHOUT TIME ZONE,                     -- FECHA EN LA QUE SE ACTUALIZÓ EL REGISTRO
    PRIMARY KEY (clientDoc),
    FOREIGN KEY (idCiudad) REFERENCES ciudad(ciudadId)
);

-- TABLA DE MENSAJEROS
CREATE TABLE mensajero
(
    mensajDoc          VARCHAR NOT NULL,                               -- DOCUMENTO IDENTIFICADOR DEL MENSAJERO. TAMBIÉN ES SU USUARIO PARA LOGEARSE
    mensajRol          VARCHAR NOT NULL,                               -- ROL DEL MENSAJERO EN EL SISTEMA
    mensajNom          VARCHAR NOT NULL,                               -- NOMBRE DEL MENSAJERO
    mensajDir          VARCHAR NOT NULL,                               -- DIRECCIÓN DEL MENSAJERO
    mensajTel          VARCHAR NOT NULL,                               -- TELÉFONO DEL MENSAJERO
    mensajEma          VARCHAR NOT NULL,                               -- EMAIL/ CORREO DEL MENSAJERO
    mensajCon          VARCHAR NOT NULL,                               -- CONTRASEÑA DEL MENSAJERO PARA LOGEARSE
    mensajDis          BOOLEAN NOT NULL DEFAULT TRUE,                  -- DISPONIBILIDAD DEL MENSAJERO.
    mensajAct          BOOLEAN NOT NULL DEFAULT TRUE,                  -- INDICADOR DE MENSAJERO ACTIVO TRUE O NO ACTIVO FALSE
    usr_insert         VARCHAR NOT NULL,                               -- USUARIO QUIEN INSERTÓ EL REGISTRO
    fec_insert         TIMESTAMP WITHOUT TIME ZONE NOT NULL,           -- FECHA EN LA QUE SE INSERTÓ EL REGISTRO
    usr_update         VARCHAR,                                        -- USUARIO QUIEN ACTUALIZÓ EL REGISTRO
    fec_update         TIMESTAMP WITHOUT TIME ZONE,                    -- FECHA EN LA QUE SE ACTUALIZÓ EL REGISTRO
    PRIMARY KEY (mensajDoc)
);


-- TABLA PARA LA VENTA
CREATE TABLE venta
(
    ventaNum        DECIMAL(5,0) NOT NULL,                             -- NÚMERO IDENTIFICADOR DE LA VENTA
    docClient       VARCHAR NOT NULL,                                  -- FORÁNEA DOCUMENTO CLIENTE
    idCiudad        DECIMAL(5,0) NOT NULL,                             -- FORÁNEA DE LA CIUDAD DEL CLIENTE
    idTipPag        DECIMAL(1,0) NOT NULL,                             -- FORÁNEA MODO DE PAGO
    ventaRutFac     VARCHAR DEFAULT NULL,                              -- RUTA DEL DESTINO DE LA FACTURA
    ventaRec        BOOLEAN NOT NULL DEFAULT FALSE,                    -- EL VALOR DE LA VENTA FUE RECAUDADO O NO
	ventaPlaRec     TIMESTAMP NOT NULL DEFAULT NOW(),                  -- PLAZO PARA RECAUDAR EL VALOR DE LA VENTA
    ventaRutRec     VARCHAR DEFAULT NULL,                              -- RUTA DEL DESTINO DE LA FACTURA
    ventaDom        BOOLEAN NOT NULL DEFAULT FALSE,                    -- CLIENTE REQUIERE DOMICILIO O NO
    usr_insert      VARCHAR NOT NULL,                                  -- USUARIO QUIEN INSERTÓ EL REGISTRO
    fec_insert      TIMESTAMP WITHOUT TIME ZONE NOT NULL,              -- FECHA EN LA QUE SE INSERTÓ EL REGISTRO
    PRIMARY KEY (ventaNum),
    FOREIGN KEY (docClient) REFERENCES cliente(clientDoc),
    FOREIGN KEY (idCiudad) REFERENCES ciudad(ciudadId),
    FOREIGN KEY (idTipPag) REFERENCES tipopago(tipPagId)
);

-- TABLA PARA EL DETALLL DE LA VENTA
CREATE TABLE detalleventa
(
    numVenta            DECIMAL(5,0) NOT NULL,                         -- FORÁNEA NÚMERO VENTA
    codProduc           VARCHAR NOT NULL,                              -- FORÁNEA CODIGO PRODUCTO
    detVentaCan         DECIMAL(3,0) NOT NULL,                         -- CANTIDAD DE PRODUCTO DEL DETALLE DE LA VENTA
    detVentaDes         DECIMAL(6,0) NOT NULL,                         -- DESCUENTO APLICADO AL PRODUCTO
    detVentaValPar      DECIMAL(8,0) NOT NULL,                         -- VALOR PARCIAL MONETARIO DEL DETALLE DE LA VENTA
    usr_insert          VARCHAR NOT NULL,                              -- USUARIO QUIEN INSERTÓ EL REGISTRO
    fec_insert          TIMESTAMP WITHOUT TIME ZONE NOT NULL,          -- FECHA EN LA QUE SE INSERTÓ EL REGISTRO
    PRIMARY KEY (numVenta, codProduc),
    FOREIGN KEY (numVenta) REFERENCES venta(ventaNum),
    FOREIGN KEY (codProduc) REFERENCES producto(producCod)
);

-- TABLA DE REDENCIÓN DE PUNTOS DEL CLIENTE
CREATE TABLE redencionpuntos
(
    redencNum          DECIMAL(2,0) NOT NULL,                          -- NÚMERO IDENTIFICADOR DE LA REDENCIÓN DE PUNTOS DEL CLIENTE
    numVenta           DECIMAL(5,0) NOT NULL,                          -- FORÁNEA CLIENTE
    redencPunRed       DECIMAL(2,0) NOT NULL,                          -- CANTIDAD DE PUNTOS REDIMIDOS POR EL CLIENTE
    redencDes          BOOLEAN NOT NULL,                               -- INDICADOR DE REDENCIÓN DESCUENTO TRUE Y SI NO ES DOMICILIO FALSE
    usr_insert         VARCHAR NOT NULL,                               -- USUARIO QUIEN INSERTÓ EL REGISTRO
    fec_insert         TIMESTAMP WITHOUT TIME ZONE NOT NULL,           -- FECHA EN LA QUE SE INSERTÓ EL REGISTRO
    PRIMARY KEY (redencNum),
    FOREIGN KEY (numVenta) REFERENCES venta(ventaNum)
);

-- TABLA DE ENVÍO LOCAL
CREATE TABLE enviolocal
(
    envioLocNum         DECIMAL(4,0) NOT NULL,                          -- NÚMERO IDENTIFICADOR DEL ENVÍO LOCAL
    numVenta            DECIMAL(5,0) NOT NULL,                          -- FORÁNEA VENTA
    docMensaj           VARCHAR,                                        -- FORÁNEA MENSAJERO
    idCiudad            DECIMAL(5,0) NOT NULL,                          -- FORÁNEA MUNICIPIO DE DESTINO
    envioLocNomDes      VARCHAR NOT NULL,                               -- NOMBRE DEL DESTINARIO DEL ENVÍO
    envioLocDirDes      VARCHAR NOT NULL,                               -- DIRECCIÓN DE DESTINO DEL ENVÍO
    envioLocTelDes      VARCHAR NOT NULL,                               -- TELÉFONO DEL DESTINARIO DEL ENVÍO
    envioLocPre         DECIMAL(5,0) NOT NULL,                          -- PRECIO DEL ENVÍO
    envioLocObs         VARCHAR DEFAULT NULL,                           -- OBSERVACIONES DEL ENVÍO
    envioLocSal         BOOLEAN NOT NULL DEFAULT FALSE,                 -- INDICADOR DE SALIDA DEL ENVÍO. SALIÓ TRUE, NO SALIÓ FALSE
    envioLocEnt         BOOLEAN NOT NULL DEFAULT FALSE,                 -- INDICADOR DE ENTREGA DEL ENVÍO. ENTREGADO TRUE, NO ENTREGADO FALSE
    usr_insert          VARCHAR NOT NULL,                               -- USUARIO QUIEN INSERTÓ EL REGISTRO
    fec_insert          TIMESTAMP WITHOUT TIME ZONE NOT NULL,           -- FECHA EN LA QUE SE INSERTÓ EL REGISTRO
    usr_update          VARCHAR,                                        -- USUARIO QUIEN ACTUALIZÓ EL REGISTRO
    fec_update          TIMESTAMP WITHOUT TIME ZONE,                    -- FECHA EN LA QUE SE ACTUALIZÓ EL REGISTRO
    PRIMARY KEY (envioLocNum),
    FOREIGN KEY (numVenta) REFERENCES venta(ventaNum),
    FOREIGN KEY (docMensaj) REFERENCES mensajero(mensajDoc),
    FOREIGN KEY (idCiudad) REFERENCES ciudad(ciudadId)
);

--TABLA PARA EMPRESA DE TRANSPORTE
CREATE TABLE empresatransporte
(
    empreTraNit         VARCHAR NOT NULL,                               -- NIT DE LA EMPRESA DE TRANSPORTE
    empreTraNom         VARCHAR NOT NULL,                               -- NOMBRE DE LA EMPRESA DE TRANSPORTE
    empreTraTel         VARCHAR NOT NULL,                               -- TELÉFONO DE LA EMPRESA DE TRANSPORTE
    usr_insert          VARCHAR NOT NULL,                               -- USUARIO QUIEN INSERTÓ EL REGISTRO
    fec_insert          TIMESTAMP WITHOUT TIME ZONE NOT NULL,           -- FECHA EN LA QUE SE INSERTÓ EL REGISTRO
    usr_update          VARCHAR,                                        -- USUARIO QUIEN ACTUALIZÓ EL REGISTRO
    fec_update          TIMESTAMP WITHOUT TIME ZONE,                    -- FECHA EN LA QUE SE ACTUALIZÓ EL REGISTRO
    PRIMARY KEY (empreTraNit)
);

--TABLA DE ENVÍO NACIONAL
CREATE TABLE envionacional
(
    envioNacNum               DECIMAL(4,0) NOT NULL,                      -- NÚMERO IDENTIFICADOR DEL ENVÍO NACIONAL
    numVenta                  DECIMAL(5,0) NOT NULL,                      -- FORÁNEA VENTA
    docMensaj	              VARCHAR,                                    -- FORÁNEA MENSAJERO QUE PONDRÁ LA ENCOMIENDA
    idCiudad                  DECIMAL(5,0) NOT NULL,                      -- FORÁNEA MUNICIPIO DE DESTINO
    nitEmpreTra               VARCHAR NOT NULL,                           -- FORÁNEA EMPRESA TRANSPORTE
    envioNacNomDes            VARCHAR NOT NULL,                           -- NOMBRE DEL DESTINARIO DEL ENVÍO
    envioNacDirDes            VARCHAR NOT NULL,                           -- DIRECCIÓN DE DESTINO DEL ENVÍO
    envioNacTelDes            VARCHAR NOT NULL,                           -- TELÉFONO DEL DESTINARIO DEL ENVÍO
    envioNacPre               DECIMAL(5,0) NOT NULL,                      -- PRECIO DEL ENVÍO
    envioNacObs               VARCHAR DEFAULT NULL,                       -- OBSERVACIONES DEL ENVÍO
    envioNacSal               BOOLEAN NOT NULL DEFAULT FALSE,             -- INDICADOR DE SALIDA DEL ENVÍO. SALIÓ TRUE, NO SALIÓ FALSE
    envioNacRec               BOOLEAN NOT NULL DEFAULT FALSE,             -- INDICADOR DE RECIBIDO DEL ENVÍO. RECIBIDO TRUE, NO RECIBIDO FALSE
    envioNacRut               VARCHAR DEFAULT NULL,                       -- RUTA DE ACCESO A GUÍA DE ENVÍO NACIONAL
    usr_insert                VARCHAR NOT NULL,                           -- USUARIO QUIEN INSERTÓ EL REGISTRO
    fec_insert                TIMESTAMP WITHOUT TIME ZONE NOT NULL,       -- FECHA EN LA QUE SE INSERTÓ EL REGISTRO
    usr_update                VARCHAR,                                    -- USUARIO QUIEN ACTUALIZÓ EL REGISTRO
    fec_update                TIMESTAMP WITHOUT TIME ZONE,                -- FECHA EN LA QUE SE ACTUALIZÓ EL REGISTRO 
    PRIMARY KEY (envioNacNum),
    FOREIGN KEY (numVenta) REFERENCES venta(ventaNum),
	FOREIGN KEY (docMensaj) REFERENCES mensajero(mensajDoc),
    FOREIGN KEY (idCiudad) REFERENCES ciudad(ciudadId),
    FOREIGN KEY (nitEmpreTra) REFERENCES empresatransporte(empreTraNit)
);

--TABLA DE PEDIDO A PROVEEDOR
CREATE TABLE pedidoproveedor
(
    pedidoNum               DECIMAL(5,0) NOT NULL,                         -- NÚMERO IDENTIFICADOR DEL PEDIDO AL PROVEEDOR
    nitProvee               VARCHAR NOT NULL,                              -- FORÁNEA PROVEEDOR
    idTipPag                DECIMAL(1,0) NOT NULL,                         -- FORÁNEA MODO DE PAGO
    pedidoDesEsp            DECIMAL(6,0) DEFAULT 0,                        -- DESCUENTO ESPECIAL DEL PROVEEDOR PARA TODO EL PEDIDO
    pedidoRutPag            VARCHAR DEFAULT NULL,                          -- RUTA DE ACCESO AL VOUCHER DE PAGO AL PROVEEDOR
    pedidoPag               BOOLEAN NOT NULL,                              -- EL PEDIDO FUE PAGADO AL PROVEEDOR TRUE, SI NO FALSE
	PagoPlazo               TIMESTAMP NOT NULL DEFAULT NOW(),              -- PLAZO PARA PAGAR EL VALOR DEL PEDID.
    usr_insert              VARCHAR NOT NULL,                              -- USUARIO QUIEN INSERTÓ EL REGISTRO
    fec_insert              TIMESTAMP WITHOUT TIME ZONE NOT NULL,          -- FECHA EN LA QUE SE INSERTÓ EL REGISTRO
    PRIMARY KEY (pedidoNum),
    FOREIGN KEY (nitProvee) REFERENCES proveedor(proveeNit),
    FOREIGN KEY (idTipPag) REFERENCES tipopago(tipPagId)
);

-- TABLA PARA EL DETALLE DEL PEDIDO
CREATE TABLE detallepedido
(
    numPedido               DECIMAL(5,0) NOT NULL,                          -- FORÁNEA NÚMERO PEDIDO
    codProduc               VARCHAR NOT NULL,                               -- FORÁNEA CODIGO PRODUCTO
    detPedCan               DECIMAL(3,0) NOT NULL,                          -- CANTIDAD DE PRODUCTO DEL DETALLE DEL PEDIDO
    detPedCos               DECIMAL(7,0) NOT NULL,                          -- COSTO UNITARIO DEL PRODUCTO
    detallePedDes           DECIMAL(6,0) NOT NULL,                          -- DESCUENTO POR CADA PRODUCTO
    detPedValPar            DECIMAL(8,0) NOT NULL,                          -- VALOR PARCIAL MONETARIO DEL DETALLE DEL PEDIDO
    usr_insert              VARCHAR NOT NULL,                               -- USUARIO QUIEN INSERTÓ EL REGISTRO
    fec_insert              TIMESTAMP WITHOUT TIME ZONE NOT NULL,           -- FECHA EN LA QUE SE INSERTÓ EL REGISTRO
    PRIMARY KEY (numPedido, codProduc),
    FOREIGN KEY (numPedido) REFERENCES pedidoproveedor(pedidoNum),
    FOREIGN KEY (codProduc) REFERENCES producto(producCod)
);

