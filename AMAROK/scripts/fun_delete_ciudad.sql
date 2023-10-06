CREATE OR REPLACE FUNCTION fun_delete_ciudad(wcod_ciudad ciudad.ciudadId%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        DELETE FROM ciudad
        WHERE ciudadId = wcod_ciudad;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;