<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Lista de Productos</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="col-lg-12"></div>
<table class="table table-condensed">
    <tbody>
        
        </tr>
       
       <tr>
           <td align="center" class="h3">Codigo</td>
           <td align="center" class="h3">Nombre</td>
           <td align="center" class="h3">Precio</td>
           <td align="center" class="h3">Categoria</td>
       </tr>
       <tr>
           <?php foreach($misproductos as $linea):?>
        
        <td align="center"><?=$linea['Codigo']?></td>
        <td align="center"><?=$linea['Nombre']?></td>
        <td align="center"><?=$linea['Precio']?></td>
        <td align="center"><?=$linea['Categoria_Codigo']?></td>
        
       </tr>
       
     

         <?php endforeach; ?><tr>
        <td> </td>
        <td> </td>
        <td> </td>
        
        
       </tr>
     
       
   
     </tbody>              
   
 </table>

</div>


