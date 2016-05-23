<h3>Pedidos Realizados :</h3>
<table class="table table-condensed">
    <tbody>
        
        
    <?php  if($numeroPedido==0){echo "No existen pedidos";}
    else{
    foreach ($misproductos as $producto) : ?>
        <?php if($producto['Estado']=="AN")
                echo "<tr class='danger'>";
              else 
                  echo "<tr class='success'>"; ?>
        <!-- Aplicadas en las filas -->
         
       
        <td>Codigo del pedido : <strong><?= $producto['codigo_pedido']?></strong> </td>  
        
        <td>Fecha : <strong><?= $producto['fecha']?></strong></td>
        
        <td>Estado : <strong><?= $producto['Estado'] ?></strong></td>
        <td><?php if($producto['Estado']=="NP"){echo anchor("Entrada/CancelarPedido/{$producto['codigo_pedido']}"," Anular ");}?></td>
        <td><?php echo anchor("Entrada/ImprimirPedidoPDE/{$producto['codigo_pedido']}","Imprimir Pdf")?>
        </tr>
       <tr><td>Datos del pedido :</td></tr>
       <tr>
           <td align="center">Nombre</td>
           <td align="center">Cantidad</td>
           <td align="center">Precio</td>
           <td align="center">Importe</td>
       </tr>
       <tr>
           <?php foreach($producto['lineas']as $linea):?>
        
        <td align="center"><?=$linea['Nombre']?></td>
        <td align="center"><?=$linea['Cantidad']?></td>
        <td align="center"><?=$linea['Precio']?></td>
        <td align="center"><?=$linea['Importe']?></td>
        <?php $total=$total+$linea['Importe'];?>
       </tr>
       
     

         <?php endforeach; ?><tr>
        <td> </td>
        <td> </td>
        <td> </td>
        
       
        <td align="center"><strong><?=$total?></strong></td>
       </tr>
      <?php $total=0;?>
       
    <?php endforeach; }?>
     </tbody>              
 </table>
<h3>Estados del pedido</h3>
<table class="table table-condensed">
    <tbody>
    
      <tr class="warning">
        <!-- Aplicadas en las filas -->
        
        <td>Np</td>
        <td>No pagado</td>
      </tr>
      <tr class="warning">
        <td>PA</td>
        <td>Pagado</td>
      </tr>
      <tr class="warning">
        <td>PE</td>
        <td>Pendiente de envio</td>
     </tr>
     <tr class="warning">
        <td>EN</td>
        <td>Enviado</td>
     </tr>
     <tr class="warning">
        <td>AN</td>
        <td>Anulado</td>
     </tr>
          

     </tbody>              
 </table>



