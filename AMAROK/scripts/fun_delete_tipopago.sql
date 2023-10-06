CREATE OR REPLACE FUNCTION fun_delete_tipopago(wid_tipopago tipopago.tipPagId%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        DELETE FROM tipopago
        WHERE tipPagId = wid_tipopago;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;