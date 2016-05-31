<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Nueva Categoria</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<?php echo validation_errors(); ?>
<form action="" method="POST" >
    <HR width=100% align="center">
    <div class="col-sm-4 col-lg-4 col-md-4"></div>
    <div class="row"></div>
    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="form-group ">
            <label style="color: #0075b0; font-size: 18px" class="control-label requiredField" for="Codigo">
                Codigo
                <span class="asteriskField">
                    *
                </span>
            </label>
            <input class="form-control" id="Codigo" name="Codigo" type="number" value="<?= $num+1?>" readonly/>
        </div>
        <div class="col-sm-4 col-lg-4 col-md-4"></div>
        <div class="row"></div>
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




    </div>
    <div class="row"></div>
    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="form-group ">
            <label style="color: #0075b0; font-size: 18px" class="control-label requiredField" for="descripcion">
                Descripción
                <span class="asteriskField">
                    *
                </span>
            </label>
            <textarea class="form-control" id="descripcion" name="Descripcion" type="text" rows="3" value=""></textarea>
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
</div>
</form>

</HR>
</form>

