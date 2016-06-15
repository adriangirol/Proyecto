<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header ">Lista de Usuarios</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="col-lg-10">
<table class="table table-striped table-responsives table-hover">
    <tbody>
        
        </tr>
       
       <tr>
           <td align="center"  class="active h3">Codigo</td>
           <td align="center"  class="active h3">Nombre</td>
           <td align="center"  class="active h3">Login</td>
           <td align="center"  class="active h3">CP</td>
           <td align="center"  class="active h3">Direccion</td>
           <td align="center"  class="active h3">DNI</td>
           <td align="center"  class="active h3">Borrado</td>
           <td align="center"  class="active h3">Tipo</td>
       </tr>
       <tr>
           <?php foreach($misuser as $linea):?>
        
        <td align="center"><?=$linea['Codigo']?></td>
        <td align="center"><?=$linea['Nombre']?></td>
        <td align="center"><?=$linea['Nombre_usuario']?></td>
        <td align="center"><?=$linea['CP']?></td>
        <td align="center"><?=$linea['Direccion']?></td>
        <td align="center"><?=$linea['DNI']?></td>
        <td align="center"><?=$linea['Borrado']?></td>
        <td align="center"><?=$linea['Tipo']?></td>
        <td align="center"><?= anchor("Admin/EstasSeguroUser/".$linea["Codigo"]."", " ", array('class' => 'btn glyphicon glyphicon-remove-sign btn-danger'))?></p></td>
        <?php if($linea['Tipo']!='Admin'){
         echo "<td align='center'><p>";
        ECHO anchor("Admin/EstasSeguroAdmin/".$linea['Codigo']."","Administrador", array('class' => 'btn glyphicon glyphicon-star btn-success'));
                echo"</p></td>";
         }?>
       </tr>
       
     

         <?php endforeach; ?><tr>
             
      
        <td align="center"><?= anchor("Login/RecogerDatosUser/", " Añadir Usuario", array('class' => 'btn glyphicon glyphicon-plus btn-success'))?></p></td>
        
     
     
       
   
     </tbody>              
   
 </table>

</div>


