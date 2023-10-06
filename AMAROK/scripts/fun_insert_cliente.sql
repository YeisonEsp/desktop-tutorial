CREATE OR REPLACE FUNCTION fun_insert_cliente(wdoc_cliente cliente.clientDoc%TYPE,wid_ciudad ciudad.ciudadId%TYPE,
											wnom_cliente cliente.clientNom%TYPE,
                                            wdir_cliente cliente.clientDir%TYPE,wtel_cliente cliente.clientTel%TYPE,
											wema_cliente cliente.clientEma%TYPE,
											wcon_cliente cliente.clientCon%TYPE) RETURNS BOOLEAN AS
$BODY$
	DECLARE wcliente cliente.clientDoc%TYPE;
	DECLARE wrol	 cliente.clientRol%TYPE;
    BEGIN
		wrol = 'cliente';
		SELECT clientDoc into wcliente from cliente WHERE clientDoc = wdoc_cliente;
		IF FOUND THEN
			Raise Notice 'El cliente ya se encuentra registrado';
			RETURN false;
		END IF;
        INSERT INTO cliente VALUES(wdoc_cliente,wid_ciudad, wrol, wnom_cliente, wdir_cliente, wtel_cliente,
								wema_cliente, MD5(wcon_cliente));
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;