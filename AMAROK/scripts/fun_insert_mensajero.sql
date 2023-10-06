CREATE OR REPLACE FUNCTION fun_insert_mensajero(wdoc_mensajero mensajero.mensajDoc%TYPE,
											wnom_mensajero mensajero.mensajNom%TYPE,
                                            wdir_mensajero mensajero.mensajDir%TYPE,wtel_mensajero mensajero.mensajTel%TYPE,
											wema_mensajero mensajero.mensajEma%TYPE,
											wcon_mensajero mensajero.mensajCon%TYPE) RETURNS BOOLEAN AS
$BODY$
	DECLARE wmensajero mensajero.mensajDoc%TYPE;
	DECLARE wrol	 mensajero.mensajRol%TYPE;
    BEGIN
		wrol = 'mensajero';
		SELECT mensajDoc into wmensajero from mensajero WHERE mensajDoc = wdoc_mensajero;
		IF FOUND THEN
			Raise Notice 'El Mensajero ya se encuentra registrado';
			RETURN false;
		END IF;
        INSERT INTO mensajero VALUES(wdoc_mensajero, wrol, wnom_mensajero, wdir_mensajero, wtel_mensajero,
								wema_mensajero, MD5(wcon_mensajero));
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;