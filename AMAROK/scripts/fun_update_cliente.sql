CREATE OR REPLACE FUNCTION fun_update_cliente(wdoc_cliente cliente.clientDoc%TYPE,
                                            wciu_cliente ciudad.ciudadId%TYPE,
											wnom_cliente cliente.clientNom%TYPE,
                                            wdir_cliente cliente.clientDir%TYPE,wtel_cliente cliente.clientTel%TYPE,
											wema_cliente cliente.clientEma%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE cliente SET      clientNom       = wnom_cliente,
								idciudad		= wciu_cliente,
                                clientDir       = wdir_cliente,
                                clientTel       = wtel_cliente,
                                clientema       = wema_cliente
        WHERE clientDoc = wdoc_cliente;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;