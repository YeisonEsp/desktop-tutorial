CREATE OR REPLACE FUNCTION fun_delete_departamento( wcod_departamento	departamento.departId%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        DELETE FROM departamento
        WHERE departId = wcod_departamento;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;