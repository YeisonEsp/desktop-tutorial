create or replace function fun_insert_tipopago(wnom_tipopago tipopago.tipPagNom%type) returns varchar as
$$
	declare wid tipopago.tipPagId%type;
	declare wtipopago tipopago.tipPagId%type;
	begin
		select t.tipPagId into wtipopago from tipopago t where t.tipPagNom=wnom_tipopago;
		if found then
			raise notice 'El tipo de pago ya existe';
			return 'Error al insertar';
		end if;
		select max(t.tipPagId) into wid from tipopago t;
		if wid is null then
			wid = 0;
		end if;
		wid = wid + 1;
		insert into tipopago values(wid, wnom_tipopago);
		if found then
			raise notice 'Funciona. El tipo de pago %, % se insertó correctamente', wid, wnom_tipopago;
			return 'Exito';
		else
			raise notice 'Falló la inserción';
			return 'No funcionó';
		end if;
	end;
$$
language plpgsql;