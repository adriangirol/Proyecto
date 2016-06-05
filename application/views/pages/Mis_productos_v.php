<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Lista de Productos</h1>
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
                <td align="center"  class="active h3">Precio</td>
                <td align="center"  class="active h3">Categoria</td>
                <td align="center"  class="active h3">Stock</td>
            </tr>
            <tr>
                <?php echo validation_errors(); ?>
                <?php foreach ($misproductos as $linea): ?>

            <form name="form<?= $linea['Codigo'] ?>" action=""  method="POST">
                <td align="center"><input type="number" value="<?= $linea['Codigo'] ?>" name="id" readonly style=" width: 5em; text-align: center;"></td>
                <td align="center"><input type="text" value="<?= $linea['Nombre'] ?>" name="nombre" style="text-align: center;"</td>
                <td align="center"><input type="number"   step="any" value="<?= $linea['Precio'] ?>" name="precio" style=" text-align: center ;" </td>
                <td align="center"><input type="number" value="<?= $linea['Categoria_Codigo'] ?>" name="cat" style=" width: 5em; text-align: center ;"</td>
                <td align="center">
                    <button class="btn" type="button" id="menos" onclick="javascript: contadormenos<?php echo$linea["Codigo"]; ?>()">-</button>
                    <input id="cantidad<?= $linea['Codigo'] ?>" type="number" style=" width: 5em; text-align: center ;" value="<?= $linea['Stock'] ?>">
                    <button class="btn" type="button" id="mas" onclick="javascript: contadormas<?php echo$linea["Codigo"]; ?>()">+</button></td>

                <td align="center"><?= anchor("Admin/EstasSeguroPro/" . $linea["Codigo"] . "", " Eliminar ", array('class' => 'btn  btn-danger', 'onclick')) ?></p></td>
                
                <td align="center"><?php echo form_submit('botonSubmit', 'Actualizar'," class ='btn btn-primary '");?></p></td>
            </form>

            </tr>
            <script language="javascript">



                function contadormas<?php echo$linea["Codigo"]; ?>() {
                    var i = document.getElementById("cantidad<?php echo$linea["Codigo"]; ?>").value;

                    i = parseInt(i) + 1;

                    var cant = document.getElementById("cantidad<?php echo $linea["Codigo"]; ?>");
                    cant.value = i;
                    if (cant.value == 1) {
                        i = 1;
                        cant.value = 0;
                    }
                }
                function contadormenos<?php echo$linea["Codigo"]; ?>() {
                    var i = document.getElementById("cantidad<?php echo$linea["Codigo"]; ?>").value;
                    if (i >= 2) {
                        i = i - 1;
                        var cant = document.getElementById("cantidad<?php echo $linea["Codigo"]; ?>");
                        cant.value = i;
                        if (cant.value == 1) {
                            i = 1;
                            cant.value = 0;
                        }
                    }
                }
            </script>


        <?php endforeach; ?><tr>


        </tr>



        </tbody>              

    </table>
</div>


