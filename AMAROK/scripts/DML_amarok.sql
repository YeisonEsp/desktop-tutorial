INSERT INTO parametros VALUES('123', 'LA CASA DE LA AMAROK', 0, 2000, 1000, MD5('admin123'));


INSERT INTO departamento VALUES(1, 'Santander');
INSERT INTO departamento VALUES(2, 'Antioquia');
INSERT INTO departamento VALUES(3, 'Norte de Santander');
INSERT INTO departamento VALUES(4, 'Cundinamarca');
INSERT INTO departamento VALUES(5, 'Huila');


INSERT INTO ciudad VALUES(1, 1, 'Bucaramanga', 6000);
INSERT INTO ciudad VALUES(2, 1, 'Floridablanca', 9000);
INSERT INTO ciudad VALUES(3, 1, 'Girón', 12000);
INSERT INTO ciudad VALUES(4, 1, 'Piedecuesta', 20000);
INSERT INTO ciudad VALUES(5, 1, 'Norte', 8000);
INSERT INTO ciudad VALUES(6, 2, 'Medellin');


INSERT INTO tipopago VALUES(1, 'Efectivo');
INSERT INTO tipopago VALUES(2, 'Tarjeta');
INSERT INTO tipopago VALUES(3, 'Transferencia');
INSERT INTO tipopago VALUES(4, 'PSE');
INSERT INTO tipopago VALUES(5, 'Nequi');

INSERT INTO proveedor VALUES('1357', 1, 'Soluciones Múltiples', 'Cra 14 #22-37', '3227695080', 'solucionesm@hotmail.com');
INSERT INTO proveedor VALUES('2468', 1, 'Multipartes y Repuestos', 'Cra 18 #61-15', '6978263', 'multipartesr@gmail.com');
INSERT INTO proveedor VALUES('3692', 1, 'VehiRepuestos', 'cra 16a #49-28', '6428061', 'vehirepuestos@hotmail.com');


insert into producto values('PP201', 'Pera Pomo Amarok', 60, 160000);
insert into producto values('BD301', 'Bomper Delantero Amarok', 40, 900000);
insert into producto values('MC401', 'Manguera Combustible Amarok', 50, 385000);


INSERT INTO cliente VALUES('1005324752', 1, 'cliente', 'Yeison Espinosa', 'Dirección Yeison', '3184790508', 'yeison@gmail.com', MD5('yeison123'));


INSERT INTO empresatransporte VALUES('12345', 'SotraMagdalena', '3155674673');
INSERT INTO empresatransporte VALUES('67890', 'CotraMagdalena', '3185614613');
INSERT INTO empresatransporte VALUES('45632', 'Copetrán', '3114678942');


INSERT INTO mensajero VALUES('1095823698', 2, 'Mensajero Uno', 'Direcciòn Uno', 'Teléfono Uno', 'uno@gmail.com', MD5('uno'));
INSERT INTO mensajero VALUES('1098521618', 2, 'Mensajero Dos', 'Direcciòn Dos', 'Teléfono Dos', 'dos@gmail.com', MD5('dos'));
INSERT INTO mensajero VALUES('1095813090', 2, 'Mensajero Tres', 'Direcciòn Tres', 'Teléfono Tres', 'tres@gmail.com', MD5('tres'));


INSERT INTO venta VALUES(1, '1005324752', 1, 1);

INSERT INTO detalleventa VALUES(1, 'PP201', 10, 0, 1600000);
INSERT INTO detalleventa VALUES(1, 'BD301', 5, 0, 4500000);
INSERT INTO detalleventa VALUES(1, 'MC401', 2, 0, 770000);


insert into pedidoproveedor values(1, '2468', 2, 0, '', 'true');

insert into detallepedido values(1, 'MC401', 2, 350000, 0, 700000);
insert into detallepedido values(1, 'PP201', 2, 120000, 0, 240000);
insert into detallepedido values(1, 'BD301', 1, 800000, 0, 900000);

