<?php include_once "encabezado.php" ?>

<br><h1 class="crud-text nueva">VENTA NUEVA</h1><br>
<div>
    <a class="btn-agregar opcven" id="fin" href="#">Finalizar</a>
    <a class="btn-agregar opcven" id="dom" href="agregarCiudadDestino.php">Domicilio</a>
    <a class="btn-agregar opcven" id="can" href="listarVentas.php">Cancelar</a>
</div>
<br>
<div class="contenedor-de-todo">
        <div class="contenedor-cli-val-pro"> 

            <div style="width: 25%;" class="contenedor-cliente">
                <label class="inputi" for="nombre-cliente">Nombre del Cliente</label>
                <input class="input-cliente" type="text">
                <label for="ciudad">Ciudad del Cliente</label>
                <select name="ciudad" class="select-cliente">
                    <option value="">ciudad 1</option>
                    <option value="">ciudad 2</option>
                    <option value="">ciudad 3</option>
                    <option value="">ciudad 4</option>
                    <option value="">ciudad 5</option>
                    <option value="">ciudad 6</option>
                    <option value="">ciudad 7</option>
                    <option value="">ciudad 8</option>
                    <option value="">ciudad 9</option>
                    <option value="">ciudad 10</option>
                </select>
            </div>
            
            <div style="width: 37.5%;" class="contenedor-valor-venta">
                <label for="valor-total">Valor Total:</label>
                <input type="number" disabled="true">
                <br><br><br>
                <label for="valor-total">Puntos a<br>Obtener:</label>
                <input type="number" disabled="true">
                <br>
            </div>

            <div style="width: 37.5%;"  class="contenedor-producto">
                
                <table class="tabla-producto">
                    <tr>
                        <th class="label-producto"><label for="producto">Producto</label></th>
                        <th class="select-producto"><select name="producto" id="productos">
                            <option value="">Producto 1</option>
                            <option value="">Producto 2</option>
                            <option value="">Producto 3</option>
                            <option value="">Producto 4</option>
                            <option value="">Producto 5</option>
                            <option value="">Producto 6</option>
                            <option value="">Producto 7</option>
                            <option value="">Producto 8</option>
                            <option value="">Producto 9</option>
                            <option value="">Producto 10</option>
                        </select></th>
                    </tr>
                    <tr>
                        <th class="label-producto"><label for="can-dis">Cantidad Dis. :</label></th>
                        <th class="input-producto"><input type="number" disabled="true"></th>
                    </tr>
                    <tr>
                        <th class="label-producto"><label for="can-req">Cantidad Req. :</label></th>
                        <th class="input-producto"><input type="number"></th>
                    </tr>
                    <tr>
                        <th class="label-producto"><label for="valor-par">Valor Parcial:</label></th>
                        <th class="input-producto"><input type="number" disabled="true"></th>
                    </tr>
                    <tr>
                        <th class="label-producto"><label for="valor-net">Valor Neto:</label><br><br><br><br></th>
                        <th class="input-producto"><input type="number" disabled="true"><br><br><br>
                            <a class="btn btn-warning mas" href="">➕</a>
                        </th>
                    </tr>
                </table>
                <!--
                <label for="producto">Producto</label>
                <select name="producto" id="productos">
                    <option value="">Producto 1</option>
                    <option value="">Producto 2</option>
                    <option value="">Producto 3</option>
                    <option value="">Producto 4</option>
                    <option value="">Producto 5</option>
                    <option value="">Producto 6</option>
                    <option value="">Producto 7</option>
                    <option value="">Producto 8</option>
                    <option value="">Producto 9</option>
                    <option value="">Producto 10</option>
                </select>
                <br>
                <label for="can-dis">Cantidad Dis. :</label>
                <input type="number">
                <br>
                <label for="can-req">Cantidad Req. :</label>
                <input type="number">
                <br>
                <label for="valor-par">Valor Parcial:</label>
                <input type="number">
                <br>
                <label for="valor-net">Valor Neto:</label>
                <input type="number">
                <br> -->

            </div>
        </div>

        <div class="contenedor-tabla-venta">
            <table class="tabla-venta" style="width: 100%;">
                <thead class="encabezado-tabla">
                    <tr>
                        <th style="width: 50%;">PRODUCTO</th>
                        <th style="width: 15%;">CANTIDAD</th>
                        <th style="width: 15%;">PRECIO UNI/</th>
                        <th style="width: 15%;">PRECIO NETO</th>
                        <th style="width: 5%;"></th>
                    </tr>
                </thead>
                <tbody class="cuerpo-tabla">
                    <tr>
                        <td class="producto-nombre">Aceite</td>
                        <td>5 Unidades</td>
                        <td>$99.999.999,9</td>
                        <td>$99.999,9</td>
                        <td><a class="btn btn-warning" href="">❌</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php include_once "pie.php" ?>