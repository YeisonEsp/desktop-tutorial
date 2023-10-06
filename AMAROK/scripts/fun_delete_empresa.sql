CREATE OR REPLACE FUNCTION fun_delete_empresa(wnit_empresa empresatransporte.empreTraNit%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        DELETE FROM empresatransporte
        WHERE empreTraNit = wnit_empresa;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;