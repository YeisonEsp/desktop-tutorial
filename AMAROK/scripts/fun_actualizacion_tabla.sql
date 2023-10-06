CREATE OR REPLACE FUNCTION fun_actualizacion_tabla() RETURNS TRIGGER AS 
$$
    BEGIN
        IF TG_OP = 'INSERT' THEN
        NEW.usr_insert = CURRENT_USER;
        NEW.fec_insert = NOW();
        END IF;
        IF TG_OP = 'UPDATE' THEN
            NEW.usr_update = CURRENT_USER;
            NEW.fec_update = NOW();
        END IF;
        RETURN NEW;
    END;
$$
LANGUAGE PLPGSQL;