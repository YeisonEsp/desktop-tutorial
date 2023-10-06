CREATE OR REPLACE FUNCTION fun_insert_departamento( wnom_departamento	departamento.departNom%TYPE) RETURNS BOOLEAN AS                                           
$BODY$
	DECLARE 
		wdepartamento 	departamento.departNom%TYPE;
		wcontador 		departamento.departId%TYPE;
    BEGIN
		
		SELECT departNom INTO wdepartamento from departamento 
		WHERE departNom = wnom_departamento;
		IF FOUND THEN
			Raise Notice 'El Departamento ya se encuentra registrado';
			RETURN false;
		END IF;
		SELECT max(departId) INTO wcontador FROM departamento;
		IF wcontador IS NULL THEN
			wcontador = 0;
		END IF;
		wcontador = wcontador + 1;
        INSERT INTO departamento VALUES(wcontador, wnom_departamento);
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;