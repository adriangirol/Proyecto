
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestion de Tienda online</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=  base_url()?>asset/plantilla/startbootstrap-sb-admin-2-1.0.8/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=  base_url()?>asset/plantilla/startbootstrap-sb-admin-2-1.0.8/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?=  base_url()?>asset/plantilla/startbootstrap-sb-admin-2-1.0.8/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=  base_url()?>asset/plantilla/startbootstrap-sb-admin-2-1.0.8/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?=  base_url()?>asset/plantilla/startbootstrap-sb-admin-2-1.0.8/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=  base_url()?>asset/plantilla/startbootstrap-sb-admin-2-1.0.8/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Gestion Tienda Online</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i style="color: red;" class="fa fa-download fa-fw"></i> Wing Tip
                                    <span class="pull-right text-muted small">Stock Menor de 10</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Ver mas </strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ajustes</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
<!--                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>-->
                        <li>
                         <a href="">   <i class="fa fa-bar-user-o fa-user"></i> Usuarios</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="Admin/Mostrar.php">Mostrar usuarios</a>
                                </li>
                                <li>
                                    <a href="Admin/BajaUser.php">Dar de baja usuario</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=""><i class="fa fa-star "></i> Productos</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?php echo anchor('Admin/VerProductos','Mostrar Productos')?>
                                </li>
                                <li>
                                   <?php echo anchor('Admin/NewProducto','Nuevo Producto')?>
                                </li>
                                <li>
                                    <a href="Admin/DeleteProducto.php">Eliminar producto</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=""><i class="fa fa-shopping-cart fa-shopping-cart"></i> Pedidos</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="Admin/pendientes.php">Lista de pedidos pendientes</a>
                                </li>
                                <li>
                                    <a href="Admin/Pedidos.php">Mostrar todos los pedidos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a><i class="fa fa-bookmark fa fa-object-ungroup"></i> Categorias</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="Admin/Categorias.php">Ver todas las categorias</a>
                                </li>
                                <li>
                                    <a href="Admin/NewCategoria.php">Añadir Categoria</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
           
            <div class="row">
                <div class="col-lg-12">
                    <div class="container">
                    <?php if(isset($cuerpo)) {
                            echo $cuerpo;
                        }
                    ?>
        <!--Fin del encabezado-->

    </div>
                    
                </div>
                   
<!--                            <div id="morris-area-chart"></div>
                                 /.col-lg-4 (nested) 
                                
                                    <div id="morris-bar-chart"></div>
                               
                            <div id="morris-donut-chart"></div>-->

                        <!-- /.panel-footer -->
            </div>
                    <!-- /.panel .chat-panel -->
        </div>
                <!-- /.col-lg-4 -->
    </div>
  

    <!-- jQuery -->
    <script src="<?=  base_url()?>asset/plantilla/startbootstrap-sb-admin-2-1.0.8/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=  base_url()?>asset/plantilla/startbootstrap-sb-admin-2-1.0.8/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=  base_url()?>asset/plantilla/startbootstrap-sb-admin-2-1.0.8/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?=  base_url()?>asset/plantilla/startbootstrap-sb-admin-2-1.0.8/bower_components/raphael/raphael-min.js"></script>
    <script src="<?=  base_url()?>asset/plantilla/startbootstrap-sb-admin-2-1.0.8/bower_components/morrisjs/morris.min.js"></script>
    <script src="<?=  base_url()?>asset/plantilla/startbootstrap-sb-admin-2-1.0.8/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=  base_url()?>asset/plantilla/startbootstrap-sb-admin-2-1.0.8/dist/js/sb-admin-2.js"></script>

</body>

</html>
