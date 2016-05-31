</div><div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pedidos Enviados</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="col-lg-10">


    <tbody>



        <?php foreach ($mispedidos as $producto) : ?>

            <!-- Aplicadas en las filas -->
        <table class="table table-condensed" style=" border:  #0088cc 5px solid;">
            <tr>
                <td>Codigo del pedido : <strong><?= $producto['codigo_pedido'] ?></strong> </td>  

                <td>Fecha : <strong><?= $producto['fecha'] ?></strong></td>

                <td>Estado : <strong><?= $producto['Estado'] ?></strong></td>
                <td><?= anchor("Admin/VolverPedido/".$producto["codigo_pedido"]."", " Devolver a Pendientes  ", array('class' => 'btn glyphicon glyphicon-share-alt btn-info'))?></td>
                <td></td>
                
            </tr>
            <tr><td>Datos del pedido :</td><td></td><td></td><td></td><td></td></tr>
            <tr>
                <td align="center" style= "background: #FFFF88;">Nombre</td>
                <td align="center" style= "background: #FFFF88;">Cantidad</td>
                <td align="center" style= "background: #FFFF88;">Precio</td>
                <td align="center" style= "background: #FFFF88;">Importe</td>
                <td style= "background: #FFFF88;"></td>
            </tr>
            
                <?php foreach ($producto['lineas']as $linea): ?>

                    <td align="center" style= "background: #FFFF88;"><?= $linea['Nombre'] ?></td>
                    <td align="center" style= "background: #FFFF88;"><?= $linea['Cantidad'] ?></td>
                    <td align="center" style= "background: #FFFF88;"><?= $linea['Precio'] ?></td>
                    <td align="center" style= "background: #FFFF88;"><?= $linea['Importe'] ?></td>
                <td style= "background: #FFFF88;"></td>    
                



            <?php endforeach; ?>

        </table>
    <?php endforeach; ?>
</tbody>              


</div>





