CREATE OR REPLACE FUNCTION fun_insert_producto(	wcod_producto producto.producCod%TYPE, wnom_producto producto.producNom%TYPE, 
												wsto_producto producto.producSto%TYPE, wpre_producto producto.producPre%TYPE 
											    ) RETURNS BOOLEAN AS
                                                
$BODY$
	DECLARE wproducto producto.producCod%TYPE;
	
    BEGIN
		
		SELECT producCod into wproducto from producto WHERE producCod = wcod_producto;
		IF FOUND THEN
			Raise Notice 'El Producto ya se encuentra registrado';
			RETURN false;
		END IF;
        INSERT INTO producto VALUES(wcod_producto, wnom_producto, wsto_producto, wpre_producto);
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;