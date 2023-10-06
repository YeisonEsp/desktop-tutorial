CREATE OR REPLACE FUNCTION fun_update_ciudad(  wcod_ciudad      ciudad.ciudadId%TYPE,
                                               wnom_ciudad      ciudad.ciudadNom%TYPE, 
											   wid_departamento ciudad.idDepart%TYPE, 
                                               wdom_ciudad      ciudad.precioDom%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE ciudad SET   ciudadNom      = wnom_ciudad,
                            idDepart       = wid_departamento,
                            precioDom      = wdom_ciudad
        WHERE ciudadId = wcod_ciudad;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;