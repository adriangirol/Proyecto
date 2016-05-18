<?php if(isset($_SESSION['usuario_correcto'])&& $_SESSION['usuario_correcto']==true ){
           echo "<h3><font color='Grey'>". $_SESSION['usuario']['Nombre']."</font></h3>";
             echo "&nbsp &nbsp &nbsp &nbsp ";
             echo anchor('Login/ModificarUsuario',"Modificar Usuario",array("class"=>"btn btn-default btn-lg btn-block nav navbar-nav"));   
             echo "&nbsp &nbsp &nbsp &nbsp ";
                echo anchor('Entrada/Verpedidos',' Mis pedidos', array("class"=>"btn btn-default btn-lg btn-block nav navbar-nav"));
             echo "&nbsp &nbsp &nbsp &nbsp ";
                echo anchor('Entrada/MostrarCarrito','  Ver carrito', array("class"=>"btn btn-default btn-lg btn-block nav navbar-nav"));
        }
        ?> 


