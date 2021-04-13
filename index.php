
<?php
/*
$conn = mysqli_connect(

    'localhost',

    'root',

    '',

    'tienda'

  ) or die(mysqli_erro($mysqli));


*/
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';

?>





  <br>
  <?php if ($mensaje!="") { ?>
<div class="alert alert-success">


<?php echo $mensaje; ?>
<a href="mostrarCarrito.php" class="badge badge-success">Ver Carrito</a>
</div>
<?php } ?>
<div class="row" >



  <?php
/* $sentencia= $pdo->prepare("SELECT * FROM `tblproductos` ");
$sentencia->execute();
$listaProductos= $sentencia->fetchAll(PDO::FETCH_ASSOC);
print_r($listaProductos);

*/


/*
          $query="SELECT * FROM tblproductos";

          $resultados = mysqli_query($conn, $query);

          while($row = mysqli_fetch_assoc($resultados))
              print_r($row);

              */

              $listaProductos=getPDO();
            //  print_r($listaProductos);

   ?>

   <?php foreach ($listaProductos as $producto) { ?>

     <div class="col-3" >

       <div class="card">
     <img title="<?php echo $producto['nombre']; ?>" src="<?php echo $producto['imagen']; ?>" class="card-img-top"

     alt="<?php echo $producto['nombre']; ?>"

data-toggle="popover"
data-trigger="hover"
data-content="<?php echo $producto['descripcion']; ?>"

height="317px"

     >
     <div class="card-body">
     <span><?php echo $producto['nombre']; ?></span>
     <h5 class="card-title"><?php echo $producto['precio']; ?></h5>
     <p class="card-text">Descripcion</p>

     <form class="" action="" method="post">
       <input type="hidden" id="id" name="id" value="<?php echo openssl_encrypt($producto['id'],COD,KEY); ?>">
      <input type="hidden" id="nombre" name="nombre" value="<?php echo openssl_encrypt($producto['nombre'],COD,KEY); ?>">
       <input type="hidden" id="precio" name="precio" value="<?php echo openssl_encrypt($producto['precio'],COD,KEY); ?>">
       <input type="hidden" id="cantidad" name="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY); ?>">
 <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
     </form>

     </div>
       </div>



     </div>
  <?php  } ?>










</div>




</div>

<script>
$(function () {
  $('[data-toggle="popover"]').popover()

})
</script>

<?php include 'templates/pie.php'; ?>
