CREATE OR REPLACE FUNCTION fun_delete_proveedor(wnit_proveedor proveedor.proveeNit%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        DELETE FROM proveedor
        WHERE proveeNit = wnit_proveedor;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;