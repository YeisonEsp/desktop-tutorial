CREATE OR REPLACE FUNCTION fun_delete_cliente(wdoc_cliente cliente.clientdoc%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE cliente SET clientAct=FALSE
        WHERE clientdoc = wdoc_cliente;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RAISE NOTICE 'NO SE PUDO ELIMINAR EL CLIENTE';
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;