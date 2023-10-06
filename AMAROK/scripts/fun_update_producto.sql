CREATE OR REPLACE FUNCTION fun_update_producto(  wcod_producto producto.producCod%TYPE, wnom_producto producto.producNom%TYPE, 
												 wsto_producto producto.producSto%TYPE, wpre_producto producto.producPre%TYPE 
                                                ) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE producto SET     producNom       = wnom_producto,
                                producsto       = wsto_producto,
                                producpre       = wpre_producto
        WHERE producCod = wcod_producto;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;