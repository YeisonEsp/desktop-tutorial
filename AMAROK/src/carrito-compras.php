<?php include_once "encabezado-cliente.php" ?>

    <div class="contenedor-tabla-venta">
            <table class="tabla-productos-selecionados" style="width: 100%;">
                <thead class="encabezado-tabla">
                    <tr>
                        <th style="width: 40%;">PRODUCTO</th>
                        <th style="width: 30%;">NOMBRE</th>
                        <th style="width: 10%;"></th>
                        <th style="width: 10%;">CANTIDAD</th>
                        <th style="width: 10%;"> </th>
                    </tr>
                </thead>
                <tbody class="cuerpo-tabla">
                    <tr>
                        <td><img class="producto-img" src="../images/repuestos/motor.png" alt="producto"></td>
                        <td class="nombre-producto-tabla" >Motor 3.0 turbodiésel V6 de 258 CV y 59,1 kgm</td>
                        <td class="aumentar-producto-tabla"><i class="bi bi-plus-square-fill"></i></td>
                        <td class="cantidad-producto-tabla">999</td>
                        <td class="disminuir-producto-tabla"><i class="bi bi-dash-square-fill"></i></td>
                    </tr>
                    <tr>
                        <td><img class="producto-img" src="../images/repuestos/tornillos.png" alt="producto"></td>
                        <td class="nombre-producto-tabla" >Tornillos de rueda FEBI Bilstein 21588</td>
                        <td class="aumentar-producto-tabla"><i class="bi bi-plus-square-fill"></i></td>
                        <td class="cantidad-producto-tabla">999</td>
                        <td class="disminuir-producto-tabla"><i class="bi bi-dash-square-fill"></i></td>
                    </tr>
                </tbody>
            </table>
            <a class="btn-agregar rea-ven" id="dom" href="modo-entrega-cliente.php">Relizar Compra</a>
        </div>
    </div>
