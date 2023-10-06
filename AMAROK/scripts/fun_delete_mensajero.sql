CREATE OR REPLACE FUNCTION fun_delete_mensajero(wdoc_mensajero mensajero.mensajdoc%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        DELETE FROM mensajero
        WHERE mensajdoc = wdoc_mensajero;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;