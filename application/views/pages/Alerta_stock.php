<li class="dropdown"> 
<li class="dropdown">
    <a class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown" href="#">Alerta de stock
        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-alerts">
        <?php foreach ($alert as $linea): ?>  
            <li class="divider"></li>
            <li>
                <?= anchor("Admin/MostrarUnProducto/".$linea["Codigo"]."",$linea['Nombre'],Array('class'=>'h4'))?></p></td>
                    <div>
                        <i style="color: red;" class="fa fa-download fa-fw"></i> Existencias en Tienda : <?= $linea['Stock'] ?> Und.
                        
                    </div>
                
            <?php endforeach; ?>
    </ul>
    <!-- /.dropdown-alerts -->
</li>

