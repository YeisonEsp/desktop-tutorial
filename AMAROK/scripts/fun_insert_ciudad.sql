CREATE OR REPLACE FUNCTION fun_insert_ciudad( wnom_ciudad      ciudad.ciudadNom%TYPE, 
											  wid_departamento ciudad.idDepart%TYPE, 
                                              wdom_ciudad      ciudad.precioDom %TYPE) RETURNS BOOLEAN AS                                           
$BODY$
	DECLARE 
		wciudad RECORD;
		wcontador ciudad.ciudadId%TYPE;
    BEGIN
		
		SELECT ciudadNom, idDepart INTO wciudad from ciudad 
		WHERE ciudadNom = wnom_ciudad AND idDepart = wid_departamento;
		IF FOUND THEN
			Raise Notice 'La Ciudad ya se encuentra registrado';
			RETURN false;
		END IF;
		SELECT max(ciudadId) INTO wcontador FROM ciudad;
		IF wcontador IS NULL THEN
			wcontador = 0;
		END IF;
		wcontador = wcontador + 1;
        INSERT INTO ciudad VALUES(wcontador, wid_departamento, wnom_ciudad, wdom_ciudad);
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;