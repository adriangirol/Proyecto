<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Categorias</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="col-lg-10">
<table class="table table-striped table-responsives table-hover">
    <tbody>
        
        </tr>
       
       <tr>
           <td align="center"  class="btn- active h3">Codigo</td>
           <td align="center"  class="active h3">Nombre</td>
           <td align="center"  class="active h3">Descripción</td>
           
       </tr>
       <tr>
           <?php foreach($miscategorias as $linea):?>
        
        <td align="center"><?=$linea['Codigo']?></td>
        <td align="center"><?=$linea['Nombre']?></td>
        <td align="center"><?=$linea['Descripcion']?> </td>
        
        <td align="center"><?= anchor("Admin/BorrarProducto/".$linea["Codigo"]."", " ", array('class' => 'btn glyphicon glyphicon-remove-sign btn-danger'))?></p></td>
        <td align="center"><?= anchor("Admin/ModificarProducto/".$linea["Codigo"]."", " ", array('class' => 'btn glyphicon glyphicon-cog btn-primary'))?></p></td>
        
       </tr>
       
     

         <?php endforeach; ?><tr>
      
        
       </tr>
     
       
   
     </tbody>              
   
 </table>

</div>


