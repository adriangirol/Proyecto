<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Categorias</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="col-lg-11">
<table class="table table-striped table-responsives table-hover">
    <tbody>
        
        </tr>
       
       <tr>
           <td align="center"  class="btn- active h3">Codigo</td>
           <td align="center"  class="active h3">Nombre</td>
           <td align="center"  class="active h3">Descripción</td>
           
       </tr>
       <?php echo validation_errors(); ?>
       <tr>
           
           <?php foreach($miscategorias as $linea):?>
    <form name="form<?= $linea['Codigo'] ?>" action=""  method="POST">
        <td align="center"><input class="form-control" type="text" readonly value="<?=$linea['Codigo']?>" name="cod" style=" width: 5em; text-align: center;"></td>
        <td align="center"><input  class="form-control" type="text" value="<?=$linea['Nombre']?>" name="nombre" style=" width: 10em; text-align: center;"></td>
        <td align="center"><textarea class="form-control" rows="3" name="des"> <?=$linea['Descripcion']?></textarea> </td>
        
        <td align="center"><?= anchor("Admin/EstasSeguroCat/".$linea["Codigo"]."", " Eliminar", array('class' => 'btn btn-danger'))?>
       <?php echo form_submit('botonSubmit', 'Actualizar'," class ='btn btn-primary '");?></p></td>
        
       </tr>
       </form>
     

         <?php endforeach; ?><tr>
      
        
       </tr>
     
       
   
     </tbody>              
   
 </table>

</div>


