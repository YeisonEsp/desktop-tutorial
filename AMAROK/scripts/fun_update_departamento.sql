CREATE OR REPLACE FUNCTION fun_update_departamento( wcod_departamento	departamento.departId%TYPE,
                                                    wnom_departamento	departamento.departNom%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE departamento SET departNom   = wnom_departamento
        WHERE departId = wcod_departamento;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;