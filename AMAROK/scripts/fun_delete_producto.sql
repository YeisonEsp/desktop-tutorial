CREATE OR REPLACE FUNCTION fun_delete_producto(wcod_producto producto.producCod%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE producto SET producAct=FALSE
        WHERE producCod = wcod_producto;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;