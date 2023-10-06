CREATE OR REPLACE TRIGGER tri_actualizacion_departamento BEFORE INSERT OR UPDATE ON departamento
FOR EACH ROW EXECUTE PROCEDURE fun_actualizacion_tabla();

CREATE OR REPLACE TRIGGER tri_actualizacion_ciudad BEFORE INSERT OR UPDATE ON ciudad
FOR EACH ROW EXECUTE PROCEDURE fun_actualizacion_tabla();

CREATE OR REPLACE TRIGGER tri_actualizacion_parametros BEFORE INSERT OR UPDATE ON parametros
FOR EACH ROW EXECUTE PROCEDURE fun_actualizacion_tabla();

CREATE OR REPLACE TRIGGER tri_actualizacion_tipopago BEFORE INSERT OR UPDATE ON tipopago
FOR EACH ROW EXECUTE PROCEDURE fun_actualizacion_tabla();

CREATE OR REPLACE TRIGGER tri_actualizacion_proveedor BEFORE INSERT OR UPDATE ON proveedor
FOR EACH ROW EXECUTE PROCEDURE fun_actualizacion_tabla();

CREATE OR REPLACE TRIGGER tri_actualizacion_producto BEFORE INSERT OR UPDATE ON producto
FOR EACH ROW EXECUTE PROCEDURE fun_actualizacion_tabla();

CREATE OR REPLACE TRIGGER tri_actualizacion_cliente BEFORE INSERT OR UPDATE ON cliente
FOR EACH ROW EXECUTE PROCEDURE fun_actualizacion_tabla();

CREATE OR REPLACE TRIGGER tri_actualizacion_mensajero BEFORE INSERT OR UPDATE ON mensajero
FOR EACH ROW EXECUTE PROCEDURE fun_actualizacion_tabla();

CREATE OR REPLACE TRIGGER tri_actualizacion_venta BEFORE INSERT OR UPDATE ON venta
FOR EACH ROW EXECUTE PROCEDURE fun_actualizacion_tabla();

CREATE OR REPLACE TRIGGER tri_actualizacion_detalleventa BEFORE INSERT OR UPDATE ON detalleventa
FOR EACH ROW EXECUTE PROCEDURE fun_actualizacion_tabla();

CREATE OR REPLACE TRIGGER tri_actualizacion_redencionpuntos BEFORE INSERT OR UPDATE ON redencionpuntos
FOR EACH ROW EXECUTE PROCEDURE fun_actualizacion_tabla();

CREATE OR REPLACE TRIGGER tri_actualizacion_enviolocal BEFORE INSERT OR UPDATE ON enviolocal
FOR EACH ROW EXECUTE PROCEDURE fun_actualizacion_tabla();

CREATE OR REPLACE TRIGGER tri_actualizacion_empresatransporte BEFORE INSERT OR UPDATE ON empresatransporte
FOR EACH ROW EXECUTE PROCEDURE fun_actualizacion_tabla();

CREATE OR REPLACE TRIGGER tri_actualizacion_envionacional BEFORE INSERT OR UPDATE ON envionacional
FOR EACH ROW EXECUTE PROCEDURE fun_actualizacion_tabla();

CREATE OR REPLACE TRIGGER tri_actualizacion_pedidoproveedor BEFORE INSERT OR UPDATE ON pedidoproveedor
FOR EACH ROW EXECUTE PROCEDURE fun_actualizacion_tabla();

CREATE OR REPLACE TRIGGER tri_actualizacion_detallepedido BEFORE INSERT OR UPDATE ON detallepedido
FOR EACH ROW EXECUTE PROCEDURE fun_actualizacion_tabla();