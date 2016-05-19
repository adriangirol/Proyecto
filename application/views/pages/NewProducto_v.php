<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Nuevo Producto</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<?php echo validation_errors(); ?>
<form action="" method="POST" >
    <HR width=100% align="center">
    <div class="col-sm-4 col-lg-4 col-md-4"></div>
    <div class="row"></div>
    <div class="col-sm-4 col-lg-4 col-md-4">
        <form method="post">
             <div class="form-group ">
                <label style="color: #0075b0; font-size: 18px" class="control-label requiredField" for="nombre">
                    Nombre
                    <span class="asteriskField">
                        *
                    </span>
                </label>
                <input class="form-control" id="name3" name="nombre" type="text" value="" />
            </div>
            <div class="form-group ">
                <label class="control-label requiredField" for="user" style="color: #0075b0; font-size: 18px">
                    Categoria
                    <span class="asteriskField">
                        *
                    </span>
                </label>
                <select class="form-control" name="Categoria">
                    <option value="1">1-Botas</option>
                    <option value="2">2-Zapatos</option>
                    <option value="3">3-Complementos</option>
                    <option value="4">4-Niños</option>

                </select>
            </div>
            <div></div>

            <div class="form-group ">
                <label class="control-label requiredField" for="Precio" style="color: #0075b0; font-size: 18px">
                    <p style="color: #0075b0">Precio
                        <span class="asteriskField">
                            *</p>
                    </span>
                </label>
                <input class="form-control" id="contrasena" name="Precio" type="Number"/>
            </div>

            <div class="form-group ">
                <label style="color: #0075b0; font-size: 18px" class="control-label requiredField" for="Imagen">
                    Nombre Imagen
                    <span class="asteriskField">
                        *
                    </span>
                </label>
                <input class="form-control" id="imagen" name="imagen" type="text" value=""/>
            </div>
            <div class="form-group ">
                <label style="color: #0075b0; font-size: 18px" class="control-label requiredField" for="IVA">
                    IVA
                    <span class="asteriskField">
                        *
                    </span>
                </label>
                <input class="form-control" id="IVA" name="IVA" type="text" value=""/>
            </div>
           
    </div>
    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="form-group ">
            <label style="color: #0075b0; font-size: 18px" class="control-label requiredField" for="descripcion">
                Descripción
                <span class="asteriskField">
                    *
                </span>
            </label>
            <input class="form-control" id="descripcion" name="descripcion" type="text" value=""/>
        </div>
        <div class="form-group ">
            <label style="color: #0075b0; font-size: 18px" class="control-label requiredField" for="Stock">
                Stock
                <span class="asteriskField">
                    *
                </span>
            </label>
            <input class="form-control" id="Stock" name="Stock" type="Number" value=""/>
        </div>
        <div class="form-group ">
            <label style="color: #0075b0; font-size: 18px" class="control-label requiredField" for="Destacado">
                Destacado
                <span class="asteriskField">
                    *
                </span>
            </label>
            <div class="radio">
                <label>
                    <input type="radio" name="destacado" id="destacado" value="S" checked>
                    No
                </label>
                &nbsp;&nbsp;&nbsp;
                <label>
                    <input type="radio" name="destacado" id="destacado" value="N">
                    Si
                </label>
            </div>
        </div>
        <div class="form-group">
            <div>
            </div>
            <button class="btn btn-primary " name="guardar" type="submit">
                Guardar
            </button>
            &nbsp;&nbsp;
            <button type="reset" class="btn btn-danger " name="guardar" type="submit">
                Borrar
            </button>
        </div>
    </div>
</div>
</form>

</HR>
</form>

