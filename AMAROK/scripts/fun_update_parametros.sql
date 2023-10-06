CREATE OR REPLACE FUNCTION fun_update_parametros(wnit_empresa parametros.empreNit%TYPE, wnom_empresa parametros.empreNom%TYPE,
                                            wnumfacini_empresa parametros.numFacIni%TYPE,
											wredpundes_empresa parametros.redPunDes%TYPE,
                                            wredpundom_empresa parametros.redPunDom%TYPE,
											wadmincon_empresa parametros.adminCon%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        
        raise notice 'La contraseña es: %', wadmincon_empresa;

        IF wadmincon_empresa  IS NOT NULL AND wadmincon_empresa != '' THEN
            UPDATE parametros SET empreNom       = wnom_empresa,
								  numFacIni		 = wnumfacini_empresa,
                                  redPunDes      = wredpundes_empresa,
                                  redPunDom      = wredpundom_empresa,
                                  adminCon       = MD5(wadmincon_empresa)
            WHERE empreNit = wnit_empresa;
        ELSE
            UPDATE parametros SET      empreNom       = wnom_empresa,
								numFacIni		= wnumfacini_empresa,
                                redPunDes       = wredpundes_empresa,
                                redPunDom       = wredpundom_empresa
            WHERE empreNit = wnit_empresa;
        END IF;

        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;