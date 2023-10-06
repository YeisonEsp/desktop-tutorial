CREATE OR REPLACE FUNCTION fun_insert_empresa(	wnit_empresa empresatransporte.empreTraNit%TYPE, 
                                                wnom_empresa empresatransporte.empreTraNom%TYPE, 
												wtel_empresa empresatransporte.empreTraTel%TYPE
											 ) RETURNS BOOLEAN AS         
$BODY$
	DECLARE wempresa empresatransporte.empreTraNit%TYPE;
	
    BEGIN
		
		SELECT empreTraNit into wempresa from empresatransporte WHERE empreTraNit = wnit_empresa;
		IF FOUND THEN
			Raise Notice 'La empresa ya se encuentra registrada';
			RETURN false;
		END IF;
        INSERT INTO empresatransporte VALUES(wnit_empresa, wnom_empresa, wtel_empresa);
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;