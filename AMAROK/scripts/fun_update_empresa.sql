CREATE OR REPLACE FUNCTION fun_update_empresa(  wnit_empresa empresatransporte.empreTraNit%TYPE, 
                                                wnom_empresa empresatransporte.empreTraNom%TYPE, 
												wtel_empresa empresatransporte.empreTraTel%TYPE
											  ) RETURNS BOOLEAN AS      
$BODY$
    BEGIN   
        UPDATE empresatransporte SET    empreTraNit       = wnit_empresa,
                                        empreTraNom       = wnom_empresa,
                                        empreTraTel       = wtel_empresa
        WHERE empreTraNit = wnit_empresa;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;