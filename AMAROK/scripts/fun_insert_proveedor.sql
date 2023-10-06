CREATE OR REPLACE FUNCTION fun_insert_proveedor(wnit_proveedor proveedor.proveeNit%TYPE,
												wid_ciudad ciudad.ciudadId%TYPE,
												wnom_proveedor proveedor.proveeNom%TYPE,
                                            	wdir_proveedor proveedor.proveeDir%TYPE,
												wtel_proveedor proveedor.proveeTel%TYPE,
												wema_proveedor proveedor.proveeEma%TYPE) RETURNS BOOLEAN AS
$BODY$
	DECLARE wproveedor proveedor.proveeNit%TYPE;
    BEGIN
		SELECT proveeNit into wproveedor from proveedor WHERE proveeNit = wnit_proveedor;
		IF FOUND THEN
			Raise Notice 'El proveedor ya se encuentra registrado';
			RETURN false;
		END IF;
        INSERT INTO proveedor VALUES( 	wnit_proveedor, wid_ciudad, wnom_proveedor, wdir_proveedor, 
										wtel_proveedor, wema_proveedor);
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;