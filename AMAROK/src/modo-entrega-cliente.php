<?php include_once "encabezado-cliente.php" ?>

    <div class="contenedor-envio">
        <h2 style="color: aliceblue;" class="titulo">Realizar Compra</h2>
        <h3 class="titulo">Datos envio:</h3>
        <section class="seccion-entrega">
            <div class="contenedor-envio-domicilio">
                <input type="checkbox">
                <label for="">Domiclio</label>
            </div>
            <div class="contenedor-envio-tienda">
                <input type="checkbox">
                <label for="">Retirar en Tienda</label>
            </div>
            <p class="p direccion-envio">Dirección de Envio: Cll 25a #100-100 PT 4</p>
            <p class="p destinatario-envio">Destinatario: Ana María Pérez López</p>
            <p class="p telefono-envio">Telefono: 3214569874</p>
        </section>
        <hr>
        <section class="seccion-pago">
            <div class="contenedor-tipo-pago">
                <label style="color: goldenrod;">Tipo de Pago:</label>
                <select name="tipoPago">
                    <option value="">tipo 1</option>
                    <option value="">Tipo 2</option>
                    <option value="">tipo 3</option>
                    <option value="">tipo 4</option>
                </select>
                <a href="https://www.pse.com.co/persona" class="boton-ingresar-datos" >Ingresar Datos de Pago</a>
            </div>
            <hr>
            <table class="tabla-productos-selecionados" style="width: 60%;">
                <thead class="encabezado-tabla">
                    <tr>
                        <th style="width: 35%;">NOMBRE</th>
                        <th style="width: 3%;"></th>
                        <th style="width: 9%;">CANTIDAD COMPRADA</th>
                        <th style="width: 3%;"></th>
                    </tr>
                </thead>
                <tbody class="cuerpo-tabla">
                    <tr>
                        <td class="nombre-producto-tabla" >Motor 3.0 turbodiésel V6 de 258 CV y 59,1 kgm</td>
                        <td><i class="bi bi-plus-square-fill"></i</td>
                        <td class="cantidad-producto-tabla">1</td>
                        <td><i class="bi bi-dash-square-fill"></i></td>
                    </tr>
                    <tr>
                        <td class="nombre-producto-tabla" >Tornillos de rueda FEBI Bilstein 21588</td>
                        <td><i class="bi bi-plus-square-fill"></i</td>
                        <td class="cantidad-producto-tabla">1</td>
                        <td><i class="bi bi-dash-square-fill"></i></td>
                    </tr>
                </tbody>
            </table>
        </section>
        <a class="btn-agregar rea-ven" id="dom" href="compras-cliente.php">Acabar Compra</a>
    </div>