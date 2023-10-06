CREATE OR REPLACE FUNCTION fun_update_mensajero(wdoc_mensajero mensajero.mensajDoc%TYPE,
											wnom_mensajero mensajero.mensajNom%TYPE,
                                            wdir_mensajero mensajero.mensajDir%TYPE,wtel_mensajero mensajero.mensajTel%TYPE,
											wema_mensajero mensajero.mensajEma%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE mensajero SET      mensajNom       = wnom_mensajero,
                                mensajDir       = wdir_mensajero,
                                mensajTel       = wtel_mensajero,
                                mensajema       = wema_mensajero
        WHERE mensajDoc = wdoc_mensajero;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;