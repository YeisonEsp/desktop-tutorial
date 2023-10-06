CREATE OR REPLACE FUNCTION fun_update_proveedor(wnit_proveedor proveedor.proveeNit%TYPE,
												wid_ciudad ciudad.ciudadId%TYPE,
												wnom_proveedor proveedor.proveeNom%TYPE,
                                            	wdir_proveedor proveedor.proveeDir%TYPE,
												wtel_proveedor proveedor.proveeTel%TYPE,
												wema_proveedor proveedor.proveeEma%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE proveedor SET    proveeNit       = wnit_proveedor,
							    idCiudad		= wid_ciudad,
                                proveeNom       = wnom_proveedor,
                                proveeDir       = wdir_proveedor,
                                proveeTel       = wtel_proveedor,
                                proveeEma       = wema_proveedor
        WHERE proveeNit = wnit_proveedor;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;